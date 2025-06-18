<?php
require_once '../db_connection.php';

$sql = "SELECT admin_id, admin_username, admin_email, admin_status, admin_created FROM admin_account";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Process each admin record
foreach ($admins as &$admin) {
    // Convert status to readable string
    $admin['admin_status'] = $admin['admin_status'] ? 'Active' : 'Deactivated';

    // Format date (e.g. March 20, 2025 05:50 PM)
    if (!empty($admin['admin_created'])) {
        $timestamp = strtotime($admin['admin_created']);
        $admin['admin_created'] = date("F j, Y h:i A", $timestamp);
    }
}

echo json_encode($admins);
?>
