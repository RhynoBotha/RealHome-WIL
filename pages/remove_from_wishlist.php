<?php
session_start();
require '../config/db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You need to be logged in to remove from your wishlist.");
}

// Get the property_id from the request
if (isset($_GET['property_id'])) {
    $property_id = $_GET['property_id'];
    $user_id = $_SESSION['user_id'];

    // Remove from wishlist
    $stmt = $pdo->prepare("DELETE FROM wishlist WHERE user_id = ? AND property_id = ?");
    $stmt->execute([$user_id, $property_id]);

    echo "Property removed from wishlist!";
} else {
    echo "Property ID is not specified.";
}
?>

