<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/adminSession.php';

function requirePermission($permission) {
    if (!isset($_SESSION['admin_object'])) {
        echo "<script>alert('You are not logged in.'); window.location.href='../admin/admin_login2.php';</script>";
        exit;
    }

    $admin = unserialize($_SESSION['admin_object']);
    if (!in_array($permission, $admin->getPermissions())) {
        echo "<script>alert('You’re not allowed to access this page.'); window.history.back();</script>";
        exit;
    }
}
