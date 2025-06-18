<?php
session_start();
header('Content-Type: application/json');
require_once '../db_connection.php';
require_once '../classes/Review.php';

$adminId = $_SESSION['admin_id'] ?? null;
$reviewId = $_POST['review_id'] ?? null;

try {
    if (!$adminId) throw new Exception('Admin not logged in.');
    if (!$reviewId) throw new Exception('Review ID is required.');

    $review = new Review($pdo);
    $result = $review->markAsRead($reviewId, $adminId);

    echo json_encode($result);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
