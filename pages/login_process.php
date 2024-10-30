
<?php
// Include the database connection file
require '../config/db_connection.php';

session_start(); // Start session to manage user sessions after login

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form input
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Prepare a query to find the user by email
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);

    // Check if the email exists in the database
    if ($stmt->rowCount() > 0) {
        // Fetch the user's data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the entered password with the hashed password stored in the database
        if (password_verify($password, $user['password'])) {
            // Password is correct, create session and log the user in
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo "Login successful! Redirecting to the dashboard...";
            // Redirect to a dashboard or home page
            header('Location: dashboard.php');
            exit();
        } else {
            // Incorrect password
            echo "Invalid password. Please try again.";
        }
    } else {
        // Email doesn't exist
        echo "No account found with that email. Please try again.";
    }
}
?>
