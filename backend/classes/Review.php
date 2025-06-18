<?php

class Review {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function submitReview($description, $rating, $guestName) {
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $status = 'pending';

        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO review (
                    rev_description,
                    rev_posted_date,
                    rev_posted_time,
                    rev_rate,
                    rev_guest_name,
                    rev_status
                ) VALUES (?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([$description, $date, $time, $rating, $guestName, $status]);

            return ['status' => 'success', 'message' => 'Feedback submitted.'];
        } catch (PDOException $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function markAsRead($reviewId, $adminId) {
        try {
            $query = "UPDATE review SET rev_status = 'read', admin_id = :admin_id WHERE rev_id = :review_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':review_id', $reviewId, PDO::PARAM_INT);
            $stmt->bindParam(':admin_id', $adminId, PDO::PARAM_INT);
            $stmt->execute();

            return ['success' => true, 'message' => 'Review marked as read successfully.'];
        } catch (PDOException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function getAllReviews() {
        try {
            $query = "SELECT * FROM review ORDER BY rev_posted_date DESC, rev_posted_time DESC";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
?>
