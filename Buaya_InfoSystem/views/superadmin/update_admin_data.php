<?php 

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('../db_connection.php');

// Retrieve POST data
$adminId    = $_POST['admin_id'] ?? null;
$fname      = $_POST['fname'] ?? null;
$lname      = $_POST['lname'] ?? null;
$mname      = isset($_POST['mname']) && $_POST['mname'] !== '' ? $_POST['mname'] : null;
$suffix     = isset($_POST['suffix']) && $_POST['suffix'] !== '' ? $_POST['suffix'] : null;
$username   = $_POST['username'] ?? null;
$email      = $_POST['email'] ?? null;
$contact    = $_POST['contact'] ?? null;
$superpass  = $_POST['superpass'] ?? null;


if (empty($adminId) || empty($fname) || empty($lname) || empty($superpass) || empty($username) || empty($email)) {
    echo json_encode(['success' => false, 'error' => 'Missing required fields']);
    exit;
}

// Super admin verification
try {
    $stmt = $pdo->prepare("SELECT admin_password FROM admin_account WHERE admin_id = :admin_id AND role_id = 1");
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

// Initialize imagePath
$imagePath = '';

// Handle image upload
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['image']['type'], $allowedTypes)) {
        echo json_encode(['success' => false, 'error' => 'Invalid image type. Only JPEG, PNG, and GIF are allowed.']);
        exit;
    }

    if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
        echo json_encode(['success' => false, 'error' => 'Image size exceeds 5MB.']);
        exit;
    }

    $targetDir = "../server_imgs/";
    if (!file_exists($targetDir) && !mkdir($targetDir, 0777, true)) {
        echo json_encode(['success' => false, 'error' => 'Failed to create upload directory']);
        exit;
    }

    $filename = uniqid() . '_' . basename($_FILES['image']['name']);
    $imagePath = $targetDir . $filename;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        echo json_encode(['success' => false, 'error' => 'Failed to upload image']);
        exit;
    }
}

// Begin database transaction
try {
    $pdo->beginTransaction();

    // Update admin account
    $query = "UPDATE admin_account 
              SET admin_fname = :fname, admin_lname = :lname, admin_mname = :mname, 
                  admin_suffix = :suffix, admin_username = :username, admin_email = :email, 
                  admin_contact = :contact" . 
              ($imagePath ? ", admin_image = :image_path" : "") . 
              " WHERE admin_id = :admin_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':admin_id', $adminId, PDO::PARAM_INT);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':mname', $mname, PDO::PARAM_STR);
    $stmt->bindParam(':suffix', $suffix, PDO::PARAM_STR);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':contact', $contact, PDO::PARAM_STR);
    
    if ($imagePath) {
        $stmt->bindParam(':image_path', $imagePath, PDO::PARAM_STR);
    }
    $stmt->execute();

    // Commit transaction
    $pdo->commit();
    echo json_encode(['success' => true]);

} catch (Exception $e) {
    // Rollback transaction in case of error
    $pdo->rollBack();
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
