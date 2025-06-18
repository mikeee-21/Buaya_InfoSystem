<?php
require_once '../db_connection.php';
require_once '../classes/Request.php';

header('Content-Type: application/json');

try {
    $request = new Request($pdo);
    $result = $request->getApprovedRequestsWithCount();
    
    // Maintain the same response format
    if ($result['success']) {
        echo json_encode([
            'success' => true,
            'count' => $result['count'],
            'requests' => $result['requests']
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => $result['error']
        ]);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Unexpected error: ' . $e->getMessage()
    ]);
}