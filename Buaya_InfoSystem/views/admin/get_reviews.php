<?php
header('Content-Type: application/json');
require_once '../db_connection.php';
require_once '../classes/Review.php';

try {
    $review = new Review($pdo);
    $result = $review->getAllReviews();

    echo json_encode($result);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
