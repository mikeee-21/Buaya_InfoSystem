<?php
header('Content-Type: application/json');
require_once '../classes/Announcement.php';
require_once '../db_connection.php';

try {
    $announcement = new Announcement($pdo);
    $types = $announcement->getAnnouncementType();
    
    // Optionally sort the types alphabetically
    usort($types, function($a, $b) {
        return strcmp($a['ann_type_name'], $b['ann_type_name']);
    });
    
    echo json_encode($types);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}