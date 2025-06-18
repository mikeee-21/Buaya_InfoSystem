<?php

class Log {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // superadmin part
    public function getRecentLogs($limit = 10) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT 
                    a.act_log_description,
                    a.act_log_timestamp,
                    ad.admin_fname,
                    ad.admin_lname
                FROM activity_log a
                JOIN admin_account ad ON a.admin_id = ad.admin_id
                ORDER BY a.act_log_timestamp DESC
                LIMIT :limit
            ");
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->execute();

            $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $formattedLogs = array_map(function ($log) {
                $timestamp = new DateTime($log['act_log_timestamp']);
                
                $fullName = $log['admin_fname'] . ' ' . $log['admin_lname'];
                if (trim(strtolower($fullName)) === 'super admin super admin') {
                    $adminName = $log['admin_fname'];  // Only first name
                } else {
                    $adminName = $fullName;
                }

                return [
                    'action' => $log['act_log_description'],
                    'admin_name' => $adminName,
                    'timestamp' => $timestamp->format('h:i A'),
                    'date' => $timestamp->format('F j, Y')
                ];
            }, $logs);

            return $formattedLogs;
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }



    // admin part
     public function getAllLogs() {
        try {
            $stmt = $this->pdo->prepare("
                SELECT 
                    a.act_log_description,
                    a.act_log_timestamp,
                    ad.admin_fname,
                    ad.admin_lname
                FROM activity_log a
                JOIN admin_account ad ON a.admin_id = ad.admin_id
                ORDER BY a.act_log_timestamp DESC
            ");
            $stmt->execute();

            $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $formattedLogs = array_map(function ($log) {
                $timestamp = new DateTime($log['act_log_timestamp']);
                return [
                    'action' => $log['act_log_description'],
                    'admin_name' => $log['admin_fname'] . ' ' . $log['admin_lname'],
                    'timestamp' => $timestamp->format('h:i A'),
                    'date' => $timestamp->format('F j, Y')
                ];
            }, $logs);

            return $formattedLogs;
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }


}
?>