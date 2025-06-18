<?php

session_start();
require '../db_connection.php';
require '../classes/Announcement.php';
require '../classes/Log.php'; 



$admin_id   = $_SESSION['admin_id'] ?? null;

if (empty($admin_id)) {
    echo json_encode(['success' => false, 'message' => 'Admin not logged in.']);
    exit;
}


$announcement = new Announcement($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        // 1. Get form values
        $title          = $_POST['announcement_title'];
        $description    = $_POST['announcement_content'];
        $type_id        = $_POST['announcementType'];

        
        // 2. Create the announcement
        $announcement_id = $announcement->create($title, $description, $type_id, $admin_id);

        logActivity(
            $pdo,
            'ADD',
            'announcement',
            $announcement_id,
            $admin_id,
            "Posted announcement titled: \"$title\""
        );

        // 3. Image handling
        $uploadDir = __DIR__ . '../../posted_imgs/';
        $dbRelativePath = 'posted_imgs/';

        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $uploadedImages = [];

        if (!empty($_FILES['announcement_images']['name'][0])) {
            
            foreach ($_FILES['announcement_images']['tmp_name'] as $i => $tmpName) {

                if ($_FILES['announcement_images']['error'][$i] === UPLOAD_ERR_OK) {

                    $tmpName = $_FILES['announcement_images']['tmp_name'][$i];
                    $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mimeType = finfo_file($fileInfo, $tmpName);
                    finfo_close($fileInfo);

                    // Allowed MIME types
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

                    if (in_array($mimeType, $allowedTypes)) {

                        $originalName   = basename($_FILES['announcement_images']['name'][$i]);
                        $newName        = uniqid() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', $originalName);
                        $targetPath     = $uploadDir . $newName;
                        $dbPath         = $dbRelativePath . $newName;

                        if (move_uploaded_file($tmpName, $targetPath)) {

                            $announcement->addImage($announcement_id, $dbPath);
                            $uploadedImages[] = $dbPath;
                            
                        }

                    } else {

                        // Optional: skip invalid type and maybe log or notify
                        continue;

                    }
                }

            }
        }



        echo json_encode([

            'success' => true,
            'message' => 'Announcement created successfully.',
            'uploaded_images' => $uploadedImages

        ]);

    } catch (Exception $e) {

        echo json_encode(['success' => false, 'message' => $e->getMessage()]);

    }
}
