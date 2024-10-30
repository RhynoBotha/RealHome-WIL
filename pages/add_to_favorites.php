<?php
// Start the session
session_start();

// Include the database connection
require '../config/db_connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You need to be logged in to add favorites.");
}

// Check if property_id is set in the URL
if (!isset($_GET['property_id'])) {
    die("Property ID is not specified.");
}

// Get the property ID from the request
$property_id = $_GET['property_id'];
$user_id = $_SESSION['user_id']; // Assuming you stored user ID in session upon login

// Prepare and execute the statement to add to favorites
$stmt = $pdo->prepare("INSERT INTO favorites (user_id, property_id) VALUES (?, ?)");
$stmt->execute([$user_id, $property_id]);

// Check if the insertion was successful
if ($stmt->rowCount() > 0) {
    echo "Property added to favorites!";
} else {
    echo "Failed to add property to favorites.";
}
?>


<a href = "../pages/index.php"> Back to HomePage </a>

