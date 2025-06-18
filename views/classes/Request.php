<?php
class Request {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function submit($data) {
        $firstName = $data['first_name'] ?? '';
        $lastName = $data['last_name'] ?? '';
        $middleName = $data['middle_name'] ?? null;
        $suffix = $data['suffix'] ?? null;
        $contact = $data['contact'] ?? '';
        $email = $data['email'] ?? null;
        $dateOfBirth = !empty($data['date_of_birth']) ? $data['date_of_birth'] : null;
        $placeOfBirth = !empty($data['place_of_birth']) ? $data['place_of_birth'] : null;
        $yearsResident = !empty($data['years_resident']) ? (int)$data['years_resident'] : null;
        $civilStatus = $data['civil_status'] ?? null;
        $certificateType = (int)($data['certificate_type'] ?? 0);
        $purpose = $data['purpose'] ?? '';
        $resId = !empty($data['res_id']) && $data['res_id'] != 0 ? (int)$data['res_id'] : null;

        // Basic validation
        if (empty($firstName) || empty($lastName) || empty($contact) || empty($purpose) || empty($certificateType)) {
            return ['success' => false, 'message' => 'Please fill in all required fields'];
        }

        if (!preg_match('/^09[0-9]{9}$/', $contact)) {
            return ['success' => false, 'message' => 'Contact number must be 11 digits starting with 09'];
        }

        try {
            // Validate resident ID
            if ($resId !== null) {
                $checkStmt = $this->pdo->prepare("SELECT 1 FROM resident WHERE res_id = ?");
                $checkStmt->execute([$resId]);
                if (!$checkStmt->fetch()) {
                    $resId = null;
                }
            }

            $stmt = $this->pdo->prepare("
                INSERT INTO request_document (
                    req_first_name, req_last_name, req_middle_name, req_suffix,
                    req_contact, req_email, req_purpose, req_years_resident, req_civil_status,
                    req_requested_date, req_requested_time, cer_type_id, res_id,
                    req_date_of_birth, req_place_of_birth
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_DATE, CURRENT_TIME, ?, ?, ?, ?)
            ");

            $result = $stmt->execute([
                $firstName, $lastName, $middleName, $suffix,
                $contact, $email, $purpose, $yearsResident, $civilStatus,
                $certificateType, $resId, $dateOfBirth, $placeOfBirth
            ]);

            if ($result) {
                return [
                    'success' => true,
                    'message' => 'Request submitted successfully!',
                    'request_id' => $this->pdo->lastInsertId()
                ];
            } else {
                return ['success' => false, 'message' => 'Failed to submit request'];
            }

        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
        }
    }


    public function updateStatus($reqId, $status, $message, $dateIssued, $dateExpiration, $adminId) {
        // Fetch full name parts
        $stmt = $this->pdo->prepare("SELECT req_first_name, req_middle_name, req_last_name, req_suffix FROM request_document WHERE req_id = :req_id");
        $stmt->execute([':req_id' => $reqId]);
        $nameData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$nameData) {
            return ['success' => false, 'message' => "Request ID {$reqId} not found."];
        }

        // Build full name
        $fullName = $nameData['req_first_name'];
        if (!empty($nameData['req_middle_name'])) {
            $fullName .= ' ' . $nameData['req_middle_name'];
        }
        $fullName .= ' ' . $nameData['req_last_name'];
        if (!empty($nameData['req_suffix'])) {
            $fullName .= ' ' . $nameData['req_suffix'];
        }

        // Update request document
        $query = "UPDATE request_document SET 
                  req_status = :status,
                  req_message = :message,
                  req_date_issued = :date_issued,
                  req_date_expiration = :date_expiration,
                  req_date_approved = CURRENT_DATE
                  WHERE req_id = :req_id";

        $stmt = $this->pdo->prepare($query);
        $updated = $stmt->execute([
            ':status' => $status,
            ':message' => $message,
            ':date_issued' => $dateIssued ?: null,
            ':date_expiration' => $dateExpiration ?: null,
            ':req_id' => $reqId
        ]);

        if (!$updated) {
            return ['success' => false, 'message' => 'Failed to update request status.'];
        }

        // Log the action - assuming logActivity() is globally available
        $description = "Request status updated to '{$status}' for '{$fullName}'";
        $logSuccess = logActivity(
            $this->pdo,
            'UPDATE',
            'request_document',
            $reqId,
            $adminId,
            $description,
            null
        );

        return [
            'success' => true,
            'log_success' => $logSuccess
        ];
    }


