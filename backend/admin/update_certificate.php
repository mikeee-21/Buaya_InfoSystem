<?php
include '../db_connection.php'; 
require_once '../classes/Log.php'; 

header('Content-Type: application/json');
session_start();

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id']) || !isset($data['name']) || trim($data['name']) === '') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid input. Certificate ID and name are required.'
    ]);
    exit;
}

$id = $data['id'];
$name = trim($data['name']);
$adminId = $_SESSION['admin_id'] ?? null;

try {
    $check = $pdo->prepare("SELECT cer_type_id FROM certificate_type WHERE cer_type_name = ? AND cer_type_id != ?");
    $check->execute([$name, $id]);

    if ($check->rowCount() > 0) {
        echo json_encode([
            'success' => false,
            'message' => 'Certificate name already exists.'
        ]);
        exit;
    }

    $stmt = $pdo->prepare("UPDATE certificate_type SET cer_type_name = ? WHERE cer_type_id = ?");
    $stmt->execute([$name, $id]);

    // 🔒 Log the update
    if ($adminId) {
        $description = "Updated certificate type ID $id to name '$name'";
        logActivity($pdo, "UPDATE", "certificate_type", $id, $adminId, $description);
    }

    echo json_encode([
        'success' => true,
        'message' => 'Certificate updated successfully.'
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>
