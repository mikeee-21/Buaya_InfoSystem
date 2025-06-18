<?php
require_once '../db_connection.php';
require_once '../classes/Zone.php';

header('Content-Type: application/json');

try {
    $zone = new Zone($pdo);
    $zones = $zone->getZonesWithResidentCounts();
    
    echo json_encode($zones);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Failed to load zone data',
        'details' => $e->getMessage()
    ]);
}