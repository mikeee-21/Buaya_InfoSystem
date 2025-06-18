<?php
class Calendar {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addEvent($title, $start, $end, $description = null, $adminId, $color = '#3c8dbc') {
        $sql = "INSERT INTO calendar_event (
                    event_title, 
                    event_description, 
                    event_date, 
                    event_time_start, 
                    event_time_end,
                    event_color,
                    event_posted_date, 
                    event_posted_time, 
                    admin_id
                ) VALUES (
                    :title, 
                    :description, 
                    :event_date, 
                    :time_start, 
                    :time_end,
                    :color,
                    CURRENT_DATE, 
                    CURRENT_TIME, 
                    :admin_id
                ) RETURNING event_id";
        
        try {
            $startDate = date('Y-m-d', strtotime($start));
            $startTime = date('H:i:s', strtotime($start));
            $endTime = date('H:i:s', strtotime($end));
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':title' => $title,
                ':description' => $description,
                ':event_date' => $startDate,
                ':time_start' => $startTime,
                ':time_end' => $endTime,
                ':color' => $color,
                ':admin_id' => $adminId
            ]);
            
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            error_log("Error adding event: " . $e->getMessage());
            return false;
        }
    }

    public function updateEvent($eventId, $title, $description, $start, $end, $color = null) {
    $sql = "UPDATE calendar_event 
            SET event_title = :title,
                event_description = :description,
                event_date = :event_date,
                event_time_start = :time_start,
                event_time_end = :time_end";
    
    if ($color) {
        $sql .= ", event_color = :color";
    }
    
    $sql .= " WHERE event_id = :event_id";
    
    try {
        // Parse the datetime strings
        $startDate = date('Y-m-d', strtotime($start));
        $startTime = date('H:i:s', strtotime($start));
        $endTime = date('H:i:s', strtotime($end));
        
        $stmt = $this->pdo->prepare($sql);
        
        $params = [
            ':event_id' => $eventId,
            ':title' => $title,
            ':description' => $description,
            ':event_date' => $startDate,
            ':time_start' => $startTime,
            ':time_end' => $endTime
        ];
        
        if ($color) {
            $params[':color'] = $color;
        }
        
        $result = $stmt->execute($params);
        
        if (!$result) {
            error_log("Update failed: " . implode(", ", $stmt->errorInfo()));
            return false;
        }
        
        return $stmt->rowCount() > 0;
        
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

    public function updateEventTime($eventId, $start, $end) {
        // Parse the incoming datetime strings
        $startDateTime = new DateTime($start);
        $endDateTime = new DateTime($end);
        
        $sql = "UPDATE calendar_event 
                SET event_date = :event_date,
                    event_time_start = :time_start,
                    event_time_end = :time_end
                WHERE event_id = :event_id";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                ':event_id' => $eventId,
                ':event_date' => $startDateTime->format('Y-m-d'),
                ':time_start' => $startDateTime->format('H:i:s'),
                ':time_end' => $endDateTime->format('H:i:s')
            ]);
        } catch (PDOException $e) {
            error_log("Error updating event time: " . $e->getMessage());
            return false;
        }
    }

    public function getEvent($eventId) {
        $sql = "SELECT 
                    event_id as id,
                    event_title as title,
                    event_date || 'T' || event_time_start as start,
                    event_date || 'T' || event_time_end as end,
                    event_description as description,
                    event_color as color,
                    admin_id
                FROM calendar_event
                WHERE event_id = :event_id";
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':event_id' => $eventId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting event: " . $e->getMessage());
            return false;
        }
    }

    public function getAllEvents() {
        $sql = "SELECT 
                    event_id as id,
                    event_title as title,
                    event_date || 'T' || event_time_start as start,
                    CASE 
                        WHEN event_time_end IS NOT NULL THEN event_date || 'T' || event_time_end
                        ELSE NULL
                    END as end,
                    event_description as description,
                    event_color as color,
                    admin_id
                FROM calendar_event
                ORDER BY event_date, event_time_start";
        
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error getting all events: " . $e->getMessage());
            return [];
        }
    }

    public function deleteEvent($eventId) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM calendar_event WHERE event_id = ?");
            return $stmt->execute([$eventId]);
        } catch (PDOException $e) {
            error_log("Error deleting event: " . $e->getMessage());
            return false;
        }
    }




    // RESIDENT PART

    public function getAllEvents_RES() {
        $stmt = $this->pdo->query("
            SELECT * FROM calendar_event 
            ORDER BY event_date, event_time_start
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventsByDateRange_RES($startDate, $endDate) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM calendar_event 
            WHERE event_date BETWEEN ? AND ?
            ORDER BY event_date, event_time_start
        ");
        $stmt->execute([$startDate, $endDate]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>