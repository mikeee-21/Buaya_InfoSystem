<?php
require_once '../db_connection.php';

try {
    $stmt = $pdo->prepare("
        SELECT a.admin_id, a.admin_username, a.admin_email, s.login_time
        FROM admin_account a
        INNER JOIN admin_session s ON a.admin_id = s.admin_id
        WHERE s.is_active = TRUE AND a.admin_id != 10001
    ");
    $stmt->execute();
    $activeAdmins = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($activeAdmins as &$admin) {
        $dt = new DateTime($admin['login_time']);
        $admin['login_time'] = $dt->format('F d, Y h:i A');
    }

    echo json_encode([
        'total_active' => count($activeAdmins),
        'admins' => $activeAdmins
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
