<?php
// db_connection.php
$host = 'localhost'; // Your database host
$db = 'realhome'; // Your database name
$user = 'root'; // Your database username (typically 'root' for XAMPP)
$pass = ''; // Your database password (usually empty for XAMPP)
$charset = 'utf8mb4'; // Character set for the database

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // Create a new PDO instance
    $pdo = new PDO($dsn, $user, $pass);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If there's a connection error, stop execution and display the error
    die("Database connection failed: " . $e->getMessage());
}


