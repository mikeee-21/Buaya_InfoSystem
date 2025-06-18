<?php
require_once '../db_connection.php';
require_once '../classes/Resident.php';

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents("php://input"), true);
    
    $resident = new Resident($pdo);
    $archivedResidents = $resident->searchArchivedResidents($data ?? []);
    
    echo json_encode($archivedResidents);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Oops, the archive monster escaped!']);
}