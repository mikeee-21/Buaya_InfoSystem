<?php
require_once '../db_connection.php';
require_once '../classes/Resident.php';

header('Content-Type: application/json');

try {
    $resident = new Resident($pdo);
    $activeResidents = $resident->getActiveResidents();
    
    echo json_encode($activeResidents);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Failed to load active residents',
        'details' => $e->getMessage()
    ]);
}