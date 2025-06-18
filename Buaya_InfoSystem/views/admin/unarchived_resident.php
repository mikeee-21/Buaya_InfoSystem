<?php
require_once '../db_connection.php';
require_once '../classes/Log.php'; 
$data = json_decode(file_get_contents('php://input'), true);


if (!isset($data['res_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Resident ID is required']);
    exit;
}

$res_id = $data['res_id'];

try {
    $stmt = $pdo->prepare("UPDATE resident SET is_archived = false, res_status = 'active' WHERE res_id = :res_id");
    $stmt->execute(['res_id' => $res_id]);

    // 📝 Log the restoration activity
    session_start(); // Make sure session is started to get admin_id
    $adminId = $_SESSION['admin_id'] ?? null;


    if ($adminId) {
        $description = "Restored resident with ID: $res_id";
        logActivity($pdo, "RESTORE", "resident", $res_id, $adminId, $description);
    }

    echo json_encode(['status' => 'success']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
