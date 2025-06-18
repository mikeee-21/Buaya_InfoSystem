<?php
// Error Handling: log but do not show in browser
ini_set('display_errors', 0); // Don't show in browser
ini_set('log_errors', 1);     // Log errors
ini_set('error_log', __DIR__ . '/error_log.txt'); // Log file path

// Set JSON content type
header('Content-Type: application/json');

// Report all errors (for logging)
error_reporting(E_ALL);

require_once '../db_connection.php';

try {
    // Fetch all roles
    $stmt = $pdo->prepare("SELECT role_id, role_name FROM role
                                  WHERE  role_name != 'super admin'");
    $stmt->execute();
    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Capitalize role names
    foreach ($roles as &$role) {
        $role['role_name'] = ucwords(strtolower($role['role_name']));
    }

    echo json_encode(['roles' => $roles]);
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo json_encode(['error' => 'Error fetching roles']);
}
?>
