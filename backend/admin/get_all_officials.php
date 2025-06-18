<?php
require_once '../db_connection.php';
require_once '../classes/Official.php';

header('Content-Type: application/json');

try {
    $official = new Official($pdo);
    $result = $official->getOfficialsWithPositions();
    
    echo json_encode($result);
    
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Unexpected error: ' . $e->getMessage()
    ]);
}