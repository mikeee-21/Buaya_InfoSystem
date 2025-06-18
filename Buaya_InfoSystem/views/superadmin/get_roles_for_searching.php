<?php
require_once '../db_connection.php';

try {
  $stmt = $pdo->query("SELECT DISTINCT role_name FROM role ORDER BY role_name ASC");
  $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);


      // Capitalize role names
      foreach ($roles as &$role) {
        $role['role_name'] = ucwords(strtolower($role['role_name']));
    }

    
  echo json_encode($roles);
} catch (PDOException $e) {
  echo json_encode([]);
}
