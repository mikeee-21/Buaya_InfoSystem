<?php
header('Content-Type: application/json');
require_once '../classes/Announcement.php';
require_once '../db_connection.php';

try {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) throw new Exception("Invalid input data");
    
    // Required fields validation
    if (empty($input['announcement_id']) || empty($input['comment_text'])) {
        throw new Exception("Missing required fields");
    }

    $announcement = new Announcement($pdo);
    
    // Let the Announcement class handle name generation
    $result = $announcement->addAnonymousComment(
        $input['announcement_id'],
        trim($input['comment_text']),
        trim($input['anonymous_name'] ?? '') // Pass through empty string if not provided
    );
    
    if ($result) {
        echo json_encode([
            'success' => true,
            'comment_count' => $result['comment_count'],
            'comment' => $result['comment']
        ]);
    } else {
        throw new Exception("Failed to add comment");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}