<?php
require_once '../db_connection.php';
require_once '../classes/Announcement.php';
require_once '../classes/Log.php';

$announcement = new Announcement($pdo);

// Collect form data
$id                 = $_POST['edit_announcement_id'] ?? null;
$title              = $_POST['announcement_title'] ?? null;
$content            = $_POST['announcement_content'] ?? null;
$typeId             = $_POST['announcementType'] ?? null;
$removedImages      = $_POST['removed_images'] ?? [];
$uploadedImages     = $_FILES['announcement_images'] ?? null;

try {
    $announcement->update($id, $title, $content, $typeId, $removedImages, $uploadedImages);

    // Log the update activity
    $adminId = $_SESSION['admin_id'] ?? null;
    if ($adminId) {
        $description = "Updated announcement with ID: $id (Title: $title)";
        logActivity($pdo, "UPDATE", "announcement", $id, $adminId, $description);
    }
    
    echo json_encode(['success' => true, 'message' => 'Announcement updated successfully!']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Update failed: ' . $e->getMessage()]);
}
exit;
?>
