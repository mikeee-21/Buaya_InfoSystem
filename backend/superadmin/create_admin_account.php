<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

session_start();
require_once '../db_connection.php';

// Include the activity logger function
function logActivity($pdo, $actionType, $tableName, $referenceId, $adminId, $description = null, $resId = null) {
    try {
        $sql = "INSERT INTO activity_log (
                    act_log_action_type, 
                    act_log_table_name, 
                    act_log_reference_id, 
                    act_log_description, 
                    act_log_timestamp, 
                    admin_id, 
                    res_id
                ) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $actionType,
            $tableName,
            $referenceId,
            $description,
            $adminId,
            $resId
        ]);
        
        return true;
    } catch (PDOException $e) {
        error_log("Activity logging failed: " . $e->getMessage());
        return false;
    }
}

// Check if the superadmin is logged in
if (!isset($_SESSION['admin_id']) || $_SESSION['role_id'] != 1) {
    echo json_encode(['success' => false, 'error' => 'Access denied']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requiredFields = ['fname', 'lname', 'role', 'permission', 'username', 'email', 'contact', 'password', 'repassword', 'superpass'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            echo json_encode(['success' => false, 'error' => "Missing field: $field"]);
            exit;
        }
    }

    // Sanitize and assign
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $mname = trim($_POST['mname']);
    $suffix = trim($_POST['suffix']);
    $role_id = $_POST['role'];
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $superpass = $_POST['superpass'];

    // Decode permission JSON
    $group_permissions = json_decode($_POST['permission'], true);
    if (!is_array($group_permissions)) {
        echo json_encode(['success' => false, 'error' => 'Invalid permission format']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'error' => 'Invalid email format']);
        exit;
    }

    if ($password !== $repassword) {
        echo json_encode(['success' => false, 'error' => 'Passwords do not match']);
        exit;
    }

    // Superadmin verification
    try {
        $stmt = $pdo->prepare("SELECT admin_password 
                                      FROM admin_account 
                                      WHERE admin_id = :admin_id AND role_id = 1");

        $stmt->bindParam(':admin_id', $_SESSION['admin_id']);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$admin || !password_verify($superpass, $admin['admin_password'])) {
            echo json_encode(['success' => false, 'error' => 'Superadmin password is incorrect']);
            exit;
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
        exit;
    }

    // Check if the role is already assigned and return permission info
    try {
        $checkRoleStmt = $pdo->prepare("
            SELECT aa.admin_username, rp.per_id, p.per_name 
            FROM admin_account aa
            JOIN role_permision rp ON aa.role_id = rp.role_id
            JOIN permision p ON rp.per_id = p.per_id
            WHERE aa.role_id = :role_id AND aa.admin_status = True
        ");
        $checkRoleStmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);
        $checkRoleStmt->execute();
        $permissions = $checkRoleStmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($permissions)) {
            echo json_encode([
                'success' => false,
                'error' => 'This role is already assigned to another admin',
                'assigned_to' => $permissions[0]['admin_username'],
                'permissions' => $permissions
            ]);
            exit;
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Error checking role: ' . $e->getMessage()]);
        exit;
    }

    // Check if any of the selected permissions are already assigned to other roles
    try {
        $stmt = $pdo->prepare("
            SELECT rp.role_id, r.role_name, p.per_id, p.per_name
            FROM role_permision rp
            JOIN permision p ON rp.per_id = p.per_id
            JOIN role r ON rp.role_id = r.role_id
            WHERE rp.per_id = :per_id AND rp.role_id != :current_role
        ");

        $conflicts = [];
        foreach ($group_permissions as $group) {
            if (isset($group['permissions']) && is_array($group['permissions'])) {
                foreach ($group['permissions'] as $perm) {
                    $per_id = $perm['per_id'];
        
                    $conflictStmt = $pdo->prepare("
                        SELECT rp.role_id, r.role_name
                        FROM role_permision rp
                        JOIN admin_account aa ON aa.role_id = rp.role_id
                        JOIN role r ON r.role_id = rp.role_id
                        WHERE rp.per_id = :per_id AND aa.admin_status = True
                    ");
                    $conflictStmt->bindParam(':per_id', $per_id, PDO::PARAM_INT);
                    $conflictStmt->execute();
                    $assignedRoles = $conflictStmt->fetchAll(PDO::FETCH_ASSOC);
        
                    foreach ($assignedRoles as $assignedRole) {
                        $conflicts[] = [
                            'per_id' => $per_id,
                            'per_name' => ucwords($perm['per_name']),
                            'role_id' => $assignedRole['role_id'],
                            'role_name' => ucwords($assignedRole['role_name'])
                        ];
                    }
                }
            }
        }

        if (!empty($conflicts)) {
            $conflictMessages = [];
            foreach ($conflicts as $conflict) {
                $permName = ucwords(strtolower($conflict['per_name']));
                $roleName = ucwords(strtolower($conflict['role_name']));
                $conflictMessages[] = "$permName is already assigned to the role '$roleName'";
            }
        
            echo json_encode([
                'success' => false,
                'error' => implode(". ", $conflictMessages) . '.',
                'conflicts' => $conflicts
            ]);
            exit;
        }

    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Error checking permissions: ' . $e->getMessage()]);
        exit;
    }

    // Duplicate email and password checker
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin_account WHERE admin_username = :username OR admin_email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->fetchColumn() > 0) {
            echo json_encode(['success' => false, 'error' => 'Username or email already exists']);
            exit;
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Error checking existing user: ' . $e->getMessage()]);
        exit;
    }

    // Retrieve barangay ID
    $bar_id = null;
    try {
        $stmt = $pdo->prepare("SELECT bar_id FROM barangay_profile LIMIT 1");
        $stmt->execute();
        $barangay = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($barangay) {
            $bar_id = $barangay['bar_id'];
        } else {
            echo json_encode(['success' => false, 'error' => 'No barangay found']);
            exit;
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Error fetching barangay ID: ' . $e->getMessage()]);
        exit;
    }

    // Handle image upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['image']['type'], $allowedTypes)) {
            echo json_encode(['success' => false, 'error' => 'Invalid image type']);
            exit;
        }

        $targetDir = "../server_imgs/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $filename = uniqid() . '_' . basename($_FILES['image']['name']);
        $imagePath = $targetDir . $filename;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            echo json_encode(['success' => false, 'error' => 'Failed to upload image']);
            exit;
        }
    }

    // Password hashing
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert admin account
    try {
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("INSERT INTO admin_account (admin_username, admin_password, admin_fname, admin_lname, admin_mname, admin_suffix, admin_email, admin_contact, admin_image, role_id, bar_id, created_by) 
            VALUES (:admin_username, :admin_password, :admin_fname, :admin_lname, :admin_mname, :admin_suffix, :admin_email, :admin_contact, :admin_image, :role_id, :bar_id, :created_by)");

        $stmt->bindParam(':admin_username', $username);
        $stmt->bindParam(':admin_password', $hashedPassword);
        $stmt->bindParam(':admin_fname', $fname);
        $stmt->bindParam(':admin_lname', $lname);
        $stmt->bindParam(':admin_mname', $mname);
        $stmt->bindParam(':admin_suffix', $suffix);
        $stmt->bindParam(':admin_email', $email);
        $stmt->bindParam(':admin_contact', $contact);
        $stmt->bindParam(':admin_image', $imagePath);
        $stmt->bindParam(':role_id', $role_id);
        $stmt->bindParam(':bar_id', $bar_id);
        $stmt->bindParam(':created_by', $_SESSION['admin_id']);

        $stmt->execute();
        
        // Get the newly created admin ID
        $newAdminId = $pdo->lastInsertId();

        // Insert permissions
        $stmtRolePerm = $pdo->prepare("INSERT INTO role_permision (role_id, per_id) VALUES (:role_id, :per_id)");
        $assignedPermissions = [];

        foreach ($group_permissions as $group) {
            if (isset($group['permissions']) && is_array($group['permissions'])) {
                foreach ($group['permissions'] as $perm) {
                    if (isset($perm['per_id'])) {
                        $stmtRolePerm->bindParam(':role_id', $role_id);
                        $stmtRolePerm->bindParam(':per_id', $perm['per_id']);
                        $stmtRolePerm->execute();
                        
                        // Collect permission names for logging
                        $assignedPermissions[] = $perm['per_name'];
                    }
                }
            }
        }

        // ========== ACTIVITY LOGGING ==========
        
        // 1. Log admin account creation
        $adminDescription = "Created new admin account: $fname $lname ($username) with email: $email";
        logActivity($pdo, 'CREATE', 'admin_account', $newAdminId, $_SESSION['admin_id'], $adminDescription);
        
        // 2. Log role assignment
        $roleDescription = "Assigned role ID: $role_id to admin: $username";
        logActivity($pdo, 'ASSIGN', 'admin_account', $newAdminId, $_SESSION['admin_id'], $roleDescription);
        
        // 3. Log permission assignments
        if (!empty($assignedPermissions)) {
            $permissionsList = implode(', ', $assignedPermissions);
            $permissionDescription = "Assigned permissions to admin $username: $permissionsList";
            logActivity($pdo, 'ASSIGN', 'role_permision', $role_id, $_SESSION['admin_id'], $permissionDescription);
        }
        
        // 4. Log image upload if applicable
        if (!empty($imagePath)) {
            $imageDescription = "Uploaded profile image for admin: $username";
            logActivity($pdo, 'UPLOAD', 'admin_account', $newAdminId, $_SESSION['admin_id'], $imageDescription);
        }

        // ========== END ACTIVITY LOGGING ==========

        $pdo->commit();
        echo json_encode(['success' => true, 'message' => 'Admin account created successfully']);

    } catch (PDOException $e) {
        $pdo->rollBack();
        echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
    }

} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>