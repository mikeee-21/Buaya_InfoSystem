<?php 
// header('Content-Type: application/json');
// require_once '../db_connection.php'; // your DB connect file

// $data = json_decode(file_get_contents("php://input"), true);
// $query = $data['query'] ?? '';
// $response = ['status' => 'error', 'results' => []];

// if ($query !== '') {
//     // Make sure you're using the same database connection approach as search_resident.php
//     // Assuming $pdo is a PDO connection as used in search_resident.php:
//     $stmt = $pdo->prepare("SELECT res_id as id, res_first_name as first_name, res_last_name as last_name
//                           FROM resident
//                           WHERE CONCAT(res_first_name, ' ', res_last_name)
//                           LIKE ? LIMIT 10");
                          
//     $search = "%$query%";
//     $stmt->execute([$search]);
//     $residents = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
//     $response = [
//         'status' => 'success',
//         'results' => $residents
//     ];
// }

// echo json_encode($response);
?>


<?php
header('Content-Type: application/json');
require_once '../db_connection.php'; // your DB connect file

$data = json_decode(file_get_contents("php://input"), true);
$query = $data['query'] ?? '';
$response = ['status' => 'error', 'results' => []];

if ($query !== '') {
    $stmt = $pdo->prepare("
        SELECT 
            res_id AS id, 
            res_first_name AS first_name, 
            res_last_name AS last_name
        FROM resident
        WHERE LOWER(CONCAT(res_first_name, ' ', res_last_name)) LIKE LOWER(?) 
        LIMIT 10
    ");

    $search = "%$query%";
    $stmt->execute([$search]);
    $residents = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $response = [
        'status' => 'success',
        'results' => $residents
    ];
}

echo json_encode($response);
?>
