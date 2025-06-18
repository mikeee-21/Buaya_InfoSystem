<?php
    require_once '../db_connection.php';

    $sql    = "SELECT zone_id, zone_name FROM zone ORDER BY zone_id ASC"; // Modify this query based on your table structure
    $stmt   = $pdo->prepare($sql);
    $stmt->execute();
    $zones  = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($zones);
?>
