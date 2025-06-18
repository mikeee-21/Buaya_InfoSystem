<?php
require_once '../db_connection.php';

$sql = "SELECT 
    a.admin_id, a.admin_fname, a.admin_mname, a.admin_lname, a.admin_suffix,
    a.admin_username, a.admin_password, a.admin_contact, a.admin_email, a.admin_image,
    r.role_name, 
    STRING_AGG(DISTINCT pg.group_name, ', ') AS permission_group,
    b.bar_name
    FROM admin_account a
    JOIN role r ON a.role_id = r.role_id
    JOIN role_permision rp ON r.role_id = rp.role_id
    JOIN permision p ON rp.per_id = p.per_id
    JOIN permission_group pg ON p.group_id = pg.group_id
    LEFT JOIN barangay_profile b ON a.bar_id = b.bar_id
    WHERE a.role_id != 1 AND a.admin_status = TRUE
    GROUP BY a.admin_id, r.role_name, b.bar_name";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($admins as &$admin) {
    $admin['admin_fname'] = ucwords(strtolower($admin['admin_fname']));
    $admin['admin_mname'] = ucwords(strtolower($admin['admin_mname']));
    $admin['admin_lname'] = ucwords(strtolower($admin['admin_lname']));
    $admin['admin_suffix'] = ucwords(strtolower($admin['admin_suffix']));
    $admin['role_name'] = ucwords(strtolower($admin['role_name']));
    $admin['permission_group'] = ucwords(strtolower($admin['permission_group']));
    $admin['bar_name'] = ucwords(strtolower($admin['bar_name']));
}

echo json_encode($admins);
?>
