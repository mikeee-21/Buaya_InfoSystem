<?php
session_start();
require_once '../db_connection.php';
require_once '../classes/Official.php';
require_once '../classes/Log.php';

header('Content-Type: application/json');

if (!isset($_SESSION['admin_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Admin not logged in.']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

$resident_id = $data['resident_id'];
$position_id = $data['position'];
$term_from   = $data['term_from'];
$term_to     = $data['term_to'];
$committee   = trim($data['committee']);  // Remove leading/trailing spaces
$committee   = ucwords(strtolower($committee));  // Capitalize each word
$description = $data['description'];
$admin       = $_SESSION['admin_id'];

try {
    $official = new Official($pdo);
    $success = $official->addOfficial($resident_id, $position_id, $term_from, $term_to, $committee, $description, $admin);

    if ($success) {
        // Log the activity
        $position = $official->getPositionName($position_id);
        $descriptionLog = "Added new official: Resident ID $resident_id as $position from $term_from to $term_to";
        logActivity($pdo, 'CREATE', 'official', $resident_id, $admin, $descriptionLog);

        echo json_encode(['status' => 'success', 'message' => 'Official added successfully!']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>