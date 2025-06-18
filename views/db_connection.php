<?php
try {
    $pdo = new PDO("pgsql:host=localhost;dbname=Buaya_InfoSystem", "postgres", "12345");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
