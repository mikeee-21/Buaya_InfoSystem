<?php
require_once '../db_connection.php';
require_once '../classes/Review.php';

date_default_timezone_set('Asia/Manila');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = trim($_POST['feedback']);
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : null;
    $guestName = trim($_POST['guest_name']);

    if (empty($feedback) || empty($guestName)) {
        echo json_encode(['status' => 'error', 'message' => 'Feedback and name are required.']);
        exit;
    }

    $review = new Review($pdo);
    $result = $review->submitReview($feedback, $rating, $guestName);

    echo json_encode($result);
}

?>
