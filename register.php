<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        header("Location: index.php?error=Passwords do not match!");
        exit();
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        header("Location: index.php?error=Email already registered. Please use a different email.");
        exit();
    }

    // Encrypt password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    if ($stmt->execute([$email, $hashed_password])) {
        header("Location: index.php?success=Registration successful!");
        exit();
    } else {
        header("Location: index.php?error=Registration failed. Try again.");
        exit();
    }
}
?>
