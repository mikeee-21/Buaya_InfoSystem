<?php
require_once '../db_connection.php';
require_once '../classes/Barangay.php';

header('Content-Type: application/json');

try {
    $barangay = new Barangay($pdo);
    
    // Map form data to database columns
    $data = [
        'bar_logo' => '', // Initialize as empty
        'bar_mission' => $_POST['mission'] ?? '',
        'bar_vision' => $_POST['vision'] ?? '',
        'bar_contact_cellphone' => $_POST['smart_contact'] ?? '',
        'bar_contact_telephone' => $_POST['telep_contact'] ?? '',
        'bar_email' => $_POST['email'] ?? '',
        'bar_name' => $_POST['brgyName'] ?? '',
        'bar_zip_code' => $_POST['brgyZipCode'] ?? '',
        'bar_province' => $_POST['brgyProvince'] ?? '',
        'bar_municipality' => $_POST['brgyMunicipality'] ?? '',
        'bar_available_start_time' => $_POST['avail_start_time'] ?? '',
        'bar_available_end_time' => $_POST['avail_end_time'] ?? '',
        'bar_available_start_day' => $_POST['dayStart'] ?? '',
        'bar_available_end_day' => $_POST['dayEnd'] ?? ''
    ];

    // Handle image upload
    if (!empty($_FILES['image'])) {
        // Define upload directory (relative to this script)
        $uploadDir = '../../server_imgs/';  // Go up one level from backend folder
        
        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        // Generate unique filename
        $filename = 'logo_' . uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $uploadFile = $uploadDir . $filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Store relative path in database
            $data['bar_logo'] =  $filename;
        } else {
            throw new Exception('Failed to upload image');
        }
    } else {
        // Keep existing logo if no new image uploaded
        $existing = $barangay->getBarangayProfileToEdit();
        $data['bar_logo'] = $existing['bar_logo'];
    }
        
    // Update profile
    if ($barangay->updateBarangayProfile($data)) {
        echo json_encode(['success' => true, 'message' => 'Profile updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Update failed']);
    }

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
}