<?php
require_once '../db_connection.php';
require_once '../classes/Resident.php';

header('Content-Type: application/json');

try {
    $resident = new Resident($pdo);
    $archivedResidents = $resident->getArchivedResidents();
    
    echo json_encode($archivedResidents);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Failed to load archived residents',
        'details' => $e->getMessage()
    ]);
}