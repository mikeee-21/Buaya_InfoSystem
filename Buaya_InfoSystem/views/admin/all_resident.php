<?php
require_once '../db_connection.php';
require_once '../classes/Resident.php';

header('Content-Type: application/json');

try {
    $resident = new Resident($pdo);
    $residents = $resident->getAllActiveResidentsWithZones();
    
    if ($resident->getLastError()) {
        throw new Exception($resident->getLastError());
    }
    
    echo json_encode($residents);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error fetching residents: ' . $e->getMessage()
    ]);
}