    public function getAllRequests() {
        try {
            $query = "
                SELECT 
                    rd.req_id,
                    rd.req_first_name,
                    rd.req_last_name,
                    rd.req_middle_name,
                    rd.req_suffix,
                    rd.req_purpose,
                    rd.req_requested_date,
                    rd.req_status,
                    rd.req_claim_status,
                    rd.req_email,
                    rd.req_contact,
                    ct.cer_type_name
                FROM request_document rd
                LEFT JOIN certificate_type ct ON rd.cer_type_id = ct.cer_type_id
                ORDER BY rd.req_requested_date DESC
            ";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Error fetching requests: " . $e->getMessage());
            return [];
        }
    }


    public function deleteRequest($reqId, $adminId) {
        try {
            $this->pdo->beginTransaction();
            
            // Get requester details
            $requestInfo = $this->getRequestInfo($reqId);
            if (!$requestInfo) {
                throw new Exception("Request document not found with ID: $reqId");
            }
            
            // Format full name
            $fullName = $this->formatFullName($requestInfo);
            
            // Delete the record
            $this->deleteRequestRecord($reqId);
            
            // Log the activity
            $description = "Deleted document request for: $fullName (Request ID: $reqId)";
            $logSuccess = logActivity(
                $this->pdo,
                'DELETE',
                'request_document',
                $reqId,
                $adminId,
                $description,
                $requestInfo['res_id'] ?? null
            );
            
            if (!$logSuccess) {
                error_log("Failed to log deletion activity for request_document ID: $reqId");
            }
            
            $this->pdo->commit();
            
            return [
                'success' => true,
                'message' => 'Request deleted successfully'
            ];
            
        } catch (Exception $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            throw $e;
        }
    }

    private function getRequestInfo($reqId) {
        $stmt = $this->pdo->prepare("
            SELECT req_first_name, req_last_name, req_middle_name, req_suffix, res_id 
            FROM request_document 
            WHERE req_id = ?
        ");
        $stmt->execute([$reqId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function formatFullName($requestInfo) {
        $fullName = trim($requestInfo['req_first_name'] . ' ' . $requestInfo['req_last_name']);
        if (!empty($requestInfo['req_middle_name'])) {
            $fullName .= ' ' . $requestInfo['req_middle_name'];
        }
        if (!empty($requestInfo['req_suffix'])) {
            $fullName .= ' ' . $requestInfo['req_suffix'];
        }
        return $fullName;
    }

    private function deleteRequestRecord($reqId) {
        $stmt = $this->pdo->prepare("DELETE FROM request_document WHERE req_id = ?");
        $stmt->execute([$reqId]);
        
        if ($stmt->rowCount() === 0) {
            throw new Exception("No request found to delete");
        }
    }

     public function getRequestById($reqId) {
        try {
            $query = "
                SELECT rd.*, ct.cer_type_name 
                FROM request_document rd
                LEFT JOIN certificate_type ct ON rd.cer_type_id = ct.cer_type_id
                WHERE rd.req_id = :req_id
            ";
            
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':req_id', $reqId);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
            
        } catch (PDOException $e) {
            error_log("Error fetching request: " . $e->getMessage());
            return null;
        }
    }

    public function getFilteredRequests($filter = 'all') {
        try {
            return [
                'success' => true,
                'requests' => $this->getRequestsByStatus($filter),
                'counts' => $this->getRequestStatusCounts()
            ];
        } catch (PDOException $e) {
            error_log("Request filtering error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Get requests filtered by status
     */
    private function getRequestsByStatus($filter) {
        $query = "SELECT rd.*, ct.cer_type_name 
                 FROM request_document rd
                 LEFT JOIN certificate_type ct ON rd.cer_type_id = ct.cer_type_id";
        
        if ($filter !== 'all') {
            $query .= " WHERE rd.req_status = :status";
        }
        
        $query .= " ORDER BY rd.req_requested_date DESC, rd.req_requested_time DESC";
        
        $stmt = $this->pdo->prepare($query);
        
        if ($filter !== 'all') {
            $stmt->bindParam(':status', $filter);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get counts for each request status
     */
    private function getRequestStatusCounts() {
        $stmt = $this->pdo->query("
            SELECT 
                SUM(CASE WHEN req_status = 'approved' THEN 1 ELSE 0 END) as approved,
                SUM(CASE WHEN req_status = 'pending' THEN 1 ELSE 0 END) as pending,
                SUM(CASE WHEN req_status = 'rejected' THEN 1 ELSE 0 END) as rejected
            FROM request_document
        ");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    /**
     * Get count of approved requests
     * 
     * @return int Number of approved requests
     */
    public function getApprovedRequestsCount() {
        try {
            $stmt = $this->pdo->query("SELECT COUNT(*) FROM request_document WHERE req_status = 'approved'");
            return (int)$stmt->fetchColumn();
        } catch (PDOException $e) {
            error_log("Error counting approved requests: " . $e->getMessage());
            return 0;
        }
    }

    /**
     * Get all approved requests with full name and certificate type
     * 
     * @return array Approved requests with formatted data
     */
    public function getApprovedRequests() {
        try {
            $query = "SELECT 
                        rd.*,
                        ct.cer_type_name,
                        CONCAT(
                            rd.req_first_name, ' ', 
                            CASE WHEN rd.req_middle_name IS NOT NULL 
                                THEN CONCAT(rd.req_middle_name, ' ') 
                                ELSE '' 
                            END, 
                            rd.req_last_name, 
                            CASE WHEN rd.req_suffix IS NOT NULL 
                                THEN CONCAT(' ', rd.req_suffix) 
                                ELSE '' 
                            END
                        ) AS full_name
                      FROM request_document rd
                      JOIN certificate_type ct ON rd.cer_type_id = ct.cer_type_id
                      WHERE rd.req_status = 'approved'
                      ORDER BY rd.req_requested_date DESC";
            
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            error_log("Error fetching approved requests: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Get approved requests with count
     * 
     * @return array [
     *    'success' => bool,
     *    'count' => int,
     *    'requests' => array,
     *    'error' => string (only on failure)
     * ]
     */
    public function getApprovedRequestsWithCount() {
        try {
            return [
                'success' => true,
                'count' => $this->getApprovedRequestsCount(),
                'requests' => $this->getApprovedRequests()
            ];
        } catch (Exception $e) {
            error_log("Error in getApprovedRequestsWithCount: " . $e->getMessage());
            return [
                'success' => false,
                'error' => 'Database error: ' . $e->getMessage()
            ];
        }
    }
}
