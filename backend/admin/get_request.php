<?php

require_once '../db_connection.php'; 

try {
    $query = "SELECT rd.*, ct.cer_type_name 
              FROM request_document rd
              LEFT JOIN certificate_type ct ON rd.cer_type_id = ct.cer_type_id
              ORDER BY rd.req_requested_date DESC, rd.req_requested_time DESC";
    $stmt = $pdo->query($query);
    $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Count pending requests
    $pendingCount = 0;
    $countStmt = $pdo->query("SELECT COUNT(*) FROM request_document WHERE req_status = 'pending'");
    $pendingCount = $countStmt->fetchColumn();
    
    // Return both data and count
    echo json_encode([
        'success' => true,
        'data' => $requests,
        'pendingCount' => $pendingCount
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Database error: ' . $e->getMessage()
    ]);
}
?>