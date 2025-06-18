<?php
header('Content-Type: application/json');
require_once '../classes/Calendar.php'; 
require_once '../db_connection.php';

try {
    $calendar = new Calendar($pdo);
    
    // Check if date range is requested
    if (isset($_GET['start'])) {
        $startDate = $_GET['start'];
        $endDate = $_GET['end'] ?? $startDate;
        $events = $calendar->getEventsByDateRange_RES($startDate, $endDate);
    } else {
        $events = $calendar->getAllEvents_RES();
    }
    
    // Format dates for easier frontend processing
    $formattedEvents = array_map(function($event) {
        return [
            'id' => $event['event_id'],
            'title' => $event['event_title'],
            'description' => $event['event_description'],
            'date' => $event['event_date'],
            'start' => $event['event_time_start'],
            'end' => $event['event_time_end'],
            'color' => $event['event_color'] ?: '#3c8dbc',
            'admin_id' => $event['admin_id']
        ];
    }, $events);

    echo json_encode($formattedEvents);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}