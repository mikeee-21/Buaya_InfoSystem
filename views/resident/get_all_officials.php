<?php
require_once '../classes/Official.php';
require_once '../db_connection.php';

header('Content-Type: application/json');

$official = new Official($pdo);

try {
    $data = [
        'main' => $official->getOfficialsByType('main'),
        'sk' => $official->getOfficialsByType('sk')
    ];
    
    echo json_encode($data);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}