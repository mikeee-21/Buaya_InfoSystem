<?php
require_once '../db_connection.php';

$sql = "SELECT COUNT(*) AS total FROM admin_account WHERE admin_status = FALSE";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(['total' => $result['total']]);
?>
