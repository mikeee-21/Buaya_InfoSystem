<?php
require_once '../db_connection.php';
require_once '../classes/Request.php';
require_once '../classes/Resident.php';
require_once '../classes/Certificate.php';

$requestHandler = new Request($pdo);
$residentHandler = new Resident($pdo);
$certificateHandler = new Certificate($pdo);

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'get_certificates':
        $response = $certificateHandler->getAll();
        echo json_encode($response);
        break;

    case 'submit_request':
        $response = $requestHandler->submit($_POST);
        echo json_encode($response);
        break;

    case 'check_resident':
        $firstName = $_POST['first_name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $response = $residentHandler->check($firstName, $lastName);
        echo json_encode($response);
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
        break;
}

?>