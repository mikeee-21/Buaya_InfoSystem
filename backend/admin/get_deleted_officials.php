<?php
require_once '../db_connection.php';
require_once '../classes/Official.php';

header('Content-Type: application/json');

try {
    $official = new Official($pdo);
    $result = $official->getDeletedOfficials();
    
    if ($result['status'] === 'success') {
        echo json_encode($result);
    } else {
        throw new Exception($result['message']);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}