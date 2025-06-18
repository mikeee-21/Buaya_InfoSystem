<?php
class Announcement {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($title, $description, $type_id, $admin_id) {
        $stmt = $this->pdo->prepare("INSERT INTO posted_announcement (pos_ann_title, pos_ann_description, ann_type_id, admin_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $description, $type_id, $admin_id]);
        return $this->pdo->lastInsertId();
    }

    public function addImage($announcement_id, $image_path) {
        $stmt = $this->pdo->prepare("INSERT INTO posted_announcement_image (pos_ann_id, pos_img_img) VALUES (?, ?)");
        $stmt->execute([$announcement_id, $image_path]);
        return true; // Return true for success
    }

    public function getAllWithImages() {
       // 1. Get all announcements with admin name and type
        $stmt = $this->pdo->query("
        SELECT pa.*, aa.admin_fname, aa.admin_lname, at.ann_type_name,
               (SELECT COUNT(*) FROM like_each_post WHERE pos_ann_id = pa.pos_ann_id) AS like_count
        FROM posted_announcement pa 
        JOIN admin_account aa ON aa.admin_id = pa.admin_id
        JOIN announcement_type at ON pa.ann_type_id = at.ann_type_id
        ORDER BY pa.pos_ann_id DESC
    ");

    $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($announcements as &$ann) {
            // Get images
            $stmtImg = $this->pdo->prepare("SELECT pos_img_img FROM posted_announcement_image WHERE pos_ann_id = ?");
            $stmtImg->execute([$ann['pos_ann_id']]);
            $ann['images'] = $stmtImg->fetchAll(PDO::FETCH_COLUMN);

            // Get comments
            $stmtComment = $this->pdo->prepare("SELECT aa.admin_fname AS user, com_description AS text 
                                                FROM comment_on_post ac 
                                                JOIN admin_account aa 
                                                ON ac.admin_id = aa.admin_id 
                                                WHERE ac.pos_ann_id = ?");
            $stmtComment->execute([$ann['pos_ann_id']]);
            $ann['comments'] = $stmtComment->fetchAll(PDO::FETCH_ASSOC);
        }

        return $announcements;
    }




    // Fixed method - using PDO instead of mysqli
    public function updateBasicInfo($id, $title, $content, $type) {
        $stmt = $this->pdo->prepare("UPDATE posted_announcement SET pos_ann_title = ?, pos_ann_description = ?, ann_type_id = ? WHERE pos_ann_id = ?");
        $stmt->execute([$title, $content, $type, $id]);
        return $stmt->rowCount() > 0;
    }

    // Fixed method - using PDO instead of mysqli
    public function removeUnlistedImages($announcement_id, $keepImages = []) {
        // Get all current image paths for this announcement
        $stmt = $this->pdo->prepare("SELECT pos_img_img FROM posted_announcement_image WHERE pos_ann_id = ?");
        $stmt->execute([$announcement_id]);
        $currentImages = $stmt->fetchAll(PDO::FETCH_COLUMN);

        foreach ($currentImages as $imgPath) {
            if (!in_array($imgPath, $keepImages)) {
                // Delete from DB
                $delStmt = $this->pdo->prepare("DELETE FROM posted_announcement_image WHERE pos_ann_id = ? AND pos_img_img = ?");
                $delStmt->execute([$announcement_id, $imgPath]);

                // Delete physical file
                $filePath = '../../posted_imgs/' . basename($imgPath);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }
        
        return true;
    }

    public function removeSingleImage($announcement_id, $image_path) {
        // Delete from DB
        $stmt = $this->pdo->prepare("DELETE FROM posted_announcement_image WHERE pos_ann_id = ? AND pos_img_img = ?");
        $stmt->bindValue(1, $announcement_id, PDO::PARAM_INT);
        $stmt->bindValue(2, $image_path, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result) {
            // Delete physical file
            $filePath = '../../' . $image_path;  // adjust path if needed
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            return true;
        }
        return false;
    }
    
    // Added method to check if announcement exists
    public function exists($id) {
        $stmt = $this->pdo->prepare("SELECT pos_ann_id FROM posted_announcement WHERE pos_ann_id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }
    
    // Added method to get images for an announcement
    public function getImages($announcement_id) {
        $stmt = $this->pdo->prepare("SELECT pos_img_img FROM posted_announcement_image WHERE pos_ann_id = ?");
        $stmt->execute([$announcement_id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }




    public function update($announcementId, $title, $content, $typeId, $removedImages = [], $uploadedImages = null) {
        // 1. Update basic info
        $this->updateBasicInfo($announcementId, $title, $content, $typeId);

        // 2. Remove images if any
        foreach ($removedImages as $imagePath) {
            $this->removeSingleImage($announcementId, $imagePath);
        }

        // 3. Upload new images
        if ($uploadedImages && is_array($uploadedImages['name'])) {
            // Safe absolute path to upload directory
            $uploadDir =  __DIR__ . '../../posted_imgs/';
            $dbRelativePath = 'posted_imgs/';

            // Create the directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            foreach ($uploadedImages['name'] as $index => $name) {
                $tmpName = $uploadedImages['tmp_name'][$index];

                if ($name && $tmpName) {
                    $originalName = basename($name);
                    $safeName = preg_replace('/[^A-Za-z0-9_.-]/', '_', $originalName);
                    $newFilename = uniqid() . '_' . $safeName;

                    $destination = $uploadDir . $newFilename;

                    if (move_uploaded_file($tmpName, $destination)) {
                        $relativePath = $dbRelativePath . $newFilename;
                        $this->addImage($announcementId, $relativePath);
                    }
                }
            }
        }

        return true;
    }


    public function getAdminName(int $admin_id): string {
        $stmt = $this->pdo->prepare("SELECT admin_fname FROM admin_account WHERE admin_id = ?");
        $stmt->execute([$admin_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['admin_fname'] ?? 'Admin';
    }


    public function addComment($announcementId, $user, $text) {

        $stmt = $this->pdo->prepare("INSERT INTO comment_on_post  (pos_ann_id, admin_id, com_description) VALUES (?, ?, ?)");
        $stmt->execute([$announcementId, $user, $text]);

    }

    public function toggleLike($adminId, $announcementId) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM like_each_post WHERE admin_id = ? AND pos_ann_id = ?");
        $stmt->execute([$adminId, $announcementId]);
        $alreadyLiked = $stmt->fetchColumn();

        if ($alreadyLiked) {
            // Unlike
            $stmt = $this->pdo->prepare("DELETE FROM like_each_post WHERE admin_id = ? AND pos_ann_id = ?");
            $stmt->execute([$adminId, $announcementId]);
        } else {
            // Like
            $stmt = $this->pdo->prepare("INSERT INTO like_each_post (admin_id, pos_ann_id) VALUES (?, ?)");
            $stmt->execute([$adminId, $announcementId]);
        }

        // Return new like count
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM like_each_post WHERE pos_ann_id = ?");
        $stmt->execute([$announcementId]);
        return (int) $stmt->fetchColumn();
    }



    // Resident Part

    // get latest announcement
    public function getLatestAnnouncements() {
        $query = "
            SELECT 
                pa.pos_ann_id as id,
                pa.pos_ann_title as title,
                pa.pos_ann_description as content,
                pa.pos_ann_date as date,
                at.ann_type_name as type,
                aa.admin_fname as author_firstname,
                aa.admin_lname as author_lastname,
                (SELECT pos_img_img FROM posted_announcement_image WHERE pos_ann_id = pa.pos_ann_id LIMIT 1) as image_path,
                (SELECT COUNT(*) FROM like_each_post WHERE pos_ann_id = pa.pos_ann_id) as like_count
            FROM 
                posted_announcement pa
            JOIN 
                admin_account aa ON pa.admin_id = aa.admin_id
            JOIN 
                announcement_type at ON pa.ann_type_id = at.ann_type_id
            ORDER BY 
                pa.pos_ann_date DESC
            LIMIT 5
        ";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(); // Removed the unnecessary bindValue() call
        
        $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Format the date for each announcement
        foreach ($announcements as &$announcement) {
            $announcement['formatted_date'] = $this->formatDate($announcement['date']);
            $announcement['author'] = $announcement['author_firstname'] . ' ' . $announcement['author_lastname'];
        }
        
        return $announcements;
    }

    private function formatDate($dateString) {
        $date = new DateTime($dateString);
        return $date->format('F j, Y'); // e.g. "June 5, 2023"
    }


    public function getAnnouncementType() {
        $query = "SELECT * FROM announcement_type ORDER BY ann_type_id ASC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllAnnouncements_RES() {
        try {
            $query = "SELECT 
                        pa.pos_ann_id, 
                        pa.pos_ann_title, 
                        pa.pos_ann_description, 
                        pa.pos_ann_date,
                        at.ann_type_name,
                        aa.admin_fname,
                        aa.admin_lname,
                        aa.admin_image,
                        (
                            SELECT COUNT(*) 
                            FROM like_each_post lep 
                            WHERE lep.pos_ann_id = pa.pos_ann_id
                        ) AS like_count,
                        (
                            SELECT COUNT(*) 
                            FROM comment_on_post cop 
                            WHERE cop.pos_ann_id = pa.pos_ann_id
                        ) AS comment_count
                      FROM posted_announcement pa
                      JOIN announcement_type at ON pa.ann_type_id = at.ann_type_id
                      JOIN admin_account aa ON pa.admin_id = aa.admin_id
                      ORDER BY pa.pos_ann_date DESC";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get related data for each announcement
            foreach ($announcements as &$announcement) {
                $announcement['images'] = $this->getAnnouncementImages_RES($announcement['pos_ann_id']);
                $announcement['comments'] = $this->getAnnouncementComments_RES($announcement['pos_ann_id']);
            }
            
            return $announcements;
            
        } catch (Exception $e) {
            error_log("Error getting announcements: " . $e->getMessage());
            return [];
        }
    }
    
    private function getAnnouncementImages_RES($announcementId) {
        try {
            $query = "SELECT pos_img_img
                      FROM posted_announcement_image 
                      WHERE pos_ann_id = ?";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$announcementId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error getting images for announcement $announcementId: " . $e->getMessage());
            return [];
        }
    }
    
    public function getAnnouncementComments_RES($announcementId) {
        try {
            $query = "SELECT 
                        cop.com_id, 
                        cop.com_description, 
                        cop.com_date,
                        CASE
                            WHEN cop.anonymous_name IS NOT NULL AND cop.anonymous_name != 'Anonymous' THEN cop.anonymous_name
                            WHEN aa.admin_id IS NOT NULL THEN aa.admin_fname || ' ' || aa.admin_lname
                            ELSE 'Anonymous'
                        END AS commenter_name,
                        CASE 
                            WHEN cop.anonymous_name IS NOT NULL AND cop.anonymous_name != 'Anonymous' THEN 'custom_name'
                            WHEN aa.admin_id IS NOT NULL THEN 'admin' 
                            ELSE 'anonymous'
                        END AS commenter_type
                    FROM comment_on_post cop
                    LEFT JOIN admin_account aa ON cop.admin_id = aa.admin_id
                    WHERE cop.pos_ann_id = ?
                    ORDER BY cop.com_date DESC";

            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$announcementId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            error_log("Error getting comments for announcement $announcementId: " . $e->getMessage());
            return [];
        }
    }
    
    public function handleLike_RES($announcementId, $action) {
        try {
            if ($action === 'like') {
                $query = "INSERT INTO like_each_post (pos_ann_id) VALUES (?)";
            } else {
                $query = "DELETE FROM like_each_post WHERE pos_ann_id = ? ";
            }
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([$announcementId]);
            
            return $this->getLikeCount_RES($announcementId);
            
        } catch (Exception $e) {
            error_log("Error handling like: " . $e->getMessage());
            return false;
        }
    }
    
    private function getLikeCount_RES($announcementId) {
        $query = "SELECT COUNT(*) as like_count FROM like_each_post WHERE pos_ann_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$announcementId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['like_count'];
    }
    
    // comment submission
    public function addAnonymousComment($announcementId, $commentText, $anonymousName = null) {
        try {
            // Generate a random name if none provided
            if (empty($anonymousName)) {
                $anonymousName = $this->generateRandomName();
            }

            $stmt = $this->pdo->prepare("
                INSERT INTO comment_on_post 
                (pos_ann_id, com_description, anonymous_name) 
                VALUES (?, ?, ?)
            ");
            $stmt->execute([$announcementId, $commentText, $anonymousName]);
            
            return [
                'comment_count' => $this->getCommentCount_RES($announcementId),
                'comment' => $this->getLastCommentWithName($announcementId)
            ];
            
        } catch (Exception $e) {
            error_log("Error adding comment: " . $e->getMessage());
            return false;
        }
    }

    private function generateRandomName() {
        $colors = ['Ruby', 'Emerald', 'Sapphire', 'Topaz', 'Amber'];
        $animals = ['Fox', 'Owl', 'Dolphin', 'Tiger', 'Panda'];
        return $colors[array_rand($colors)] . ' ' . $animals[array_rand($animals)];
    }

    private function getLastCommentWithName($announcementId) {
        $query = "SELECT 
                    com_description as text,
                    COALESCE(anonymous_name, 'Anonymous') as name,
                    com_date as date
                FROM comment_on_post 
                WHERE pos_ann_id = ?
                ORDER BY com_date DESC
                LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$announcementId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        
    private function getCommentCount_RES($announcementId) {
        $query = "SELECT COUNT(*) as comment_count FROM comment_on_post WHERE pos_ann_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$announcementId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['comment_count'];
    }


    public function deleteAnnouncement($announcement_id, $admin_id) {
        try {
            $this->pdo->beginTransaction();

            // Get announcement details
            $announcement = $this->getAnnouncementById($announcement_id);
            if (!$announcement) {
                throw new Exception("Announcement not found");
            }

            // Get related images
            $images = $this->getAnnouncementImages($announcement_id);

            // Delete related records
            $this->deleteAnnouncementImages($announcement_id);
            $this->deleteAnnouncementComments($announcement_id);
            $this->deleteAnnouncementLikes($announcement_id);

            // Delete the announcement itself
            $this->deleteAnnouncementRecord($announcement_id);

            // Log the deletion
            $logDescription = "Deleted announcement titled '{$announcement['pos_ann_title']}'";
            $logSuccess = logActivity(
                $this->pdo,
                'DELETE',
                'posted_announcement',
                $announcement_id,
                $admin_id,
                $logDescription
            );

            $this->pdo->commit();

            // Return both deletion result and image paths for physical deletion
            return [
                'success' => true,
                'message' => 'Announcement deleted successfully',
                'images' => $images,
                'log_success' => $logSuccess
            ];

        } catch (Exception $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            throw $e;
        }
    }

    private function getAnnouncementById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM posted_announcement WHERE pos_ann_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function getAnnouncementImages($id) {
        $stmt = $this->pdo->prepare("SELECT pos_img_img FROM posted_announcement_image WHERE pos_ann_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    private function deleteAnnouncementImages($id) {
        $stmt = $this->pdo->prepare("DELETE FROM posted_announcement_image WHERE pos_ann_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    private function deleteAnnouncementComments($id) {
        $stmt = $this->pdo->prepare("DELETE FROM comment_on_post WHERE pos_ann_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    private function deleteAnnouncementLikes($id) {
        $stmt = $this->pdo->prepare("DELETE FROM like_each_post WHERE pos_ann_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    private function deleteAnnouncementRecord($id) {
        $stmt = $this->pdo->prepare("DELETE FROM posted_announcement WHERE pos_ann_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function getAllTypes() {
        try {
            $stmt = $this->pdo->query("
                SELECT * 
                FROM announcement_type 
                ORDER BY ann_type_id ASC
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("[Announcement] Error fetching types: " . $e->getMessage());
            return [];
        }
    }

}

?>
