<?php
require_once '../db_connection.php';
header('Content-Type: application/json');

try {
    $query = "SELECT pos_id, pos_name, pos_limit, pos_description FROM position ORDER BY pos_name";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    $positions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'status' => 'success',
        'data' => $positions
    ]);
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
?>
