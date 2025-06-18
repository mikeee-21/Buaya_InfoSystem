<?php
session_start();
require_once '../db_connection.php';
require_once '../classes/Zone.php';  
require_once '../classes/Log.php';

header('Content-Type: application/json');

if (!isset($_SESSION['admin_id'])) {
    echo json_encode(['success' => false, 'message' => 'Admin not logged in']);
    exit;
}

$zone_name = $_POST['zone_name'] ?? '';
$admin_id = $_SESSION['admin_id'];

try {
    $zone = new Zone($pdo);
    $zone_id = $zone->addZone($zone_name, $admin_id);

    // Log the activity
    logActivity(
        $pdo,
        'CREATE',
        'zone',
        $zone_id,
        $admin_id,
        "Added new zone: $zone_name"
    );

    echo json_encode(['success' => true, 'message' => 'Zone added successfully']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}