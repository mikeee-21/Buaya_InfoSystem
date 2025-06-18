<?php
header('Content-Type: application/json');
require '../db_connection.php';

try {
    // Build the SQL query dynamically based on filters
    $sql = "SELECT 
                res_first_name, 
                res_last_name, 
                res_sex, 
                res_civil_status, 
                res_date_of_birth,
                res_pwd_status,
                res_voter_status,
                (res_date_of_birth <= CURRENT_DATE - INTERVAL '60 years') AS res_senior_status
            FROM resident
            WHERE is_archived = false";

    $params = [];

    // Apply filters (if provided)
    if (!empty($_POST['voters'])) {
        $sql .= " AND res_voter_status = ?";
        $params[] = ($_POST['voters'] == 'YES') ? 1 : 0; // Use 1/0 instead of true/false
    }

    if (!empty($_POST['age'])) {
        $sql .= " AND EXTRACT(YEAR FROM AGE(res_date_of_birth)) = ?";
        $params[] = (int)$_POST['age'];
    }

    if (!empty($_POST['status'])) { // Sex filter
        $sql .= " AND res_sex = ?";
        $params[] = $_POST['status'];
    }

    if (!empty($_POST['pwd'])) {
        $sql .= " AND res_pwd_status = ?";
        $params[] = ($_POST['pwd'] == 'YES') ? 1 : 0; // Use 1/0 instead of true/false
    }

    if (!empty($_POST['single_parent'])) {
        $sql .= " AND res_civil_status = ?";
        $params[] = $_POST['single_parent'];
    }
    
    if (!empty($_POST['senior'])) {
        $sql .= " AND (res_date_of_birth <= CURRENT_DATE - INTERVAL '60 years') = ?";
        $params[] = ($_POST['senior'] == 'YES') ? 1 : 0;
    }

    // Execute query
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $residents = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($residents)) {
        echo json_encode([
            'success' => true,
            'data' => $residents
        ]);
    } else {
        echo json_encode([
            'success' => true, // Still successful even if no results
            'data' => [],
            'message' => 'No residents found matching your criteria'
        ]);
    }

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Database error: ' . $e->getMessage()
    ]);
}
?>