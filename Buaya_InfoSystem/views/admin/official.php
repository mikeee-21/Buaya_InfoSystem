<?php
require_once "../db_connection.php";

try {
    // Fetch top 5 officials
    $stmt = $pdo->prepare("SELECT o.*, r.*, p.*
                           FROM official o 
                           JOIN resident r ON o.res_id = r.res_id
                           JOIN position p ON p.pos_id = o.pos_id
                           WHERE o.off_is_deleted = false
                           LIMIT 5");

    $stmt->execute();
    $officials = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($officials);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>