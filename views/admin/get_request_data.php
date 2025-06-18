<?php
header('Content-Type: application/json');
require_once '../db_connection.php';

$requestId = $_GET['id'] ?? 0;

try {
    $stmt = $pdo->prepare("
        SELECT 
            r.*, 
            ct.cer_type_name,
            z.zone_name,
            res.*
        FROM request_document r
        LEFT JOIN resident res ON r.res_id = res.res_id
        JOIN certificate_type ct ON r.cer_type_id = ct.cer_type_id
        LEFT JOIN zone z ON res.zone_id = z.zone_id                 -- if zone_id is directly stored in request_document
        WHERE r.req_id = ?
    ");
    $stmt->execute([$requestId]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        // Age calculation
        if (!empty($data['req_date_of_birth'])) {
            $dob = new DateTime($data['req_date_of_birth']);
            $now = new DateTime();
            $data['age'] = $now->diff($dob)->y;
        } else {
            $data['age'] = null;
        }

        // Full name formatting
        $data['full_name'] = trim($data['req_first_name'] . ' ' . $data['req_last_name']);

        // Address formatting
        $zone = !empty($data['zone_name']) ? $data['zone_name'] : '_____';
        $data['address'] = $zone . ', Barangay Buaya, Lapu-Lapu City';

        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Request not found'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
}
?>
