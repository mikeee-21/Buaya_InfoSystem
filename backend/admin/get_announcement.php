<?php

session_start();
require '../db_connection.php';
require '../classes/Announcement.php';

$announcement = new Announcement($pdo);

header('Content-Type: application/json');

try {

    $allAnnouncements = $announcement->getAllWithImages();
    echo json_encode(['success' => true, 'data' => $allAnnouncements]);

} catch (Exception $e) {

    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    
}
