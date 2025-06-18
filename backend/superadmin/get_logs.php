<?php
header('Content-Type: application/json');
require_once '../db_connection.php';
require_once '../classes/Activity_Log.php';

$activityLog = new Log($pdo);
echo json_encode($activityLog->getAllLogs());
?>