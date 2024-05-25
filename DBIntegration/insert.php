<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Database connection
    $host = 'localhost';
    $db = 'practice_db';
    $user = 'root';
    $pass = 'A0939109995m2%';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        // Set PDO to throw exceptions on errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert data into database
        $sql = "INSERT INTO users (username, email) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email]);

        echo "User added successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close connection
    $pdo = null;
}
?>
