<?php
require '../db_connection.php';
require '../classes/Resident.php';

header('Content-Type: application/json');

try {
    // Get and validate input
    $data = json_decode(file_get_contents("php://input"), true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON data');
    }

    // Search residents
    $resident = new Resident($pdo);
    $results = $resident->searchResidents($data);
    
    echo json_encode($results);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}