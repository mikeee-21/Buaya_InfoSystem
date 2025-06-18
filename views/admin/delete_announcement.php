<?php
require_once "../db_connection.php";
require_once '../classes/Announcement.php';
require_once '../classes/Log.php';

header('Content-Type: application/json');

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Only POST method is allowed'
    ]);
    exit;
}

// Get input data
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// Validate input
if (!isset($data['announcement_id']) || empty($data['announcement_id'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Announcement ID is required'
    ]);
    exit;
}

// Check admin session
session_start();
$admin_id = $_SESSION['admin_id'] ?? null;
if (!$admin_id) {
    echo json_encode([
        'success' => false,
        'message' => 'Admin not logged in'
    ]);
    exit;
}

try {
    $announcement = new Announcement($pdo);
    $result = $announcement->deleteAnnouncement($data['announcement_id'], $admin_id);

    // Delete physical files
    if (!empty($result['images'])) {
        foreach ($result['images'] as $image_path) {
            $full_path = "../../" . $image_path;
            if (file_exists($full_path)) {
                unlink($full_path);
            }
        }
    }

    echo json_encode([
        'success' => true,
        'message' => 'Announcement deleted successfully'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}