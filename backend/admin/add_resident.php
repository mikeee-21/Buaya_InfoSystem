<?php
session_start();
require_once '../db_connection.php'; // DB connection file
require_once '../classes/Resident.php'; // Resident class
require_once '../classes/Log.php'; // Include activity log function
header('Content-Type: application/json');

$admin_id = $_SESSION['admin_id']; // assuming this was set during login

if ($_SERVER["REQUEST_METHOD"] == "POST") {


   
    // Prepare the Resident object
    $resident = new Resident($pdo);


  
     
    // Assign form data to the Resident object
    $resident->res_first_name           = $_POST['add_first_name'];
    $resident->res_middle_name          = !empty($_POST['add_middle_name']) ? $_POST['add_middle_name'] : null;
    $resident->res_last_name            = $_POST['add_last_name'];
    $resident->res_suffix               = !empty($_POST['add_suffix']) ? $_POST['add_suffix'] : null;
    $resident->res_sex                  = $_POST['add_gender'];
    $resident->res_date_of_birth        = $_POST['add_birth_date'];
    $resident->res_place_of_birth       = $_POST['add_birth_place'];
    $resident->res_voter_status         = $_POST['add_voters'];
    $resident->res_precinct_number      = $_POST['add_precinct_number'];
    $resident->res_pwd_status           = $_POST['add_pwd'];
    $resident->res_pwd_type             = $_POST['add_pwd_info'] ?? 'Not Applicable';


    $resident->res_single_parent_status = $_POST['add_single_parent'];
    $resident->res_civil_status         = $_POST['add_civil_status'];
    $resident->res_religion             = $_POST['add_religion'];
    $resident->res_nationality          = $_POST['add_nationality'];
    $resident->res_street               = !empty($_POST['add_street']) ? $_POST['add_street'] : null;
    $resident->res_house_number         = !empty($_POST['add_house_number']) ? $_POST['add_house_number'] : null;

    $resident->res_email_address        = !empty($_POST['add_email_address']) ? $_POST['add_email_address'] : null;
    $resident->res_contact_number       = $_POST['add_contact_number'];

    $resident->res_father_name          = $_POST['add_father_name'];
    $resident->res_mother_name          = $_POST['add_mother_name'];
    $resident->res_guardian_name        = !empty($_POST['add_guardian_name']) ? $_POST['add_guardian_name'] : null;
    $resident->res_guardian_contact     = !empty($_POST['add_guardian_contact']) ? $_POST['add_guardian_contact'] : null;

    $resident->zone_id                  = $_POST['add_zone'];
    $resident->bar_id                   = $_POST['add_baranggay'];
    $resident->admin_id                 = $admin_id;




        // File upload handling
        if (isset($_FILES['add_image']) && $_FILES['add_image']['error'] === UPLOAD_ERR_OK) {

            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            $fileType = mime_content_type($_FILES['add_image']['tmp_name']);

            if (in_array($fileType, $allowedTypes)) {

                $uploadDir = 'server_imgs/'; // Directory relative to the project root
                $filename = uniqid() . '_' . basename($_FILES['add_image']['name']);
                $relativePath = $uploadDir . $filename; //  Save this in DB
                $absolutePath = __DIR__ . '/../../' . $relativePath; // Adjust if this script is inside a subfolder

                if (move_uploaded_file($_FILES['add_image']['tmp_name'], $absolutePath)) {

                    $resident->res_image = $relativePath; //  Save only relative path

                } else {

                    echo json_encode([

                        'status' => 'error',
                        'message' => 'Failed to move uploaded file.'

                    ]);
                    exit;
                    
                }

            } else {

                echo json_encode([

                    'status' => 'error',
                    'message' => 'Invalid file type. Only JPG and PNG are allowed.'

                ]);
                exit;
            }
        }

        

    //  CHECK for duplicate name before saving
    if ($resident->checkIfResidentExists()) {

        echo json_encode([
            'status' => 'error',
            'message' => 'Resident already exists.'

        ]);
        exit;
    }



    // Save the resident to the database
    try {
        if ($resident->save()) {

             $residentId = $pdo->lastInsertId(); 

            $fullName = $resident->res_first_name . ' ' . 
            ($resident->res_middle_name ? $resident->res_middle_name[0] . '. ' : '') . 
            $resident->res_last_name . 
            ($resident->res_suffix ? ' ' . $resident->res_suffix : '');

            logActivity(
                $pdo,
                'ADD',
                'resident',
                $residentId,
                $admin_id,
                'Added new resident: ' . $fullName,
                $residentId
            );



            echo json_encode([

                "status" => "success",
                "message" => "Resident saved successfully."

            ]);

        } else {

            echo json_encode([

                'status' => 'error',
                'message' => $resident->getLastError() ?: 'Failed to save resident. Unknown error.', // Default message if no error is returned
                'debug' => $resident->getLastError() ?? 'No error captured.' // If getLastError() is null, show a fallback

            ]);
            
        }


    } catch (PDOException $e) {

        echo json_encode([

            'status' => 'error',
            'message' => 'Database error occurred.',
            'debug' => $e->getMessage()

        ]);

    }
}
?>
