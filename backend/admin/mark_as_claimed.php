<?php
// File: ../backend/admin/mark_as_claimed.php
require_once '../db_connection.php';
require_once '../classes/Log.php'; // Make sure this path is correct
header('Content-Type: application/json');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $reqId = $data['req_id'] ?? 0;
    
    try {
        $pdo->beginTransaction();
        
        // First, get the requester's details
        $stmt = $pdo->prepare("
            SELECT req_first_name, req_last_name, req_middle_name, req_suffix, res_id 
            FROM request_document 
            WHERE req_id = ?
        ");
        $stmt->execute([$reqId]);
        $requestInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$requestInfo) {
            throw new Exception("Request document not found with ID: $reqId");
        }
        
        // Format the full name
        $fullName = trim($requestInfo['req_first_name'] . ' ' . $requestInfo['req_last_name']);
        if (!empty($requestInfo['req_middle_name'])) {
            $fullName .= ' ' . $requestInfo['req_middle_name'];
        }
        if (!empty($requestInfo['req_suffix'])) {
            $fullName .= ' ' . $requestInfo['req_suffix'];
        }
        
        // Update the claim status
        $stmt = $pdo->prepare("
            UPDATE request_document 
            SET req_claim_status = 'claimed',
                req_date_issued = CURRENT_DATE
            WHERE req_id = ?
        ");
        $stmt->execute([$reqId]);
        
        // Log the activity
        $adminId = $_SESSION['admin_id'] ?? null;
        $resId = $requestInfo['res_id'] ?? null;
        
        $logSuccess = logActivity(
            $pdo,
            'UPDATE', // actionType
            'request_document', // tableName
            $reqId, // referenceId
            $adminId, // adminId
            "Marked document as claimed for: $fullName (Request ID: $reqId)", // description
            $resId // resId
        );
        
        if (!$logSuccess) {
            error_log("Failed to log claim activity for request_document ID: $reqId");
        }
        
        $pdo->commit();
        echo json_encode([
            'success' => true,
            'message' => 'Document marked as claimed successfully'
        ]);
    } catch (PDOException $e) {
        $pdo->rollBack();
        error_log("Database error: " . $e->getMessage());
        echo json_encode([
            'success' => false,
            'error' => 'Database error: ' . $e->getMessage()
        ]);
    } catch (Exception $e) {
        $pdo->rollBack();
        error_log("Error: " . $e->getMessage());
        echo json_encode([
            'success' => false,
            'error' => $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid request method'
    ]);
}