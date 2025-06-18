<?php
require_once '../db_connection.php';
require_once '../classes/Resident.php';
require_once '../classes/Log.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['res_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Resident ID is required']);
    exit;
}

$res_id = $data['res_id'];

try {
    session_start();
    $admin_id = $_SESSION['admin_id'] ?? null;
    
    $resident = new Resident($pdo);
    
    // First check if resident exists and is active
    if (!$resident->existsAndActive($res_id)) {
        echo json_encode(['status' => 'error', 'message' => 'Resident not found or already archived']);
        exit;
    }

    // Archive the resident
    if ($resident->archive($res_id)) {
        logActivity(
            $pdo,
            'UPDATE',
            'resident',
            $res_id,
            $admin_id,
            'Archived resident and set status to inactive'
        );
        echo json_encode(['status' => 'success', 'message' => 'Resident archived successfully']);
    } else {
        throw new Exception($resident->getLastError() ?: 'Failed to archive resident');
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}