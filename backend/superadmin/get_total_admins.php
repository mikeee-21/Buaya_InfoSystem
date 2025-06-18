<?php
require_once '../db_connection.php'; // adjust path if needed

$sql = "SELECT COUNT(*) AS total FROM admin_account";
$stmt = $pdo->prepare($sql);  // Using $pdo instead of $conn
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(['total' => $result['total']]);
?>
