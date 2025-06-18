<?php
session_start();
require_once '../db_connection.php';
require_once '../classes/Announcement.php';
require_once '../classes/Log.php';  // Include your logger

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$announcementId = $data['announcement_id'] ?? null;
$commentText = $data['comment_text'] ?? null;

$admin_id = $_SESSION['admin_id'] ?? null;

if (empty($admin_id)) {
    echo json_encode(['success' => false, 'message' => 'Admin not logged in.']);
    exit;
}

if (!$announcementId || !$commentText) {
    echo json_encode(['success' => false, 'message' => 'Missing comment or announcement ID']);
    exit;
}

try {
    $announcement = new Announcement($pdo);
    
    // Add comment, assuming it returns comment ID or true
    $commentId = $announcement->addComment($announcementId, $admin_id, $commentText);
    
    // Log the comment action
    logActivity(
        $pdo,
        'INSERT',
        'announcement_comments',
        $commentId ?? null,  
        $admin_id,
        "Added comment on announcement ID {$announcementId}"
    );
    
    // Get the admin's name (string)
    $adminName = $announcement->getAdminName($admin_id);

    echo json_encode([
        'success' => true,
        'comment' => [
            'admin_fname' => $adminName,
            'text'        => $commentText
        ]
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
?>
