<?php
session_start();
require_once '../db_connection.php';
require_once 'adminSession.php';
require_once '../classes/Log.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Fetch admin info and role - ADD admin_status CHECK
        $stmt = $pdo->prepare("SELECT a.*, r.role_name 
                             FROM admin_account AS a 
                             JOIN role AS r ON a.role_id = r.role_id 
                             WHERE a.admin_username = :username
                             AND a.admin_status = true"); // Only active accounts

        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if account exists, is active, and password matches
        if ($admin && password_verify($password, $admin['admin_password'])) {
            // Check if account is locked
            if ($admin['admin_is_locked'] === true) {
                header("Location: ../../admin/admin_login2.php?error=account_locked");
                exit;
            }

            // Insert new session
            date_default_timezone_set('Asia/Manila');
            $now = date('Y-m-d H:i:s');
            
            $stmt = $pdo->prepare("INSERT INTO admin_session (admin_id, login_time, is_active) 
                                VALUES (:admin_id, :login_time, TRUE)");
            $stmt->bindParam(':admin_id', $admin['admin_id']);
            $stmt->bindParam(':login_time', $now);
            $stmt->execute();

            $sessionId = $pdo->lastInsertId();

            // Fetch permissions
            $permQuery = $pdo->prepare("SELECT p.per_name 
                                      FROM role_permision rp
                                      JOIN permision p ON rp.per_id = p.per_id
                                      WHERE rp.role_id = :role_id");
            $permQuery->bindParam(':role_id', $admin['role_id']);
            $permQuery->execute();
            $permissions = $permQuery->fetchAll(PDO::FETCH_COLUMN);

            // Create session object
            $adminSession = new AdminSession(
                $admin['admin_id'],
                $admin['admin_username'],
                $admin['role_id'],
                $admin['role_name'],
                $permissions
            );

            $_SESSION['admin_object'] = serialize($adminSession);
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['admin_session_id'] = $sessionId;
            $_SESSION['login_success'] = true;

            // Log the login activity
            $description = "Admin logged in (username: {$admin['admin_username']})";
            logActivity($pdo, "LOGIN", "admin_account", $admin['admin_id'], $admin['admin_id'], $description);

            // Redirect based on role
            if ($adminSession->isSuperAdmin()) {
                header("Location: ../../superadmin/dashboard.php");
            } else {
                header("Location: ../../admin/dashboard.php");
            }
            exit;

        } else {
            // More specific error messages
            $error = !$admin ? "account_inactive" : "invalid_credentials";
            header("Location: ../../admin/admin_login2.php?error=$error");
            exit;
        }

    } catch (PDOException $e) {
        error_log("Login error: " . $e->getMessage());
        header("Location: ../../admin/admin_login2.php?error=system_error");
        exit;
    }

} else {
    header("Location: ../../admin/admin_login2.php");
    exit();
}