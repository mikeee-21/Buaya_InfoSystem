<?php
require_once '../db_connection.php';
require_once '../classes/Announcement.php';

header('Content-Type: application/json');

try {
    $announcement = new Announcement($pdo);
    $types = $announcement->getAllTypes();
    
    echo json_encode($types);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Failed to load announcement types',
        'details' => $e->getMessage()
    ]);
}