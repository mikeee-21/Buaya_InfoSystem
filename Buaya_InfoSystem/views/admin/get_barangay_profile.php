<?php
require_once '../db_connection.php';
require_once '../classes/Barangay.php';

header('Content-Type: application/json');

try {
    $barangay = new Barangay($pdo);
    $profile = $barangay->getDefaultBarangayProfile();
    
    if ($profile) {
        echo json_encode($profile);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "No barangay profile found"]);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Server error: " . $e->getMessage()]);
}