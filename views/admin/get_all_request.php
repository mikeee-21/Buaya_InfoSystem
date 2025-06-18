<?php
require_once '../db_connection.php';
require_once '../classes/Request.php';

header('Content-Type: application/json');

try {
    $filter = $_GET['filter'] ?? 'all';
    $request = new Request($pdo);
    $result = $request->getFilteredRequests($filter);
    
    echo json_encode($result);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Unexpected error: ' . $e->getMessage()
    ]);
}