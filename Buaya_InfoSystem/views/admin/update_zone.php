<?php
session_start();
require_once '../db_connection.php';
require_once 'adminSession.php';
require_once '../classes/Log.php';  // Make sure to require your logger function file

header('Content-Type: application/json');

if (!isset($_POST['zone_id']) || !isset($_POST['zone_name'])) {
    echo json_encode(['success' => false, 'message' => 'Missing data']);
    exit;
}

$zoneId = $_POST['zone_id'];
$zoneName = $_POST['zone_name'];
$admin_id = $_SESSION['admin_id'];

try {
    // Update the zone
    $stmt = $pdo->prepare("UPDATE zone SET zone_name = :zone_name WHERE zone_id = :zone_id");
    $stmt->execute([
        ':zone_name' => $zoneName,
        ':zone_id' => $zoneId
    ]);

    // Fetch updated zone
    $stmt = $pdo->prepare("SELECT * FROM zone WHERE zone_id = :zone_id");
    $stmt->execute([':zone_id' => $zoneId]);
    $updatedZone = $stmt->fetch(PDO::FETCH_ASSOC);

    // Log the activity using your function
    $actionType = 'UPDATE';
    $tableName = 'zone';
    $referenceId = $zoneId;
    $description = "Updated zone name to '{$zoneName}'";

    logActivity($pdo, $actionType, $tableName, $referenceId, $admin_id, $description);

    echo json_encode([
        'success' => true,
        'message' => 'Zone updated successfully!',
        'zone' => $updatedZone
    ]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
