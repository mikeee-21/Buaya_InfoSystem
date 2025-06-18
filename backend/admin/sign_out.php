<?php
session_start();
require_once '../db_connection.php';
require_once '../classes/Log.php';

if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_session_id'])) {
    $adminId = $_SESSION['admin_id'];
    $sessionId = $_SESSION['admin_session_id'];
    $logoutTime = date('Y-m-d H:i:s');

    try {
        //  Step 1: Update the admin_session table to mark this session as inactive
        // Log out: Update session record
        // Set the default timezone (change 'Asia/Manila' to your desired time zone)
        date_default_timezone_set('Asia/Manila');
        $currentTime = date('Y-m-d H:i:s');

        $update = $pdo->prepare("UPDATE admin_session 
                                SET logout_time = :logout_time, is_active = FALSE 
                                WHERE admin_id = :admin_id AND is_active = TRUE");

        $update->bindParam(':admin_id', $adminId);
        $update->bindParam(':logout_time', $currentTime);
        $update->execute();

        // Log the logout activity
        $description = "Admin logged out";
        logActivity($pdo, "LOGOUT", "admin_account", $adminId, $adminId, $description);

    } catch (PDOException $e) {
        // Optional: log error if needed
        error_log("Logout error: " . $e->getMessage());
    }
}

//  Step 2: Destroy session
session_unset();
session_destroy();

//  Step 3: Redirect
header("Location: ../../resident/homepage.php");
exit;
?>
