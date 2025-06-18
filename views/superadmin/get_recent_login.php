<?php
// fetch_logins.php
require_once '../db_connection.php';
require_once '../classes/Admin.php'; // Adjust path as needed

header('Content-Type: application/json');

try {
    $admin = new Admin($pdo);
    $logins = $admin->getRecentLoginHistory(); // Default limit is 30

    echo json_encode($logins);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch logins: ' . $e->getMessage()]);
}

?>