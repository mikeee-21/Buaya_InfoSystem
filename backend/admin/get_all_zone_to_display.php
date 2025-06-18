<?php
include '../db_connection.php'; // Make sure this sets $pdo

try {
    $stmt = $pdo->prepare("SELECT zone_id, zone_name FROM zone
                                  ORDER BY zone_id ASC");
    $stmt->execute();

    $zones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($zones);
} catch (PDOException $e) {
    echo json_encode([]);
}
?>
