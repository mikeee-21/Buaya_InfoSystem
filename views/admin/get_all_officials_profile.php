<?php
require_once '../db_connection.php';
require_once '../classes/Official.php';

header('Content-Type: application/json');

// Validate required parameter
if (!isset($_GET['res_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'No resident ID provided']);
    exit;
}

try {
    $official = new Official($pdo);
    $result = $official->getOfficialDetails($_GET['res_id']);
    
    // Maintain the same response format
    echo json_encode($result);
    
} catch (Exception $e) {
    // Fallback error handling
    echo json_encode([
        'status' => 'error',
        'message' => 'Unexpected error: ' . $e->getMessage()
    ]);
}