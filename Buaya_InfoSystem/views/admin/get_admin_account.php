<?php
require_once '../db_connection.php'; // database connection (PDO instance)

session_start();
$admin_id = $_SESSION['admin_id'];

try {
    $stmt = $pdo->prepare("

        SELECT aa.admin_fname, aa.admin_mname, aa.admin_lname, aa.admin_suffix, 
               aa.admin_username, aa.admin_password, aa.admin_image, aa.admin_email, aa.admin_contact,
               r.role_name, 
               STRING_AGG(DISTINCT p.per_name, ', ' ORDER BY p.per_name) AS permision

        FROM admin_account AS aa

        LEFT JOIN role AS r ON aa.role_id = r.role_id
        LEFT JOIN role_permision AS rp ON r.role_id = rp.role_id
        LEFT JOIN permision AS p ON rp.per_id = p.per_id
        
        WHERE aa.admin_id = ?
        GROUP BY aa.admin_id, r.role_name

    ");
    $stmt->execute([$admin_id]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {

        echo json_encode([
            'status' => 'success',
            'data' => $admin
        ]);

    } else {

        echo json_encode([
            'status' => 'error',
            'message' => 'Admin not found.'
        ]);

    }
} catch (PDOException $e) {

    echo json_encode([
        'status' => 'error',
        'message' => 'Database error: ' . $e->getMessage()
    ]);
    
}
?>
