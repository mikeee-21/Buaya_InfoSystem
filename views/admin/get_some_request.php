<?php
// File: ../backend/admin/get_pending_requests.php

require_once '../db_connection.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

try {

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to get 5 pending requests with certificate type information
    $query = "
        SELECT 
            rd.req_id,
            rd.req_first_name,
            rd.req_last_name,
            rd.req_middle_name,
            rd.req_suffix,
            rd.req_purpose,
            rd.req_requested_date,
            rd.req_requested_time,
            rd.req_status,
            ct.cer_type_name,
            ct.cer_type_id
        FROM request_document rd
        LEFT JOIN certificate_type ct ON rd.cer_type_id = ct.cer_type_id
        WHERE rd.req_status = 'pending'
        ORDER BY rd.req_requested_date DESC, rd.req_requested_time DESC
        LIMIT 5
    ";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Format the results for better frontend consumption
    $formattedResults = array_map(function($row) {
        // Build full name
        $fullName = trim($row['req_first_name'] . ' ' . 
                        ($row['req_middle_name'] ? $row['req_middle_name'] . ' ' : '') . 
                        $row['req_last_name'] . ' ' . 
                        ($row['req_suffix'] ? $row['req_suffix'] : ''));
        
        // Format date and time
        $requestDateTime = new DateTime($row['req_requested_date'] . ' ' . $row['req_requested_time']);
        $timeAgo = getTimeAgo($requestDateTime);
        
        return [
            'req_id' => $row['req_id'],
            'full_name' => $fullName,
            'first_name' => $row['req_first_name'],
            'last_name' => $row['req_last_name'],
            'middle_name' => $row['req_middle_name'],
            'suffix' => $row['req_suffix'],
            'purpose' => $row['req_purpose'],
            'certificate_type' => $row['cer_type_name'] ?? 'Unknown',
            'request_date' => $row['req_requested_date'],
            'request_time' => $row['req_requested_time'],
            'status' => $row['req_status'],
            'time_ago' => $timeAgo,
            'formatted_date' => $requestDateTime->format('M d, Y'),
            'formatted_time' => $requestDateTime->format('h:i A')
        ];
    }, $results);
    
    echo json_encode([
        'success' => true,
        'data' => $formattedResults,
        'count' => count($formattedResults)
    ]);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Database connection failed: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'An error occurred: ' . $e->getMessage()
    ]);
}

function getTimeAgo($datetime) {
    $now = new DateTime();
    $diff = $now->getTimestamp() - $datetime->getTimestamp(); // Get difference in seconds
    
    if ($diff < 0) {
        return 'Just now'; // Future time (shouldn't happen)
    }
    
    if ($diff < 60) { // Less than 1 minute
        return 'Just now';
    } elseif ($diff < 3600) { // Less than 1 hour
        $minutes = floor($diff / 60);
        return $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 86400) { // Less than 1 day
        $hours = floor($diff / 3600);
        return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 604800) { // Less than 1 week
        $days = floor($diff / 86400);
        if ($days == 1) {
            return 'Yesterday';
        }
        return $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 2592000) { // Less than 1 month (~30 days)
        $weeks = floor($diff / 604800);
        return $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 31536000) { // Less than 1 year
        $months = floor($diff / 2592000);
        return $months . ' month' . ($months > 1 ? 's' : '') . ' ago';
    } else {
        $years = floor($diff / 31536000);
        return $years . ' year' . ($years > 1 ? 's' : '') . ' ago';
    }
}
?>