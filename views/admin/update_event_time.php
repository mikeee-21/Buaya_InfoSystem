<?php
require_once '../classes/Calendar.php';
require_once '../classes/Log.php';
require_once '../db_connection.php';

header('Content-Type: application/json');
session_start();

try {
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Debug logging
    error_log("Drag update received: " . print_r($input, true));
    
    // Validate required fields
    if (empty($input['id'])) {
        throw new Exception("Missing event ID");
    }
    if (empty($input['event_date'])) {
        throw new Exception("Missing event date");
    }
    if (empty($input['event_time_start'])) {
        throw new Exception("Missing start time");
    }

    $calendar = new Calendar($pdo);
    
    $startDateTime = $input['event_date'] . ' ' . $input['event_time_start'];
    $endDateTime = $input['event_date'] . ' ' . ($input['event_time_end'] ?? $input['event_time_start']);
    
    $success = $calendar->updateEventTime(
        $input['id'],
        $startDateTime,
        $endDateTime
    );

    // 📝 Log the update
    $adminId = $_SESSION['admin_id'] ?? null;
    if ($success && $adminId) {
        $description = "Updated event ID {$input['id']} time to {$startDateTime} - {$endDateTime}";
        logActivity($pdo, "UPDATE", "calendar", $input['id'], $adminId, $description);
    }

    echo json_encode([
        'success' => $success,
        'debug' => [
            'received' => $input,
            'processed' => [
                'start' => $startDateTime,
                'end' => $endDateTime
            ]
        ]
    ]);
    
} catch (Exception $e) {
    error_log("Drag update error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
