<?php
header('Content-Type: application/json');
require_once '../classes/Announcement.php';
require_once '../db_connection.php';
session_start();

try {
    $input = json_decode(file_get_contents('php://input'), true);
    $announcementId = $input['announcement_id'];
    $action = $input['action'];
    
    $announcement = new Announcement($pdo);
    $result = $announcement->handleLike_RES($announcementId,$action);
    
    if ($result !== false) {
        echo json_encode(['success' => true, 'like_count' => $result]);
    } else {
        throw new Exception("Failed to process like");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}