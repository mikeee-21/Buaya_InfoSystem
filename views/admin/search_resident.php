<?php
require_once '../db_connection.php';
header('Content-Type: application/json');

// Get the POST data
$data = json_decode(file_get_contents("php://input"));

// Validate input
if (!isset($data->id)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Missing resident ID.'
    ]);
    exit;
}

$searchId = $data->id;

// Use ID for exact search
$query = "SELECT 
            r.*,
            b.bar_province,
            b.bar_municipality,
            b.bar_barangay,
            b.bar_zip_code
        FROM 
            resident r
        JOIN 
            barangay_profile b 
        ON 
            r.bar_id = b.bar_id
        WHERE 
            r.res_id = ?";

$stmt = $pdo->prepare($query);
$stmt->execute([$searchId]);

$resident = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if a resident is found
if ($resident) {
    echo json_encode([
        'status' => 'success',
        'resident' => $resident
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Resident not found.'
    ]);
}
?>
