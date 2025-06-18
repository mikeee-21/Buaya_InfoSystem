<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');

header('Content-Type: application/json');
error_reporting(E_ALL);

require_once '../db_connection.php';

try {
    // Fetch all permission groups
    $stmt = $pdo->prepare("
        SELECT pg.group_id, pg.group_name, p.per_id, p.per_name
        FROM permission_group pg
        LEFT JOIN permision p ON p.group_id = pg.group_id
        WHERE pg.group_name != 'Admin Management'
        ORDER BY pg.group_name, p.per_name
    ");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Organize into groups
    $groups = [];
    foreach ($rows as $row) {
        $group_id = $row['group_id'];
        if (!isset($groups[$group_id])) {
            $groups[$group_id] = [
                'group_id' => $group_id,
                'group_name' => ucwords(strtolower($row['group_name'])),
                'permissions' => []
            ];
        }
        if (!empty($row['per_id'])) {
            $groups[$group_id]['permissions'][] = [
                'per_id' => $row['per_id'],
                'per_name' => ucwords(strtolower($row['per_name']))
            ];
        }
    }

    echo json_encode(['groups' => array_values($groups)]);
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    echo json_encode(['error' => 'Error fetching permission groups']);
}
