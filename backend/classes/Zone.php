<?php
class Zone {
    private $pdo; 

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addZone($zone_name, $admin_id) {
        try {
            // Validate zone name
            if (empty($zone_name)) {
                throw new Exception('Zone name is required');
            }

            // Get barangay ID
            $bar_id = $this->getBarangayId();
            if (!$bar_id) {
                throw new Exception('Barangay ID not found');
            }

            // Check if zone name exists
            if ($this->zoneExists($zone_name)) {
                throw new Exception('Zone name already exists.');
            }

            // Insert new zone
            $stmt = $this->pdo->prepare("
                INSERT INTO zone (zone_name, bar_id, admin_id) 
                VALUES (:zone_name, :bar_id, :admin_id)
            ");
            
            $success = $stmt->execute([
                ':zone_name' => $zone_name, 
                ':bar_id'    => $bar_id,       
                ':admin_id'  => $admin_id   
            ]);

            if (!$success) {
                throw new Exception('Failed to add zone');
            }

            return $this->pdo->lastInsertId();
        } catch (Exception $e) {
            throw $e; // Re-throw for the calling code to handle
        }
    }

    private function getBarangayId() {
        $stmt = $this->pdo->prepare("SELECT bar_id FROM barangay_profile");
        $stmt->execute();
        $bar = $stmt->fetch(PDO::FETCH_ASSOC);
        return $bar ? $bar['bar_id'] : false;
    }

    private function zoneExists($zone_name) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM zone WHERE zone_name = :name");
        $stmt->execute([':name' => $zone_name]);
        return $stmt->fetchColumn() > 0;
    }

    public function getActiveResidents($filters = []) {
        try {
            $sql = "SELECT r.*, z.zone_name 
                    FROM resident r
                    LEFT JOIN zone z ON r.zone_id = z.zone_id
                    WHERE r.res_status = 'active'";
            
            $params = [];

            // Apply filters if provided
            if (!empty($filters['last_name'])) {
                $sql .= " AND r.res_last_name LIKE :last_name";
                $params[':last_name'] = "%{$filters['last_name']}%";
            }

            if (!empty($filters['first_name'])) {
                $sql .= " AND r.res_first_name LIKE :first_name";
                $params[':first_name'] = "%{$filters['first_name']}%";
            }

            if (!empty($filters['zone'])) {
                $sql .= " AND r.zone_id = :zone";
                $params[':zone'] = $filters['zone'];
            }

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Error fetching residents: " . $e->getMessage());
            return [];
        }
    }

        /**
     * Get all zones with resident counts
     * 
     * @return array [
     *    'zone_id' => int,
     *    'zone_name' => string,
     *    'num_residents' => int
     * ]
     */
    public function getZonesWithResidentCounts() {
        try {
            $query = "
                SELECT 
                    z.zone_id, 
                    z.zone_name, 
                    COUNT(r.res_id) AS num_residents
                FROM zone z
                LEFT JOIN resident r ON z.zone_id = r.zone_id
                GROUP BY z.zone_id, z.zone_name
                ORDER BY z.zone_id ASC
            ";

            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Error fetching zone resident counts: " . $e->getMessage());
            return [];
        }
    }
}