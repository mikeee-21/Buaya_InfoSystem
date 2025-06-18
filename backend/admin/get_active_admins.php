<?php
// fetch_admins.php or whatever the filename is
require_once '../db_connection.php';
require_once '../classes/Admin.php'; // Adjust the path as needed

header('Content-Type: application/json');

try {
    $admin = new Admin($pdo);
    $admins = $admin->getActiveAdmins();

    echo json_encode($admins);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch active admins: ' . $e->getMessage()]);

}


?>