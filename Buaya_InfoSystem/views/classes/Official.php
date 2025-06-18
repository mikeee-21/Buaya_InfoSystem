<?php
class Official {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addOfficial($resident_id, $position_id, $term_from, $term_to, $committee, $description, $admin) {
        try {
            // Validate resident is a registered voter
            if (!$this->isRegisteredVoter($resident_id)) {
                throw new Exception('This resident is not a registered voter. Only voters can be added as officials.');
            }

            // Validate position exists
            $position = $this->getPositionName($position_id);
            if (!$position) {
                throw new Exception('This position does not exist. Please create the position first.');
            }

            // Check if resident already holds a position
            if ($this->hasExistingPosition($resident_id)) {
                throw new Exception('This resident already holds an official position.');
            }

            // Check position limits
            $count = $this->getPositionCount($position_id);
            $positionLower = strtolower($position);
            
            $singlePositions = ['captain', 'sk chairman', 'secretary', 'treasurer'];
            $multiplePositions = ['councilor', 'sk councilor'];

            if (in_array($positionLower, $singlePositions) && $count >= 1) {
                throw new Exception("Only one $positionLower is allowed.");
            }

            if (in_array($positionLower, $multiplePositions) && $count >= 7) {
                throw new Exception("Only 7 $positionLower are allowed.");
            }

            // Insert new official
            $sql = "INSERT INTO official (off_start_term, off_end_term, res_id, pos_id, off_committee, off_description, admin_id)
                    VALUES (:term_from, :term_to, :resident_id, :position, :committee, :description, :admin_id)";
            
            $stmt = $this->pdo->prepare($sql);
            $success = $stmt->execute([
                ':term_from' => $term_from,
                ':term_to' => $term_to,
                ':resident_id' => $resident_id,
                ':position' => $position_id,
                ':committee' => $committee,
                ':description' => $description,
                ':admin_id' => $admin
            ]);

            if (!$success) {
                throw new Exception('Failed to add official.');
            }

            return true;
        } catch (Exception $e) {
            throw $e; // Re-throw the exception for the calling code to handle
        }
    }

    public function isRegisteredVoter($resident_id) {
        $stmt = $this->pdo->prepare("SELECT res_voter_status FROM resident WHERE res_id = ?");
        $stmt->execute([$resident_id]);
        $voterStatus = $stmt->fetchColumn();
        return ($voterStatus !== false && $voterStatus == 1);
    }

    public function getPositionName($position_id) {
        $stmt = $this->pdo->prepare("SELECT pos_name FROM position WHERE pos_id = ?");
        $stmt->execute([$position_id]);
        return $stmt->fetchColumn();
    }

