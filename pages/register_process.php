<?php
// Include the database connection file
require '../config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form input
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($checkEmailQuery);
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "This email is already registered. Please try a different one.";
    } else {
        // Insert the user into the database
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);

        if ($stmt->execute([$username, $email, $hashedPassword])) {
            echo "Registration successful! You can now log in.";
            // Redirect to login page after successful registration
            header('Location: login.php');
            exit();
        } else {
            echo "Error during registration. Please try again.";
        }
    }
}
?>
