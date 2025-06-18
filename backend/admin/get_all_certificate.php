<?php
require_once '../db_connection.php';
require_once '../classes/Certificate.php';

header('Content-Type: application/json');

try {
    $certificate = new Certificate($pdo);
    $result = $certificate->getCertificateStats();
    
    // Use the same response format as before
    if ($result['success']) {
        echo json_encode([
            'success' => true,
            'data' => $result['data']
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => $result['message']
        ]);
    }
    
} catch (Exception $e) {
    // Fallback error handling
    echo json_encode([
        'success' => false,
        'message' => 'Unexpected error: ' . $e->getMessage()
    ]);
}