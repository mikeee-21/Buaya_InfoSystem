<?php
require_once '../db_connection.php';

$sql = "SELECT admin_id, admin_username, admin_email, admin_status, admin_created 
        FROM admin_account 
        WHERE admin_status = FALSE";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($admins as &$admin) {
    // Format the date as needed, e.g., 'March 20, 2025 05:50 PM'
    $admin['admin_created'] = date('F j, Y g:i A', strtotime($admin['admin_created']));
}

echo json_encode($admins);
?>
