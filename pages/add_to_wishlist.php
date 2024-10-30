<?php
session_start();
require '../config/db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You need to be logged in to add to your wishlist.");
}

// Get the property_id from the request
if (isset($_GET['property_id'])) {
    $property_id = $_GET['property_id'];
    $user_id = $_SESSION['user_id'];

    // Insert into wishlist
    $stmt = $pdo->prepare("INSERT INTO wishlist (user_id, property_id) VALUES (?, ?)");
    $stmt->execute([$user_id, $property_id]);

    echo "Property added to wishlist!";
} else {
    echo "Property ID is not specified.";
}
?>
