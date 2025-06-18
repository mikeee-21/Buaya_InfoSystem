<?php
header('Content-Type: application/json');
require_once '../classes/Announcement.php';
require_once '../db_connection.php';

try {
    $announcement = new Announcement($pdo);
    
    // Handle comments request
    if (isset($_GET['comments_for'])) {
        $announcementId = (int)$_GET['comments_for'];
        if ($announcementId <= 0) {
            throw new Exception("Invalid announcement ID");
        }
        
        $comments = $announcement->getAnnouncementComments_RES($announcementId);
        echo json_encode([
            'success' => true,
            'comments' => $comments
        ]);
        exit;
    }
    
    // Default behavior - get all announcements
    $announcements = $announcement->getAllAnnouncements_RES();
    echo json_encode($announcements);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}