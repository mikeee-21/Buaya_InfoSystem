<?php
session_start();
require_once '../db_connection.php';
require_once '../classes/Log.php';

header('Content-Type: application/json');

// Get JSON input and decode
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;
$status = $data['status'] ?? null;
$admin_id = $_SESSION['admin_id'] ?? null;

if (!$id || !$status || !$admin_id) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data or unauthorized']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE resident SET res_status = :status WHERE res_id = :id");
    $stmt->execute([
        ':status' => $status,
        ':id' => $id
    ]);

    // Optional: Get resident name for the log
    $stmt = $pdo->prepare("SELECT res_first_name, res_last_name FROM resident WHERE res_id = ?");
    $stmt->execute([$id]);
    $resident = $stmt->fetch(PDO::FETCH_ASSOC);
    $residentName = $resident ? $resident['res_fname'] . ' ' . $resident['res_lname'] : "Resident ID $id";

    $logDesc = "Updated status of $residentName to '$status'";
    logActivity($pdo, "UPDATE", "resident", $id, $admin_id, $logDesc);

    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
