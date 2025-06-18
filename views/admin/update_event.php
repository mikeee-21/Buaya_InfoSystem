<?php
require_once '../classes/Calendar.php';
require_once '../classes/Log.php';
require_once '../db_connection.php';

header('Content-Type: application/json');
date_default_timezone_set('UTC');

session_start(); // To get admin_id from session

try {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        throw new Exception("Invalid JSON input");
    }

    $required = ['id', 'event_title', 'event_date', 'event_time_start', 'event_time_end'];
    foreach ($required as $field) {
        if (empty($input[$field])) {
            throw new Exception("Missing required field: $field");
        }
    }

    $start = $input['event_date'] . ' ' . $input['event_time_start'];
    $end = $input['event_date'] . ' ' . $input['event_time_end'];

    $calendar = new Calendar($pdo);
    $success = $calendar->updateEvent(
        $input['id'],
        $input['event_title'],
        $input['event_description'] ?? '',
        $start,
        $end,
        $input['event_color'] ?? '#3c8dbc'
    );

    if (!$success) {
        throw new Exception("No rows were updated - does the event exist?");
    }

    // 📝 Log the activity
    $adminId = $_SESSION['admin_id'] ?? null;
    if ($adminId) {
        $description = "Updated event ID {$input['id']} — Title: '{$input['event_title']}', Date: {$input['event_date']}, Time: {$input['event_time_start']} to {$input['event_time_end']}";
        logActivity($pdo, "UPDATE", "calendar", $input['id'], $adminId, $description);
    }

    echo json_encode([
        'success' => true,
        'debug' => [
            'received_date' => $input['event_date'],
            'processed_date' => $input['event_date']
        ]
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage(),
        'input' => $input ?? null,
        'trace' => $e->getTraceAsString()
    ]);
}
?>
