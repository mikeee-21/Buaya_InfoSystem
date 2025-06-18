<?php
session_start();
require_once '../db_connection.php';
require_once '../classes/Position.php';

header('Content-Type: application/json');

// Ensure admin is logged in
if (!isset($_SESSION['admin_id'])) {

    echo json_encode(['success' => false, 'message' => 'Admin not logged in.']);
    exit;

}

$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($data['position']) || !isset($data['limit'])) {

    echo json_encode(['success' => false, 'message' => 'Required fields missing']);
    exit;

}

$position       = strtolower(trim($data['position']));
$limit          = intval($data['limit']);
$desc           = trim($data['description'] ?? '');
$admin_id       = $_SESSION['admin_id'];

// Map of exact limits for positions
$exactLimits = [
    'captain'       => 1,
    'sk chairman'   => 1,
    'secretary'     => 1,
    'treasurer'     => 1,
    'councilor'     => 7,
    'sk councilor'  => 7
];

// Check if the position is in the exact limits map
if (isset($exactLimits[$position])) {

    if ($limit != $exactLimits[$position]) {

        echo json_encode([

            'success' => false,
            'message' => "The limit for {$position} must be exactly {$exactLimits[$position]}."
            
        ]);
        exit;

    }
}

try {
    // Add the position
    $pos = new Position($pdo);
    $pos->addPosition($position, $limit, $desc, $admin_id);

    echo json_encode(['success' => true, 'message' => 'Position saved successfully!']);
    
} catch (PDOException $e) {

    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);

}
