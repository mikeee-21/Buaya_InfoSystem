<?php
// get_barangay.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    // Include database connection and Barangay class
    require_once '../db_connection.php';
    require_once '../classes/Barangay.php'; // Adjust path as needed
    
    // Create Barangay instance
    $barangay = new Barangay($pdo);
    
    // Get barangay profile data
    $barangay_id = 10001; // You can make this dynamic if needed
    $data = $barangay->getBarangayProfile_RES($barangay_id);
    
    if ($data) {
        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No barangay data found for ID: ' . $barangay_id
        ]);
    }
    
} catch (Exception $e) {
    error_log("Error in get_barangay.php: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while fetching barangay data'
    ]);
}
?>