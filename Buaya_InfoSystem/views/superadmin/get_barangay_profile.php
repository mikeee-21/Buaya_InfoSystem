<?php
require_once '../db_connection.php'; // Adjust path
require_once '../classes/Barangay.php'; // Adjust path

header('Content-Type: application/json');

try {
    $barangay = new Barangay($pdo);
    $profile = $barangay-> getBarangayProfileToEdit();
    
    if ($profile) {
        // Format time fields for HTML input
        $profile['bar_available_start_time'] = substr($profile['bar_available_start_time'], 0, 5);
        $profile['bar_available_end_time'] = substr($profile['bar_available_end_time'], 0, 5);
        
        echo json_encode([
            'success' => true,
            'data' => $profile
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Barangay profile not found'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}