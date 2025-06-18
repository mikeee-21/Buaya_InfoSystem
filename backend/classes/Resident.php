<?php
class Resident {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public $res_first_name, $res_middle_name, $res_last_name, $res_suffix;
    public $res_sex, $res_date_of_birth, $res_place_of_birth;
    public $res_voter_status, $res_precinct_number, $res_pwd_status, $res_pwd_type, $res_single_parent_status;
    public $res_civil_status, $res_religion, $res_nationality;
    public $res_province, $res_municipality, $res_barangay, $res_zip_code;
    public $res_street, $res_house_number, $res_contact_number, $res_email_address;
    public $res_father_name, $res_mother_name, $res_guardian_name, $res_guardian_contact;

    public $res_image = 'server_imgs/default_user_img.jpg';
    public $res_status = 'active';
    public $zone_id, $bar_id, $admin_id;
    public $lastError;

    public function getLastError() {

        return $this->lastError;

    }

    //  CHECK if email already exists
    public function emailExists($email) {

        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM resident WHERE res_email_address = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;

    }

    public function checkIfResidentExists() {

        $sql = "SELECT COUNT(*) FROM resident 
                WHERE res_first_name = :fname AND res_last_name = :lname";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':fname' => $this->res_first_name,
            ':lname' => $this->res_last_name

        ]);
    
        return $stmt->fetchColumn() > 0;

    }
    



    public function save() {

        try {

            if ($this->emailExists($this->res_email_address)) {

                $this->lastError = "Email already exists.";
                return false;

            }

            
            

            $sql = "INSERT INTO resident (

                        res_first_name, res_middle_name, res_last_name, res_suffix,
                        res_sex, res_date_of_birth, res_place_of_birth,
                        res_voter_status, res_precinct_number, res_pwd_status, res_pwd_type, res_single_parent_status,
                        res_civil_status, res_religion, res_nationality,
                        res_street, res_house_number, res_contact_number, res_email_address,
                        res_father_name, res_mother_name, res_guardian_name, res_guardian_contact,
                        res_image, res_status,
                        zone_id, bar_id, admin_id

                    ) VALUES (

                        :res_first_name, :res_middle_name, :res_last_name, :res_suffix,
                        :res_sex, :res_date_of_birth, :res_place_of_birth,
                        :res_voter_status, :res_precinct_number, :res_pwd_status, :res_pwd_type, :res_single_parent_status,
                        :res_civil_status, :res_religion, :res_nationality,
                        :res_street, :res_house_number, :res_contact_number, :res_email_address,
                        :res_father_name, :res_mother_name, :res_guardian_name, :res_guardian_contact,
                        :res_image, :res_status,
                        :zone_id, :bar_id, :admin_id

                    )";

            $stmt = $this->pdo->prepare($sql);

            return $stmt->execute([

                ':res_first_name'           => $this->res_first_name,
                ':res_middle_name'          => $this->res_middle_name,
                ':res_last_name'            => $this->res_last_name,
                ':res_suffix'               => $this->res_suffix,
                ':res_sex'                  => $this->res_sex,
                ':res_date_of_birth'        => $this->res_date_of_birth,
                ':res_place_of_birth'       => $this->res_place_of_birth,
                ':res_voter_status'         => $this->res_voter_status,
                ':res_precinct_number'      => $this->res_precinct_number,
                ':res_pwd_status'           => $this->res_pwd_status,
                ':res_pwd_type'             => $this->res_pwd_type,
                ':res_single_parent_status' => $this->res_single_parent_status,
                ':res_civil_status'         => $this->res_civil_status,

                ':res_religion'             => $this->res_religion,
                ':res_nationality'          => $this->res_nationality,
                ':res_street'               => $this->res_street,
                ':res_house_number'         => $this->res_house_number,

                ':res_contact_number'       => $this->res_contact_number,
                ':res_email_address'        => $this->res_email_address,

                ':res_father_name'          => $this->res_father_name,
                ':res_mother_name'          => $this->res_mother_name,
                ':res_guardian_name'        => $this->res_guardian_name,
                ':res_guardian_contact'     => $this->res_guardian_contact,
                ':res_image'                => $this->res_image,
                ':res_status'               => $this->res_status,
                
                ':zone_id'                  => $this->zone_id,
                ':bar_id'                   => $this->bar_id,
                ':admin_id'                 => $this->admin_id

            ]);

            if ($result) {

                return true;

            } else {

                $this->lastError = "Unknown error occurred while saving the resident.";
                return false;

            }


        } catch (PDOException $e) {

            // In case of a PDO error, show the exception message
            $this->lastError = "Database error: " . $e->getMessage();
            return false;

        } catch (Exception $e) {

            // In case of a generic exception, display the error message
            $this->lastError = "General error: " . $e->getMessage();
            return false;
            
        }
    }

    public function check($firstName, $lastName) {
        try {
            $stmt = $this->pdo->prepare("SELECT res_id FROM resident WHERE res_first_name = ? AND res_last_name = ?");
            $stmt->execute([$firstName, $lastName]);
            $resident = $stmt->fetch(PDO::FETCH_ASSOC);

            return [
                'success' => true,
                'resident_exists' => $resident ? true : false,
                'res_id' => $resident['res_id'] ?? null
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Error checking resident: ' . $e->getMessage()
            ];
        }
    }


    public function getAllActiveResidentsWithZones() {
        try {
            $sql = "SELECT 
                        r.*, 
                        z.zone_name 
                    FROM 
                        resident r
                    LEFT JOIN 
                        zone z ON r.zone_id = z.zone_id
                    WHERE 
                        r.res_status = 'active'";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->lastError = "Database error fetching residents: " . $e->getMessage();
            return [];
        }
    }

    public function archive($res_id) {
        try {
            $stmt = $this->pdo->prepare("
                UPDATE resident 
                SET is_archived = TRUE, res_status = 'inactive' 
                WHERE res_id = :res_id AND is_archived = FALSE
            ");
            $stmt->execute([':res_id' => $res_id]);
            
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            $this->lastError = $e->getMessage();
            return false;
        }
    }

    public function existsAndActive($res_id) {
        try {
            $stmt = $this->pdo->prepare("
                SELECT COUNT(*) 
                FROM resident 
                WHERE res_id = :res_id AND is_archived = FALSE
            ");
            $stmt->execute([':res_id' => $res_id]);
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            $this->lastError = $e->getMessage();
            return false;
        }
    }

    // for report resident active
    public function searchResidents($filters = []) {
        try {
            // Base query with joins
            $sql = "SELECT r.*,
                           DATE_PART('year', AGE(r.res_date_of_birth)) AS age,
                           b.bar_logo AS res_logo,
                           b.bar_barangay AS res_barangay, 
                           b.bar_municipality AS res_municipality, 
                           b.bar_province AS res_province, 
                           b.bar_zip_code AS res_zip_code, 
                           z.zone_name AS res_zone_name
                    FROM resident r
                    LEFT JOIN barangay_profile b ON r.bar_id = b.bar_id
                    LEFT JOIN zone z ON r.zone_id = z.zone_id
                    WHERE 1=1";
            
            $params = [];

            // Apply filters
            if (!empty($filters['first_name'])) {
                $sql .= " AND r.res_first_name ILIKE ?";
                $params[] = '%' . $filters['first_name'] . '%';
            }

            if (!empty($filters['middle_name'])) {
                $sql .= " AND r.res_middle_name ILIKE ?";
                $params[] = '%' . $filters['middle_name'] . '%';
            }

            if (!empty($filters['last_name'])) {
                $sql .= " AND r.res_last_name ILIKE ?";
                $params[] = '%' . $filters['last_name'] . '%';
            }

            if (!empty($filters['resident_id'])) {
                if (is_numeric($filters['resident_id'])) {
                    $sql .= " AND r.res_id = ?";
                    $params[] = intval($filters['resident_id']);
                } else {
                    $sql .= " AND CAST(r.res_id AS TEXT) ILIKE ?";
                    $params[] = '%' . $filters['resident_id'] . '%';
                }
            }

            if (isset($filters['voters']) && $filters['voters'] !== '') {
                $sql .= $filters['voters'] === "YES" 
                    ? " AND r.res_voter_status = TRUE" 
                    : " AND r.res_voter_status = FALSE";
            }

            if (isset($filters['pwd']) && $filters['pwd'] !== '') {
                $sql .= $filters['pwd'] === "YES" 
                    ? " AND r.res_pwd_status = TRUE" 
                    : " AND r.res_pwd_status = FALSE";
            }

            if (isset($filters['single_parent']) && $filters['single_parent'] !== '') {
                $sql .= $filters['single_parent'] === "YES" 
                    ? " AND r.res_single_parent_status = TRUE" 
                    : " AND r.res_single_parent_status = FALSE";
            }

            if (!empty($filters['status'])) {
                $sql .= " AND r.res_status = ?";
                $params[] = strtolower($filters['status']);
            }

            if (isset($filters['senior']) && $filters['senior'] !== '') {
                $sql .= $filters['senior'] === "YES"
                    ? " AND DATE_PART('year', AGE(r.res_date_of_birth)) >= 60"
                    : " AND DATE_PART('year', AGE(r.res_date_of_birth)) < 60";
            }

            if (isset($filters['age']) && is_numeric($filters['age'])) {
                $sql .= " AND DATE_PART('year', AGE(r.res_date_of_birth)) = ?";
                $params[] = intval($filters['age']);
            }

            // Execute query
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            $residents = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Format results
            return array_map(function($resident) {
                return [
                    ...$resident,
                    'res_voter_status' => $resident['res_voter_status'] ? 'YES' : 'NO',
                    'res_pwd_status' => $resident['res_pwd_status'] ? 'YES' : 'NO',
                    'res_single_parent_status' => $resident['res_single_parent_status'] ? 'YES' : 'NO',
                    'res_status' => strtolower($resident['res_status']) === 'active' ? 'Active' : 'Inactive'
                ];
            }, $residents);

        } catch (PDOException $e) {
            error_log("Database error in searchResidents: " . $e->getMessage());
            return [];
        }
    }


    // for search resident inactive
    public function searchArchivedResidents($filters = []) {
        try {
            // Base query - digging up archived records ⚰️
            $sql = "SELECT * FROM resident WHERE is_archived = TRUE";
            $params = [];

            // Optional filters - our search flashlight 🔦
            if (!empty($filters['first_name'])) {
                $sql .= " AND res_first_name ILIKE ?";
                $params[] = '%' . $filters['first_name'] . '%';
            }

            if (!empty($filters['middle_name'])) {
                $sql .= " AND res_middle_name ILIKE ?";
                $params[] = '%' . $filters['middle_name'] . '%';
            }

            if (!empty($filters['last_name'])) {
                $sql .= " AND res_last_name ILIKE ?";
                $params[] = '%' . $filters['last_name'] . '%';
            }

            // ID search with numeric check - no fake IDs allowed! 🚔
            if (!empty($filters['resident_id'])) {
                if (is_numeric($filters['resident_id'])) {
                    $sql .= " AND res_id = ?";
                    $params[] = intval($filters['resident_id']);
                } else {
                    $sql .= " AND CAST(res_id AS TEXT) ILIKE ?";
                    $params[] = '%' . $filters['resident_id'] . '%';
                }
            }

            // Execute the query - abracadabra! 🎩
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Oops, the database ghost escaped! 👻
            error_log("Spooky database error: " . $e->getMessage());
            return [];
        }
    }



    // age statistic for chart
    public function getAgeGroups() {
        try {
            $sql = "
                SELECT * FROM (
                  SELECT
                    CASE
                      WHEN age < 13 THEN 'Children'
                      WHEN age BETWEEN 13 AND 19 THEN 'Teenager'
                      WHEN age BETWEEN 20 AND 35 THEN 'Young Adult'
                      WHEN age BETWEEN 36 AND 59 THEN 'Adult'
                      ELSE 'Senior'
                    END AS age_group,
                    COUNT(*) as count
                  FROM (
                    SELECT
                      EXTRACT(YEAR FROM AGE(CURRENT_DATE, res_date_of_birth)) as age
                    FROM resident
                    WHERE res_status = 'active'  -- Only count active residents
                  ) sub_age
                  GROUP BY age_group
                ) sub_groups
                ORDER BY
                  CASE 
                    WHEN age_group = 'Children' THEN 1
                    WHEN age_group = 'Teenager' THEN 2
                    WHEN age_group = 'Young Adult' THEN 3
                    WHEN age_group = 'Adult' THEN 4
                    WHEN age_group = 'Senior' THEN 5
                    ELSE 6
                  END
            ";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            // Uh-oh, the age calculator broke! 🧮➡️💥
            error_log("Age group calculation error: " . $e->getMessage());
            return [
                ['age_group' => 'Error', 'count' => 0]
            ];
        }
    }

    public function getArchivedResidents() {
        try {
            $sql = "SELECT r.*,
                           b.bar_logo AS res_logo,
                           b.bar_barangay AS res_barangay, 
                           b.bar_municipality AS res_municipality, 
                           b.bar_province AS res_province, 
                           b.bar_zip_code AS res_zip_code,
                           z.zone_name AS res_zone_name
                    FROM resident r
                    LEFT JOIN barangay_profile b ON r.bar_id = b.bar_id
                    LEFT JOIN zone z ON r.zone_id = z.zone_id
                    WHERE is_archived = true
                    ORDER BY r.res_id ASC";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $residents = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return array_map(function($resident) {
                return [
                    ...$resident,
                    'res_voter_status' => $resident['res_voter_status'] ? 'YES' : 'NO',
                    'res_single_parent_status' => $resident['res_single_parent_status'] ? 'YES' : 'NO',
                    'res_status' => strtolower($resident['res_status']) === 'active' ? 'Active' : 'Inactive'
                ];
            }, $residents);

        } catch (PDOException $e) {
            error_log("Error fetching archived residents: " . $e->getMessage());
            return [];
        }
    }


    /**
     * Get all active residents with complete location info
     * 
     * @return array Formatted resident data with:
     *               - Location details (barangay, zone, etc.)
     *               - Standardized status values ('YES'/'NO', 'Active'/'Inactive')
     */
    public function getActiveResidents() {
        try {
            // Base query with joins
            $sql = "SELECT r.*,
                           b.bar_logo AS res_logo,
                           b.bar_barangay AS res_barangay, 
                           b.bar_municipality AS res_municipality, 
                           b.bar_province AS res_province, 
                           b.bar_zip_code AS res_zip_code,
                           z.zone_name AS res_zone_name
                    FROM resident r
                    LEFT JOIN barangay_profile b ON r.bar_id = b.bar_id
                    LEFT JOIN zone z ON r.zone_id = z.zone_id
                    WHERE r.is_archived != true
                    ORDER BY r.res_id ASC";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $residents = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Format the results
            return array_map([$this, 'formatResidentData'], $residents);

        } catch (PDOException $e) {
            error_log("Error fetching active residents: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Format resident data with consistent values
     * (Reusable for both active and archived residents)
     */
    private function formatResidentData($resident) {
        return [
            ...$resident, // Spread all original fields
            'res_voter_status' => $resident['res_voter_status'] ? 'YES' : 'NO',
            'res_single_parent_status' => $resident['res_single_parent_status'] ? 'YES' : 'NO',
            'res_status' => strtolower($resident['res_status']) === 'active' ? 'Active' : 'Inactive'
        ];
    }

}
?>
