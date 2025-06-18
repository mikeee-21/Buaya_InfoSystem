<?php
require_once '../db_connection.php';
require_once '../classes/Official.php';
require_once '../classes/Log.php';

header('Content-Type: application/json');

session_start();
$admin_id = $_SESSION['admin_id'] ?? null;

// Validate admin session
if (!$admin_id) {
    echo json_encode(['status' => 'error', 'message' => 'Admin not logged in']);
    exit;
}

try {
    // Get the input from the request
    $data = json_decode(file_get_contents('php://input'), true);
    $off_id = $data['off_id'] ?? null;

    // Validate input
    if (!$off_id) {
        throw new Exception('Official ID is required');
    }

    $official = new Official($pdo);
    $success = $official->deleteOfficial($off_id, $admin_id);

    echo json_encode(['status' => 'success']);

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error', 
        'message' => $e->getMessage()
    ]);
}