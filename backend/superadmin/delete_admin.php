<?php
require_once '../db_connection.php';

$admin_id = $_POST['admin_id'] ?? null;

if ($admin_id) {
  try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Step 1: Update admin_status to FALSE (soft delete)
    $update = "UPDATE admin_account SET admin_status = FALSE WHERE admin_id = ?";
    $stmt = $pdo->prepare($update);
    $stmt->execute([$admin_id]);

    echo json_encode(['success' => true]);

  } catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Invalid ID']);
}
