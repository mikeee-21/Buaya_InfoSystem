<?php
require_once '../db_connection.php';
require_once '../classes/Request.php';

header('Content-Type: application/json');

try {
    $request = new Request($pdo);
    $requests = $request->getAllRequests();
    
    echo json_encode([
        'success' => true,
        'requests' => $requests
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Error fetching requests: ' . $e->getMessage()
    ]);
}