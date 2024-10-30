<?php
session_start();
require '../config/db_connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to remove properties from your favorites.";
    exit;
}

$user_id = $_SESSION['user_id'];
$property_id = $_POST['property_id'];

// Delete the property from favorites
$stmt = $pdo->prepare("DELETE FROM favorites WHERE user_id = ? AND property_id = ?");
if ($stmt->execute([$user_id, $property_id])) {
    echo "Removed from favorites successfully!";
} else {
    echo "Failed to remove property from favorites.";
}
?>

<a href = "../pages/index.php"> Back to HomePage </a>