<?php
require_once '../db_connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$admin_id = $data['admin_id'] ?? null;

if (!$admin_id) {
    echo json_encode(['success' => false, 'error' => 'Invalid admin ID']);
    exit;
}




// Get the admin’s current role
$getRole = $pdo->prepare("SELECT role_id FROM admin_account WHERE admin_id = ?");
$getRole->execute([$admin_id]);
$admin = $getRole->fetch(PDO::FETCH_ASSOC);

if (!$admin) {
    echo json_encode(['success' => false, 'error' => 'Admin not found']);
    exit;
}





$role_id = $admin['role_id'];

// Check if role is already assigned to another active admin
$checkRole = $pdo->prepare("
    SELECT admin_id FROM admin_account 
    WHERE role_id = :role_id AND admin_status = True AND admin_id != :admin_id
");
$checkRole->execute([
    ':role_id' => $role_id,
    ':admin_id' => $admin_id
]);

if ($checkRole->rowCount() > 0) {
    echo json_encode(['success' => false, 'error' => 'Role is already assigned to another active admin']);
    exit;
}






// Check if any of this admin’s permissions are assigned to another active role

// Step 1: Get the role_id of the admin you're trying to reactivate
$getRole = $pdo->prepare("SELECT role_id FROM admin_account WHERE admin_id = :admin_id");
$getRole->execute([':admin_id' => $admin_id]);
$adminRoleId = $getRole->fetchColumn();

if (!$adminRoleId) {
    echo json_encode([
        'success' => false,
        'error' => 'Role not found for this admin.'
    ]);
    exit;
}

// Step 2: Check if there are other active admins using this same role
$checkConflicts = $pdo->prepare("
    SELECT aa.admin_id, aa.admin_username
    FROM admin_account aa
    WHERE aa.role_id = :role_id
    AND aa.admin_status = TRUE
    AND aa.admin_id != :admin_id
");
$checkConflicts->execute([
    ':role_id' => $adminRoleId,
    ':admin_id' => $admin_id
]);

$conflictingAdmins = $checkConflicts->fetchAll(PDO::FETCH_ASSOC);

if (!empty($conflictingAdmins)) {
    echo json_encode([
        'success' => false,
        'error' => 'This role is already used by another active admin.',
        'conflicts' => $conflictingAdmins
    ]);
    exit;
}




// No conflicts → Reactivate admin
$reactivate = $pdo->prepare("
    UPDATE admin_account SET admin_status = True WHERE admin_id = :admin_id
");
$reactivate->execute([':admin_id' => $admin_id]);

echo json_encode(['success' => true, 'message' => 'Admin reactivated successfully!']);
?>
