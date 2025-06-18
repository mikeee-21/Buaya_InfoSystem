<?php
header('Content-Type: application/json');
require_once '../db_connection.php';
require_once '../classes/Activity_Log.php';

$log = new Log($pdo);
$result = $log->getRecentLogs(10);

echo json_encode($result);

?>