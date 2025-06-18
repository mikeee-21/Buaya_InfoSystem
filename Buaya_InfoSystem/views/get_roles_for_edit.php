<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

include_once('db_connection.php');

// Fetch roles from the ROLE table
$query = "SELECT role_id, role_name FROM ROLE ORDER BY role_name";
$stmt = $pdo->prepare($query);
$stmt->execute();

$roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the roles as JSON
echo json_encode(['roles' => $roles]);
?>
