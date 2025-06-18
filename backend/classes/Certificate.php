<?php
class Certificate {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addCertificate($name, $admin_id) {
        if (empty($name)) {
            return ['success' => false, 'message' => 'Certificate name is required.'];
        }

        try {
            $this->pdo->beginTransaction();

            // Check if certificate exists (including deleted ones)
            $existing = $this->pdo->prepare("
                SELECT cer_type_id, cer_type_is_deleted 
                FROM certificate_type 
                WHERE cer_type_name = :name
            ");
            $existing->execute([':name' => $name]);
            $certificate = $existing->fetch(PDO::FETCH_ASSOC);

            if ($certificate) {
                if ($certificate['cer_type_is_deleted'] === 'deleted') {
                    // Reactivate the deleted certificate
                    $stmt = $this->pdo->prepare("
                        UPDATE certificate_type 
                        SET 
                            cer_type_is_deleted = 'not deleted',
                            admin_id = :admin_id
                        WHERE cer_type_id = :id
                    ");
                    $stmt->execute([
                        ':id' => $certificate['cer_type_id'],
                        ':admin_id' => $admin_id
                    ]);

                    $this->pdo->commit();
                    return [
                        'success' => true,
                        'message' => 'Previously deleted certificate was reactivated successfully.',
                        'certificate_id' => $certificate['cer_type_id'],
                        'reactivated' => true
                    ];
                } else {
                    $this->pdo->rollBack();
                    return [
                        'success' => false,
                        'message' => 'Certificate with this name already exists.'
                    ];
                }
            }

            // Insert new certificate
            $stmt = $this->pdo->prepare("
                INSERT INTO certificate_type (cer_type_name, admin_id) 
                VALUES (:name, :admin_id)
            ");
            $stmt->execute([
                ':name' => $name,
                ':admin_id' => $admin_id
            ]);

            $this->pdo->commit();
            return [
                'success' => true, 
                'message' => 'Certificate added successfully.'
            ];

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            error_log("Certificate add/restore error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }
    public function getAll() {
        try {
            $stmt = $this->pdo->query("SELECT cer_type_id, cer_type_name FROM certificate_type WHERE cer_type_is_deleted = 'not deleted' ORDER BY cer_type_name");
            $certificates = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return [
                'success' => true,
                'data' => $certificates
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Error fetching certificates: ' . $e->getMessage()
            ];
        }
    }

    public function deleteCertificate($cert_id, $admin_id) {
        try {
            $this->pdo->beginTransaction();

            // Get certificate details
            $certificate = $this->getCertificateById($cert_id);
            if (!$certificate) {
                throw new Exception("Certificate not found");
            }

            // Soft delete by updating the status instead of physical deletion
            $stmt = $this->pdo->prepare("
                UPDATE certificate_type 
                SET cer_type_is_deleted = 'deleted' 
                WHERE cer_type_id = ?
            ");
            $stmt->execute([$cert_id]);

            // Log activity (no need for separate deleted_certificate table)
            $logDescription = "Marked certificate type '{$certificate['cer_type_name']}' as deleted";
            $logSuccess = logActivity(
                $this->pdo,
                'UPDATE',  // Changed from 'DELETE' to 'UPDATE'
                'certificate_type',
                $cert_id,
                $admin_id,
                $logDescription
            );

            $this->pdo->commit();

            return [
                'success' => true,
                'message' => 'Certificate marked as deleted successfully',
                'log_success' => $logSuccess
            ];

        } catch (Exception $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            error_log("Error soft-deleting certificate: " . $e->getMessage());
            throw new Exception("Failed to mark certificate as deleted");
        }
    }

    // You can keep this method for fetching certificates
    private function getCertificateById($cert_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM certificate_type WHERE cer_type_id = ?");
        $stmt->execute([$cert_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




    public function getCertificateStats() {
        try {
            $stmt = $this->pdo->query("
                SELECT 
                    c.cer_type_id, 
                    c.cer_type_name, 
                    COUNT(r.req_id) AS request_count
                FROM certificate_type c
                LEFT JOIN request_document r ON c.cer_type_id = r.cer_type_id
                WHERE c.cer_type_is_deleted = 'not deleted'
                GROUP BY c.cer_type_id, c.cer_type_name
                ORDER BY c.cer_type_name ASC
            ");
            
            return [
                'success' => true,
                'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)
            ];

        } catch (PDOException $e) {
            error_log("Certificate stats error: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Database error: ' . $e->getMessage()
            ];
        }
    }

}
?>