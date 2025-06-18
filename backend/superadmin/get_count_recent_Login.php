<?php
require_once '../db_connection.php';
require_once '../classes/Admin.php'; // Adjust path

header('Content-Type: application/json');

try {
    $admin = new Admin($pdo);
    $total = $admin->countRecentLogins(); // Optional: pass limit

    echo json_encode(['count' => $total]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to count recent logins: ' . $e->getMessage()]);
}
