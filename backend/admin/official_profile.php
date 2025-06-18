<?php
require_once '../db_connection.php';
header('Content-Type: application/json');



$resId = $_GET['res_id'] ?? null;

if (!is_numeric($resId)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid Resident ID']);
    exit;
}


try {
    $stmt = $pdo->prepare("
        SELECT 
            r.*,
            b.bar_province,
            b.bar_municipality,
            b.bar_zip_code,
            b.bar_barangay,
            
            o.*,

            p.pos_name,
            p.pos_id
            
        FROM resident r
        JOIN barangay_profile b ON r.bar_id = b.bar_id
        JOIN official o ON r.res_id = o.res_id
        JOIN position p ON o.pos_id = p.pos_id
        WHERE r.res_id = ? AND o.off_is_deleted = false
    ");
    $stmt->execute([$resId]);
    $official = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($official) {
        echo json_encode(['status' => 'success', 'data' => $official]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Official not found']);
    }

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
