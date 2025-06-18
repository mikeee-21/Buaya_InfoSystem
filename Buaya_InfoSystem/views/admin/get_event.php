<?php
header('Content-Type: application/json');
require_once '../classes/Calendar.php';
require_once '../db_connection.php';

try {
    $calendar = new Calendar($pdo);
    $events = $calendar->getAllEvents();
    
    // Format events for FullCalendar
    $formattedEvents = [];
    foreach ($events as $event) {
        $formattedEvent = [
            'id' => $event['id'],
            'title' => $event['title'],
            'start' => $event['start'],
            'description' => $event['description'] ?? '',
            'color' => $event['color'] ?? '#3c8dbc',
            'extendedProps' => [
                'rawTitle' => $event['title'],
                'startTime' => isset($event['start']) ? date('H:i:s', strtotime($event['start'])) : '',
            ]
        ];
        
        if (isset($event['end']) && !empty($event['end'])) {
            $formattedEvent['end'] = $event['end'];
            $formattedEvent['extendedProps']['endTime'] = date('H:i:s', strtotime($event['end']));
        }
        
        $formattedEvents[] = $formattedEvent;
    }
    
    echo json_encode($formattedEvents);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Database error',
        'message' => $e->getMessage()
    ]);
}
?>