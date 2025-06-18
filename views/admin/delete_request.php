<?php
require_once '../db_connection.php';
require_once '../classes/Request.php';
require_once '../classes/Log.php';

header('Content-Type: application/json');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid request method'
    ]);
    exit;
}

try {
    // Get input data
    $data = json_decode(file_get_contents('php://input'), true);
    $reqId = $data['req_id'] ?? 0;
    $adminId = $_SESSION['admin_id'] ?? null;
    
    // Validate input
    if (!$reqId) {
        throw new Exception('Request ID is required');
    }
    if (!$adminId) {
        throw new Exception('Admin not logged in');
    }

    // Process deletion
    $request = new Request($pdo);
    $result = $request->deleteRequest($reqId, $adminId);
    
    echo json_encode($result);

} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'error' => 'Database error: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}