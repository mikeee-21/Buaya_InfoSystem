<?php
require_once '../classes/Official.php';
require_once '../db_connection.php';

header('Content-Type: application/json');

try {
    
    $official = new Official($pdo);
    $officials = $official->getAllOfficials();
    
    echo json_encode([
        'success' => true,
        'data' => $officials
    ]);
    
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}
?>