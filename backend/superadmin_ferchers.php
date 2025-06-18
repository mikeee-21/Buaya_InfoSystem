<?php
class SuperAdminFetcher {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getSuperAdmin() {
        $username = 'superadmin';
        $stmt = $this->pdo->prepare("SELECT * FROM admin_account WHERE admin_username = :username LIMIT 1");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $superadmin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($superadmin) {
            return $superadmin;
        } else {
            return null; // No superadmin found
        }
    }
}
?>
