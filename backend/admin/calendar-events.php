<?php
require_once '../classes/Calendar.php';
require_once '../db_connection.php';
require_once '../classes/Log.php'; // include the logger function

session_start();

header('Content-Type: application/json');

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    echo json_encode(['success' => false, 'error' => 'Not authenticated']);
    exit;
}

$admin_id = $_SESSION['admin_id'];

// Check if all required fields are present
$required = ['event_title', 'event_date', 'event_time_start', 'event_time_end'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['success' => false, 'error' => 'Missing required field: ' . $field]);
        exit;
    }
}

try {
    $calendar = new Calendar($pdo);
    
    // Prepare data with color
    $color = $_POST['event_color'] ?? '#3c8dbc';
    
    $eventId = $calendar->addEvent(
        $_POST['event_title'],
        $_POST['event_date'] . ' ' . $_POST['event_time_start'],
        $_POST['event_date'] . ' ' . $_POST['event_time_end'],
        $_POST['event_description'] ?? null,
        $admin_id,
        $color
    );
    
    if ($eventId) {
        // Log the event creation
        logActivity(
            $pdo,
            'INSERT',
            'calendar_event',
            $eventId,
            $admin_id,
            'Created new calendar event: ' . $_POST['event_title']
        );

        // Return complete event data for the <calendar></calendar>
        echo json_encode([
            'success' => true,
            'event_id' => $eventId,
            'event' => [
                'id' => $eventId,
                'title' => $_POST['event_title'],
                'start' => $_POST['event_date'] . 'T' . $_POST['event_time_start'],
                'end' => $_POST['event_date'] . 'T' . $_POST['event_time_end'],
                'description' => $_POST['event_description'] ?? '',
                'color' => $color
            ]
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to add event']);
    }
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo json_encode(['success' => false, 'error' => 'Database error']);
}
?>
