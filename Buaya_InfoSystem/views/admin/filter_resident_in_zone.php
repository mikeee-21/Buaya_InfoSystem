<?php
require_once '../db_connection.php';
require_once '../classes/Zone.php';

header('Content-Type: application/json');

try {
    // Get filter values
    $filters = [
        'last_name' => $_GET['last_name'] ?? '',
        'first_name' => $_GET['first_name'] ?? '',
        'zone' => $_GET['zone'] ?? ''
    ];
    
    // Get residents with filters
    $zone = new Zone($pdo);
    $residents = $zone->getActiveResidents($filters);
    
    echo json_encode($residents);
    
} catch (Exception $e) {
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}