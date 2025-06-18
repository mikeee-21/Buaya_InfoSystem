<?php
// Simple Activity Logger Function
function logActivity($pdo, $actionType, $tableName, $referenceId, $adminId, $description = null, $resId = null) {
    try {
        $sql = "INSERT INTO activity_log (
                    act_log_action_type, 
                    act_log_table_name, 
                    act_log_reference_id, 
                    act_log_description, 
                    act_log_timestamp, 
                    admin_id, 
                    res_id
                ) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $actionType,
            $tableName,
            $referenceId,
            $description,
            $adminId,
            $resId
        ]);
        
        return true;
    } catch (PDOException $e) {
        // Log error but don't break the main process
        error_log("Activity logging failed: " . $e->getMessage());
        return false;
    }
}
?>