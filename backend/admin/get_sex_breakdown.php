<?php
header('Content-Type: application/json');
include_once '../db_connection.php'; 
try {

    $stmt = $pdo->prepare("
        SELECT res_sex, COUNT(*) as count
        FROM resident
        GROUP BY res_sex
    ");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
