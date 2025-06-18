<?php
require_once '../db_connection.php';
require_once '../classes/Announcement.php';

header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['announcement_id'])) {
    echo json_encode(['success' => false, 'error' => 'No announcement ID provided']);
    exit;
}

// Example: retrieve admin ID from session
session_start();
$adminId = $_SESSION['admin_id'] ?? null;

if (!$adminId) {
    echo json_encode(['success' => false, 'error' => 'Not logged in']);
    exit;
}

$announcement = new Announcement($pdo);
$newCount = $announcement->toggleLike($adminId, $data['announcement_id']);

echo json_encode(['success' => true, 'like_count' => $newCount]);


?>