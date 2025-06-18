<?php
class Position {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addPosition($name, $limit, $description, $admin_id) {

        $stmt = $this->pdo->prepare("INSERT INTO position (pos_name, pos_limit, pos_description, admin_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $limit, $description, $admin_id]);
        
    }
}

?>