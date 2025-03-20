<?php
$host = "localhost";
$dbname = "registration_db";
$username = "root";  // Change if necessary
$password = "";      // Change if necessary

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
