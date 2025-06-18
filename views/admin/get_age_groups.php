<?php
require_once '../db_connection.php';
require_once '../classes/Resident.php';

header('Content-Type: application/json');

try {
    $resident = new Resident($pdo);
    $ageGroups = $resident->getAgeGroups();
    
    echo json_encode($ageGroups);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Age group calculator took a coffee break!']);
}