    public function hasExistingPosition($resident_id) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM official WHERE res_id = ? AND off_is_deleted = false");
        $stmt->execute([$resident_id]);
        return $stmt->fetchColumn() > 0;
    }

    public function getPositionCount($position_id) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM official WHERE pos_id = ? AND off_is_deleted = false");
        $stmt->execute([$position_id]);
        return $stmt->fetchColumn();
    }

    public function getAllOfficials() {
        $sql = "
            SELECT
                o.off_id, 
                r.res_first_name, 
                r.res_middle_name, 
                r.res_last_name, 
                p.pos_name, 
                r.res_image
            FROM 
                official o
            JOIN 
                resident r ON o.res_id = r.res_id
            JOIN 
                position p ON o.pos_id = p.pos_id
            WHERE 
                o.off_is_deleted = false AND (p.pos_name = 'captain' OR p.pos_name = 'councilor')
        ";
        
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function getOfficialsByType($type) {
        try { 
            $query = "SELECT o.*, p.pos_name, r.res_first_name, r.res_middle_name, r.res_last_name, 
                    r.res_contact_number, r.res_email_address, r.res_image
                    FROM official o
                    JOIN position p ON o.pos_id = p.pos_id
                    LEFT JOIN resident r ON o.res_id = r.res_id
                    WHERE ";
            
            // Add condition based on type
            if ($type === 'main') {
                $query .= "(p.pos_name = 'captain' OR p.pos_name = 'councilor')";
            } elseif ($type === 'sk') {
                $query .= "(p.pos_name LIKE 'sk%' OR p.pos_name LIKE '%sk%')";
            } else {
                return [];
            }
            
            $query .= " AND o.off_is_deleted = false";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching officials: " . $e->getMessage());
            return [];
        }
    }

    public function deleteOfficial($off_id, $admin_id) {
        try {
            // First verify the official exists and isn't already deleted
            $stmt = $this->pdo->prepare("
                SELECT COUNT(*) 
                FROM official 
                WHERE off_id = :off_id AND off_is_deleted = false
            ");
            $stmt->execute([':off_id' => $off_id]);
            
            if ($stmt->fetchColumn() == 0) {
                throw new Exception('Official not found or already deleted');
            }

            // Perform the soft delete
            $stmt = $this->pdo->prepare("
                UPDATE official 
                SET off_is_deleted = true 
                WHERE off_id = :off_id
            ");
            $success = $stmt->execute([':off_id' => $off_id]);

            if (!$success) {
                throw new Exception('Failed to update deletion status');
            }

            // Log the activity
            $description = "Deleted official with ID: $off_id";
            logActivity(
                $this->pdo,
                "DELETE", 
                "official", 
                $off_id, 
                $admin_id, 
                $description
            );

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getOfficialDetails($resId) {
        // Validate input
        if (!is_numeric($resId)) {
            return [
                'status' => 'error',
                'message' => 'Invalid Resident ID'
            ];
        }

        try {
            $stmt = $this->pdo->prepare("
                SELECT 
                    r.*,
                    b.bar_province,
                    b.bar_municipality,
                    b.bar_zip_code,
                    b.bar_barangay,
                    o.*,
                    p.pos_name,
                    p.pos_id
                FROM resident r
                JOIN barangay_profile b ON r.bar_id = b.bar_id
                JOIN official o ON r.res_id = o.res_id
                JOIN position p ON o.pos_id = p.pos_id
                WHERE r.res_id = ?
            ");

            $stmt->execute([$resId]);
            $official = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($official) {
                return [
                    'status' => 'success',
                    'data' => $official
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Official not found'
                ];
            }

        } catch (PDOException $e) {
            error_log("Official details error for res_id {$resId}: " . $e->getMessage());
            return [
                'status' => 'error',
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    public function getAllActiveOfficials() {
        try {
            $stmt = $this->pdo->query("
                SELECT 
                    o.off_id,
                    o.off_committee,
                    o.off_start_term,
                    o.off_end_term,
                    r.*,
                    p.pos_name,
                    o.pos_id 
                FROM official o
                JOIN resident r ON o.res_id = r.res_id
                JOIN position p ON o.pos_id = p.pos_id
                WHERE o.off_is_deleted = false
                ORDER BY o.off_id ASC
            ");
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Error fetching active officials: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Get all available positions
     * 
     * @return array Array of position IDs and names
     */
    public function getAllPositions() {
        try {
            return $this->pdo->query("
                SELECT pos_id, pos_name 
                FROM position
            ")->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Error fetching positions: " . $e->getMessage());
            return [];
        }
    }

    public function getOfficialsWithPositions() {
        try {
            return [
                'status' => 'success',
                'data' => $this->getAllActiveOfficials(),
                'positions' => $this->getAllPositions()
            ];
            
        } catch (Exception $e) {
            error_log("Error in getOfficialsWithPositions: " . $e->getMessage());
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Get main officials (captains and councilors)
     * 
     * @return array [
     *    'status' => 'success'|'error',
     *    'data' => array,
     *    'message' => string (only on error)
     * ]
     */
    public function getMainOfficials() {
        try {
            $query = "
                SELECT 
                    r.*,
                    o.off_start_term,
                    o.off_end_term,
                    o.off_committee,
                    p.pos_name
                FROM official o
                JOIN resident r ON r.res_id = o.res_id
                JOIN position p ON o.pos_id = p.pos_id
                WHERE (p.pos_name = 'captain' OR p.pos_name = 'councilor') 
                AND o.off_is_deleted = false
                ORDER BY 
                    CASE 
                        WHEN p.pos_name = 'captain' THEN 1
                        WHEN p.pos_name = 'councilor' THEN 2
                        ELSE 3
                    END,
                    p.pos_name ASC
            ";

            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            return [
                'status' => 'success',
                'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)
            ];
            
        } catch (PDOException $e) {
            error_log("Error fetching main officials: " . $e->getMessage());
            return [
                'status' => 'error',
                'message' => 'Failed to retrieve officials data'
            ];
        }
    }


     /**
     * Get SK officials (chairman and councilors)
     * 
     * @return array [
     *    'status' => 'success'|'error',
     *    'data' => array,
     *    'message' => string (only on error)
     * ]
     */
    public function getSKOfficials() {
        try {
            $query = "
                SELECT 
                    r.*,
                    o.off_start_term,
                    o.off_end_term,
                    o.off_committee,
                    p.pos_name
                FROM official o
                JOIN resident r ON r.res_id = o.res_id
                JOIN position p ON o.pos_id = p.pos_id
                WHERE (p.pos_name = 'sk chairman' OR p.pos_name = 'sk councilor')
                AND o.off_is_deleted = false
                AND r.is_archived = false
                ORDER BY 
                    CASE 
                        WHEN p.pos_name = 'sk chairman' THEN 1
                        WHEN p.pos_name = 'sk councilor' THEN 2
                        ELSE 3
                    END,
                    p.pos_name ASC
            ";

            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            return [
                'status' => 'success',
                'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)
            ];
            
        } catch (PDOException $e) {
            error_log("Error fetching SK officials: " . $e->getMessage());
            return [
                'status' => 'error',
                'message' => 'Failed to retrieve SK officials data'
            ];
        }
    }

    /**
     * Get all deleted officials with their positions
     * 
     * @return array [
     *    'status' => 'success'|'error',
     *    'data' => array,
     *    'positions' => array,
     *    'message' => string (only on error)
     * ]
     */
    public function getDeletedOfficials() {
        try {
            $this->pdo->beginTransaction();
            
            // Get deleted officials
            $officialsQuery = "
                SELECT 
                    o.off_id,
                    o.off_committee,
                    o.off_start_term,
                    o.off_end_term,
                    r.res_first_name,
                    r.res_last_name,
                    r.res_image,
                    p.pos_name,
                    o.pos_id
                FROM official o
                JOIN resident r ON o.res_id = r.res_id
                JOIN position p ON o.pos_id = p.pos_id
                WHERE o.off_is_deleted = true
                ORDER BY o.off_id ASC
            ";
            
            $stmt = $this->pdo->prepare($officialsQuery);
            $stmt->execute();
            $officials = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Get all positions
            $positions = $this->getAllPos();
            
            $this->pdo->commit();
            
            return [
                'status' => 'success',
                'data' => $officials,
                'positions' => $positions
            ];
            
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            error_log("Error fetching deleted officials: " . $e->getMessage());
            return [
                'status' => 'error',
                'message' => 'Failed to retrieve deleted officials'
            ];
        }
    }

    /**
     * Get all position options
     * 
     * @return array Array of position IDs and names
     */
    private function getAllPos() {
        try {
            $stmt = $this->pdo->query("SELECT pos_id, pos_name FROM position");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching positions: " . $e->getMessage());
            return [];
        }
    }

}
?>