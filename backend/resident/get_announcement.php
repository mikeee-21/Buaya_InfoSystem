<?php
require_once '../classes/Announcement.php';
require_once '../db_connection.php'; // This should create $pdo

header('Content-Type: application/json');

try {
    $announcement = new Announcement($pdo);
    $latestAnnouncements = $announcement->getLatestAnnouncements();
    
    echo json_encode([
        'success' => true,
        'data' => $latestAnnouncements
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Failed to fetch announcements',
        'error' => $e->getMessage()
    ]);
}