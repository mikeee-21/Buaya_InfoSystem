<?php
require_once '../db_connection.php'; // adjust as needed

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "No admin ID provided."]);
    exit;
}

$admin_id = $_GET['id'];

try {
    // 1. Get the admin info including the role_id
    $stmt = $pdo->prepare("SELECT * FROM admin_account WHERE admin_id = ?");
    $stmt->execute([$admin_id]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$admin) {
        echo json_encode(["error" => "Admin not found."]);
        exit;
    }

    // 2. Get the role name
    $stmt = $pdo->prepare("SELECT role_name FROM role WHERE role_id = ?");
    $stmt->execute([$admin['role_id']]);
    $role = $stmt->fetchColumn();

    // 3. Get the permission names through the role_permission table
    $stmt = $pdo->prepare("
        SELECT p.per_name 
        FROM role_permision rp
        JOIN permision p ON rp.per_id = p.per_id
        WHERE rp.role_id = ?
    ");
    $stmt->execute([$admin['role_id']]);
    $permissions = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // 4. Combine all data into response
    $response = $admin;
    $response['role_name'] = $role;
    $response['permissions'] = $permissions;

    echo json_encode($response);
} catch (PDOException $e) {
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
}
