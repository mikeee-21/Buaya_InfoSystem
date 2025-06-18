<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

include_once('../db_connection.php');

$role_id = $_GET['role_id'];

// Fetch role name
$roleQuery = "SELECT role_name FROM role WHERE role_id = :role_id";
$roleStmt = $pdo->prepare($roleQuery);
$roleStmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);
$roleStmt->execute();
$role = $roleStmt->fetch(PDO::FETCH_ASSOC);

// Get permission groups with their permissions and check if each permission is active for the role
$query = "
  SELECT 
    pg.group_id,
    pg.group_name,
    p.per_id,
    p.per_name,
    CASE WHEN rp.role_id IS NOT NULL THEN 1 ELSE 0 END AS is_active
  FROM permission_group pg
  JOIN permision p ON pg.group_id = p.group_id
  LEFT JOIN role_permision rp ON rp.per_id = p.per_id AND rp.role_id = :role_id
  WHERE rp.role_id = :role_id
  ORDER BY pg.group_name, p.per_name
";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);
$stmt->execute();

$rawPermissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Group permissions by group_id
$grouped = [];
foreach ($rawPermissions as $row) {
    $groupId = $row['group_id'];
    if (!isset($grouped[$groupId])) {
        $grouped[$groupId] = [
            'group_id' => $row['group_id'],
            'group_name' => $row['group_name'],
            'permissions' => []
        ];
    }

    $grouped[$groupId]['permissions'][] = [
        'per_id' => $row['per_id'],
        'per_name' => ucwords(strtolower($row['per_name'])),
        'is_active' => $row['is_active']
    ];
}

// Return as JSON
echo json_encode([
    'role_name' => $role['role_name'] ?? 'Unknown Role',
    'groups' => array_values($grouped)
]);
?>
