<?php
session_start();
require_once '../db_connection.php';
require_once '../classes/Certificate.php';
require_once '../classes/Log.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$cert_id = $data['id'] ?? null;
$admin_id = $_SESSION['admin_id'] ?? null;

// Validate session
if (!$admin_id) {
    echo json_encode([
        'success' => false,
        'message' => 'Session expired or not logged in.'
    ]);
    exit;
}

// Validate input
if (!$cert_id) {
    echo json_encode([
        'success' => false,
        'message' => 'Certificate ID is invalid.'
    ]);
    exit;
}

try {
    $certificate = new Certificate($pdo);
    $result = $certificate->deleteCertificate($cert_id, $admin_id);
    
    echo json_encode([
        'success' => true,
        'message' => 'Certificate deleted successfully.'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}