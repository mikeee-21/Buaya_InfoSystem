<?php
session_start();
require_once '../db_connection.php';
require_once '../classes/Log.php'; // Logging class
header('Content-Type: application/json');

$off_id    = $_POST['off_id'];
$pos_id    = $_POST['edit_position'];
$term_from = $_POST['edit_term_from'];
$term_to   = $_POST['edit_term_to'];
$committee = $_POST['add_committee'];
$description = $_POST['add_description'];
$admin_id  = $_SESSION['admin_id'];

try {
    $stmt = $pdo->prepare("SELECT pos_name FROM position WHERE pos_id = ?");
    $stmt->execute([$pos_id]);
    $position = $stmt->fetchColumn();

    if (!$position) {
        echo json_encode(['status' => 'error', 'message' => 'This position does not exist. Please create the position first.']);
        exit;
    }

    $positionLower = strtolower($position);
    $singlePositions = ['captain', 'sk chairman', 'secretary', 'treasurer'];
    $multiplePositions = ['councilor', 'sk councilor'];

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM official WHERE pos_id = ? AND off_id != ?");
    $stmt->execute([$pos_id, $off_id]);
    $count = $stmt->fetchColumn();

    if (in_array($positionLower, $singlePositions) && $count >= 1) {
        echo json_encode(['status' => 'error', 'message' => "Only one $positionLower is allowed."]);
        exit;
    }

    if (in_array($positionLower, $multiplePositions) && $count >= 7) {
        echo json_encode(['status' => 'error', 'message' => "Only 7 $positionLower positions are allowed."]);
        exit;
    }

    $stmt = $pdo->prepare("SELECT res_id FROM official WHERE off_id = ?");
    $stmt->execute([$off_id]);
    $resident_id = $stmt->fetchColumn();

    if (!$resident_id) {
        echo json_encode(['status' => 'error', 'message' => 'Resident not found for this official.']);
        exit;
    }

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM official WHERE res_id = ? AND off_id != ?");
    $stmt->execute([$resident_id, $off_id]);
    $resident_count = $stmt->fetchColumn();

    if ($resident_count > 0) {
        echo json_encode(['status' => 'error', 'message' => 'This resident already holds another official position.']);
        exit;
    }

    $sql = "UPDATE official 
            SET pos_id = ?, off_start_term = ?, off_end_term = ?, off_committee = ?, 
                off_description = ?, admin_id = ?
            WHERE off_id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $pos_id, $term_from, $term_to, $committee, $description, $admin_id, $off_id
    ]);

    // 🔐 Log the update
    $stmt = $pdo->prepare("SELECT pos_name FROM position WHERE pos_id = ?");
    $stmt->execute([$pos_id]);
    $position_name = $stmt->fetchColumn();

    $descriptionLog = "Updated official ID $off_id — Assigned position: '$position_name', Term: $term_from to $term_to, Committee: '$committee'";
    logActivity($pdo, "UPDATE", "official", $off_id, $admin_id, $descriptionLog);

    echo json_encode(['status' => 'success', 'message' => 'Official profile updated successfully.']);

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
