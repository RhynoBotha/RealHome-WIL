<?php
require '../config/db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM properties WHERE id = ?";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute([$id])) {
        echo "Property removed successfully!";
        // Redirect to the properties list page
        header('Location: properties_list.php');
        exit();
    } else {
        echo "Failed to remove property.";
    }
}
?>
