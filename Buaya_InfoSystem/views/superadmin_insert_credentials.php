<?php
class SuperAdminSeeder {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    
    public function seedSuperAdmin() {
        // Check if the superadmin already exists in the database
        $usernameCheck = 'superadmin';
        $stmt = $this->pdo->prepare("SELECT * FROM admin_account WHERE admin_username = :username");
        $stmt->bindParam(':username', $usernameCheck);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // If superadmin doesn't exist, insert the default superadmin
        if (!$admin) {
            $username = 'superadmin';
            $passwordHash = password_hash('superadmin', PASSWORD_BCRYPT);
            $bar_id = 10001;  // The bar ID, adjust as necessary
            $roleId = 1;  // Assuming 1 is the role_id for superadmin
            $fname  = 'Super Admin';
            $lname  = 'Super Admin';
            $mname  = 'Super Admin';
            $suffix = 'Super Admin';
            $email  = 'superadmin@gmail.com';  
            $contact= '09323766225';
            $image  = 'logo.jpg';

            // Insert default superadmin credentials into the database
            $insertStmt = $this->pdo->prepare("INSERT INTO admin_account 
                                                (admin_username, admin_password, role_id, bar_id, admin_fname, admin_lname, admin_mname, admin_suffix, admin_email, admin_contact, admin_image)
                                                VALUES (:username, :passwordHash, :role_id, :bar_id, :fname, :lname, :mname, :suffix, :email, :contact, :image)");
            
            // Bind parameters
            $insertStmt->bindParam(':username', $username);
            $insertStmt->bindParam(':passwordHash', $passwordHash);
            $insertStmt->bindParam(':role_id', $roleId);
            $insertStmt->bindParam(':bar_id', $bar_id);
            $insertStmt->bindParam(':fname', $fname);
            $insertStmt->bindParam(':lname', $lname);
            $insertStmt->bindParam(':mname', $mname);
            $insertStmt->bindParam(':suffix', $suffix);
            $insertStmt->bindParam(':email', $email);
            $insertStmt->bindParam(':contact', $contact);
            $insertStmt->bindParam(':image', $image);

            // Execute the insertion
            if ($insertStmt->execute()) {
                echo "Superadmin credentials inserted successfully!";
            } else {
                echo "Failed to insert superadmin credentials.";
            }
        } else {
            echo "Superadmin already exists!";
        }
    }
}

// Example usage:
require_once '../backend/db_connection.php'; // Include the DB connection file
$seeder = new SuperAdminSeeder($pdo);
$seeder->seedSuperAdmin(); // Call the method to seed the superadmin

?>
