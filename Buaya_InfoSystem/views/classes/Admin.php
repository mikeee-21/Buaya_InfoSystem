<?php

    // Admin.php
// Admin.php
class Admin {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getActiveAdmins() {
        $query = "SELECT aa.admin_id, aa.admin_fname, aa.admin_lname, aa.admin_image 
                  FROM admin_account aa
                  JOIN admin_session asess ON aa.admin_id = asess.admin_id
                  WHERE aa.admin_status = true
                  AND asess.is_active = true
                  ORDER BY aa.admin_fname";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecentLoginHistory($limit = 30) {
        $query = "SELECT 
                    a.admin_username,
                    a.admin_fname,
                    a.admin_lname,
                    s.login_time,
                    s.logout_time,
                    s.is_active
                  FROM admin_session s
                  JOIN admin_account a ON s.admin_id = a.admin_id
                  ORDER BY s.login_time DESC
                  LIMIT :limit";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countRecentLogins() {
        $query = "SELECT COUNT(*) 
                FROM (
                    SELECT s.ses_id
                    FROM admin_session s
                    ORDER BY s.login_time DESC
                ) AS recent";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(); // No bindValue needed here
        return (int) $stmt->fetchColumn();
    }




}



?>