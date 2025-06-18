<?php
// get_zone_data.php
include '../db_connection.php'; // Adjust path if needed

$sql = "
SELECT z.zone_id, z.zone_name, COUNT(r.zone_id) as count
FROM zone z
LEFT JOIN resident r ON r.zone_id = z.zone_id
GROUP BY z.zone_id, z.zone_name
ORDER BY z.zone_id

";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($data);
?>
