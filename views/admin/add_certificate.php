<?php
session_start();
header('Content-Type: application/json');

require_once '../db_connection.php'; 
require_once '../classes/Certificate.php'; 
require_once '../classes/Log.php';

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);
$certName = trim($input['name'] ?? '');
$admin_id = $_SESSION['admin_id'] ?? null;

if (empty($certName)) {
    echo json_encode(['success' => false, 'message' => 'Certificate name is required.']);
    exit;
}

if (empty($admin_id)) {
    echo json_encode(['success' => false, 'message' => 'Admin not logged in.']);
    exit;
}

try {
    $certificate = new Certificate($pdo);
    $result = $certificate->addCertificate($certName, $admin_id);

    if ($result['success']) {
        // Get the certificate ID (handles both new and reactivated cases)
        $certificate_id = $result['certificate_id'] ?? $pdo->lastInsertId();
        $description = isset($result['reactivated']) 
            ? "Reactivated certificate: \"$certName\"" 
            : "Added new certificate: \"$certName\"";
        
        logActivity($pdo, 'CREATE', 'certificate_type', $certificate_id, $admin_id, $description);
    }

    echo json_encode($result);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}