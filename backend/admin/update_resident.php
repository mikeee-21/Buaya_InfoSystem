<?php
session_start();
require_once '../db_connection.php'; 

// Enable error logging for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Create a log file specifically for image uploads
function logImageDebug($message) {
    $logFile = __DIR__ . '/image_debug.log';
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
}

if (!$_SESSION['admin_id']){
    echo json_encode(['status' => 'error', 'message' => 'You must log in first.']);
    exit;
}

$admin_id = $_SESSION['admin_id']; // Get admin ID from session

// Receive JSON data
$data = json_decode(file_get_contents('php://input'), true); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    logImageDebug("POST request received");
    
    // Check if the necessary fields are available
    if (isset($data['res_id'])) {
        $res_id = $data['res_id'];
        logImageDebug("Processing resident ID: " . $res_id);
        
        // Extract other fields from the data
        $res_first_name                     = $data['res_first_name'];
        $res_middle_name                    = $data['res_middle_name'];
        $res_last_name                      = $data['res_last_name'];
        $res_suffix                         = $data['res_suffix'];
        $res_date_of_birth                  = $data['res_date_of_birth'];
        $res_place_of_birth                 = $data['res_place_of_birth'];

        $res_single_parent_status           = isset($data['res_single_parent_status']) ? (bool)$data['res_single_parent_status'] : false;
        $res_pwd_status                     = isset($data['res_pwd_status']) ? (bool)$data['res_pwd_status'] : false;
        $res_voter_status                   = isset($data['res_voter_status']) ? (bool)$data['res_voter_status'] : false;

        $res_precinct_number                = $data['res_precinct_number'];
        $res_pwd_type                       = $data['res_pwd_type'];
        $res_sex                            = $data['res_sex'];
        $res_civil_status                   = $data['res_civil_status'];
        $res_religion                       = $data['res_religion'];
        $res_nationality                    = $data['res_nationality'];
        $res_house_number                   = $data['res_house_number'];
        $res_street                         = $data['res_street'];

        $res_email_address                  = $data['res_email_address'];
        $res_contact_number                 = $data['res_contact_number'];

        $res_father_name                    = $data['res_father_name'];
        $res_mother_name                    = $data['res_mother_name'];
        $res_guardian_name                  = $data['res_guardian_name'];
        $res_guardian_contact               = $data['res_guardian_contact'];

        $res_image                          = $data['res_image']; // This contains either a path or base64 image
        logImageDebug("Received image data type: " . (strpos($res_image, 'data:image') === 0 ? 'base64' : 'path'));

        $res_zone_id                        = $data['res_zone_id'];
        




        // Check if the email already exists (excluding the current resident)
        $emailCheckStmt = $pdo->prepare("SELECT COUNT(*) FROM resident WHERE res_email_address = :res_email_address AND res_id != :res_id");
        $emailCheckStmt->execute([':res_email_address' => $res_email_address, ':res_id' => $res_id]);
        $emailExists = $emailCheckStmt->fetchColumn();

        if ($emailExists > 0) {
            echo json_encode(['status' => 'error', 'message' => 'Email address already exists.']);
            exit;
        }




        // Check if the combination of first name and last name already exists (excluding the current resident)
        $nameCheckStmt = $pdo->prepare("SELECT COUNT(*) FROM resident WHERE res_first_name = :res_first_name AND res_last_name = :res_last_name AND res_id != :res_id");
        $nameCheckStmt->execute([':res_first_name' => $res_first_name, ':res_last_name' => $res_last_name, ':res_id' => $res_id]);
        $nameExists = $nameCheckStmt->fetchColumn();

        if ($nameExists > 0) {
            echo json_encode(['status' => 'error', 'message' => 'Combination of first name and last name already exists.']);
            exit;
        }
        




        // Initialize image path variable first
        $imagePathInDb = 'server_imgs/default_user_img.jpg'; // Default value
        
        // Image Handling
        if (!empty($res_image)) {
            if (strpos($res_image, 'data:image') === 0) {
                // It's a base64 image, save it to file
                $imageData = $res_image;
                logImageDebug("Processing base64 image");
                
                // Extract mime type and extension
                if (preg_match('/data:image\/(.*?);/', $imageData, $matches)) {
                    $ext = $matches[1];
                    
                    // Generate a unique filename
                    $randomStr = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);
                    $imageName = date("His") . '_' . $randomStr . '.' . $ext;
                    
                    // Define paths
                    $relativePath = 'server_imgs/' . $imageName;
                    $absolutePath = __DIR__ . '/../../' . $relativePath; 
                    logImageDebug("Generated path: " . $absolutePath);
                    
                    // Extract and decode base64 content
                    $base64Content = substr($imageData, strpos($imageData, ',') + 1);
                    $decodedImage = base64_decode($base64Content);
                    
                    // Save the image file
                    if (file_put_contents($absolutePath, $decodedImage)) {
                        
                        $imagePathInDb = $relativePath;
                        logImageDebug("Successfully saved base64 image to: " . $relativePath);
                    } else {
                        logImageDebug("Failed to save image file to: " . $absolutePath);
                        $imagePathInDb = 'server_imgs/default_user_img.jpg';
                    }

                } else {
                    logImageDebug("Failed to extract MIME type from base64 image");
                    $imagePathInDb = 'server_imgs/default_user_img.jpg';
                }


            } else if (strpos($res_image, 'server_imgs/') !== false) {
                // It's a server path
                logImageDebug("Processing existing server path image: " . $res_image);
                
                // Clean the path - extract just server_imgs/filename.ext
                if (preg_match('/server_imgs\/[^?&#]*/', $res_image, $matches)) {
                    $imagePathInDb = $matches[0];
                    logImageDebug("Extracted path: " . $imagePathInDb);
                } else {
                    logImageDebug("Failed to extract path from: " . $res_image);
                    $imagePathInDb = $res_image;
                }
                
                // Verify the file exists
                $fileCheck = __DIR__ . '/../../' . $imagePathInDb;
                if (!file_exists($fileCheck)) {
                    logImageDebug("Warning: File does not exist at: " . $fileCheck);
                }
            } else {
                logImageDebug("Unrecognized image format, using default");
                $imagePathInDb = 'server_imgs/default_user_img.jpg';
            }
        } else {
            logImageDebug("No image data provided, using default");
            $imagePathInDb = 'server_imgs/default_user_img.jpg';
        }
        
        logImageDebug("Final image path for database: " . $imagePathInDb);





        // SQL Update Query 
        $sql = "UPDATE resident SET 
                res_first_name          = :res_first_name,
                res_middle_name         = :res_middle_name,
                res_last_name           = :res_last_name,
                res_suffix              = :res_suffix,
                res_voter_status        = :res_voter_status,
                res_precinct_number     = :res_precinct_number,
                res_date_of_birth       = :res_date_of_birth,
                res_place_of_birth      = :res_place_of_birth,
                res_single_parent_status= :res_single_parent_status,
                res_pwd_status          = :res_pwd_status,
                res_pwd_type            = :res_pwd_type,
                res_sex                 = :res_sex,
                res_civil_status        = :res_civil_status,
                res_religion            = :res_religion,
                res_nationality         = :res_nationality,
                res_house_number        = :res_house_number,
                res_street              = :res_street,
                res_email_address       = :res_email_address,
                res_contact_number      = :res_contact_number,
                res_father_name         = :res_father_name,
                res_mother_name         = :res_mother_name,
                res_guardian_name       = :res_guardian_name,
                res_guardian_contact    = :res_guardian_contact,
                res_image               = :res_image,
                zone_id                 = :res_zone_id,
                admin_id                = :admin_id
                WHERE res_id            = :res_id";

        // Execute prepared statement
        $stmt = $pdo->prepare($sql);

        // Bind the boolean values correctly
        $stmt->bindValue(':res_single_parent_status',   $res_single_parent_status, PDO::PARAM_BOOL);
        $stmt->bindValue(':res_pwd_status',             $res_pwd_status, PDO::PARAM_BOOL);
        $stmt->bindValue(':res_voter_status',           $res_voter_status, PDO::PARAM_BOOL);
        
       

        // Bind all other parameters
        $stmt->bindValue(':res_precinct_number',        $res_precinct_number );
        $stmt->bindValue(':res_first_name',             $res_first_name);
        $stmt->bindValue(':res_middle_name',            $res_middle_name);
        $stmt->bindValue(':res_last_name',              $res_last_name);
        $stmt->bindValue(':res_suffix',                 $res_suffix);
        $stmt->bindValue(':res_date_of_birth',          $res_date_of_birth);
        $stmt->bindValue(':res_place_of_birth',         $res_place_of_birth);
        $stmt->bindValue(':res_pwd_type',               $res_pwd_type);
        $stmt->bindValue(':res_sex',                    $res_sex);
        $stmt->bindValue(':res_civil_status',           $res_civil_status);
        $stmt->bindValue(':res_religion',               $res_religion);
        $stmt->bindValue(':res_nationality',            $res_nationality);
        $stmt->bindValue(':res_house_number',           $res_house_number);
        $stmt->bindValue(':res_street',                 $res_street);
        $stmt->bindValue(':res_email_address',          $res_email_address);
        $stmt->bindValue(':res_contact_number',         $res_contact_number);
        $stmt->bindValue(':res_father_name',            $res_father_name);
        $stmt->bindValue(':res_mother_name',            $res_mother_name);
        $stmt->bindValue(':res_guardian_name',          $res_guardian_name);
        $stmt->bindValue(':res_guardian_contact',       $res_guardian_contact);
        $stmt->bindValue(':res_image',                  $imagePathInDb);
        $stmt->bindValue(':res_zone_id',                $res_zone_id);
        $stmt->bindValue(':admin_id',                   $admin_id);
        $stmt->bindValue(':res_id',                     $res_id);
        
        try {
            // Execute the statement
            $result = $stmt->execute();
            if ($result) {
                logImageDebug("Database update successful");
                echo json_encode(['status' => 'success', 'image_path' => $imagePathInDb]);
            } else {
                logImageDebug("Database update failed");
                echo json_encode(['status' => 'error', 'message' => 'Database update failed']);
            }
        } catch (PDOException $e) {
            logImageDebug("Database error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
        
    } else {
        logImageDebug("Missing required fields in the request");
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    }
}
?>