<?php
class Barangay {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getBarangayProfile($barangay_id) {
        try {
            $sql = "SELECT * FROM barangay_profile WHERE bar_id = :bar_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':bar_id', $barangay_id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error getting barangay profile: " . $e->getMessage());
            return false;
        }
    }
    

    public function getBarangayProfileToEdit(): mixed {
        $sql = "SELECT * FROM barangay_profile WHERE bar_id = 10001";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function updateBarangayProfile($data) {
        // Default to existing values if not provided
        $existing = $this->getBarangayProfileToEdit();
        
        $sql = "UPDATE barangay_profile SET 
                bar_logo = :logo,
                bar_mission = :mission,
                bar_vision = :vision,
                bar_contact_cellphone = :cellphone,
                bar_contact_telephone = :telephone,
                bar_email = :email,
                bar_name = :name,
                bar_zip_code = :zip_code,
                bar_province = :province,
                bar_municipality = :municipality,
                bar_available_start_time = :start_time,
                bar_available_end_time = :end_time,
                bar_available_start_day = :start_day,
                bar_available_end_day = :end_day
                WHERE bar_id = 10001";

        $stmt = $this->pdo->prepare($sql);
        
        return $stmt->execute([
            ':logo' => $data['bar_logo'] ?? $existing['bar_logo'],
            ':mission' => $data['bar_mission'] ?? $existing['bar_mission'],
            ':vision' => $data['bar_vision'] ?? $existing['bar_vision'],
            ':cellphone' => $data['bar_contact_cellphone'] ?? $existing['bar_contact_cellphone'],
            ':telephone' => $data['bar_contact_telephone'] ?? $existing['bar_contact_telephone'],
            ':email' => $data['bar_email'] ?? $existing['bar_email'],
            ':name' => $data['bar_name'] ?? $existing['bar_name'],
            ':zip_code' => $data['bar_zip_code'] ?? $existing['bar_zip_code'],
            ':province' => $data['bar_province'] ?? $existing['bar_province'],
            ':municipality' => $data['bar_municipality'] ?? $existing['bar_municipality'],
            ':start_time' => $data['bar_available_start_time'] ?? $existing['bar_available_start_time'],
            ':end_time' => $data['bar_available_end_time'] ?? $existing['bar_available_end_time'],
            ':start_day' => $data['bar_available_start_day'] ?? $existing['bar_available_start_day'],
            ':end_day' => $data['bar_available_end_day'] ?? $existing['bar_available_end_day']
        ]);
    }



    // resident part
    public function getBarangayProfile_RES($barangay_id) {
        try {
            $sql = "SELECT * FROM barangay_profile WHERE bar_id = :bar_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':bar_id', $barangay_id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error getting barangay profile: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get the default barangay profile (single record)
     * 
     * @return array|false Barangay profile data or false on error
     */
    public function getDefaultBarangayProfile() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM barangay_profile LIMIT 1");
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error fetching default barangay profile: " . $e->getMessage());
            return false;
        }
    }
}