<?php
header('Content-Type: application/json');
require_once '../db_connection.php';
require_once '../classes/Activity_Log.php';

$activityLog = new Log($pdo);
$result = $activityLog->getAllLogs();

echo json_encode($result);
?>