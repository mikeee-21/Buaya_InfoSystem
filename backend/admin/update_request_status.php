<?php
// update_request_status.php
require_once '../db_connection.php';
require_once '../classes/Log.php';
require_once '../classes/Request.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json');

ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

try {
    $input = json_decode(file_get_contents('php://input'), true);

    $reqId = $input['req_id'] ?? null;
    $status = $input['status'] ?? null;
    $message = $input['message'] ?? null;
    $dateIssued = $input['date_issued'] ?? null;
    $dateExpiration = $input['date_expiration'] ?? null;

    $adminId = $_SESSION['admin_id'] ?? null;

    if (!$reqId || !$status || !$adminId) {
        throw new Exception('Missing required parameters or admin ID');
    }

    $request = new Request($pdo);
    $result = $request->updateStatus($reqId, $status, $message, $dateIssued, $dateExpiration, $adminId);

    echo json_encode($result);

} catch (Exception $e) {
    error_log("Error updating request status: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}

