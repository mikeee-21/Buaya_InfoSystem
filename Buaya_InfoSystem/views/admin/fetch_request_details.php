<?php
require_once '../db_connection.php';
require_once '../classes/Request.php';

header('Content-Type: application/json');

try {
    $reqId = $_GET['req_id'] ?? 0;
    
    if (!$reqId) {
        throw new Exception('Request ID is required');
    }

    $request = new Request($pdo);
    $requestData = $request->getRequestById($reqId);
    
    if ($requestData) {
        echo json_encode($requestData);
    } else {
        echo json_encode(['error' => 'Request not found']);
    }
    
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}