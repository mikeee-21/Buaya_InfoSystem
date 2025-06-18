<?php
require_once '../classes/Calendar.php';
require_once '../db_connection.php';

header('Content-Type: application/json');

try {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (empty($input['id'])) {
        throw new Exception("Event ID is required");
    }

    $calendar = new Calendar($pdo);
    $success = $calendar->deleteEvent($input['id']);
    
    echo json_encode(['success' => $success]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>