<?php
// Include the database connection
require '../config/db_connection.php';

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    
    // Handle file upload
    $image = $_FILES['image']['name'];
    $target = "../assets/uploads/" . basename($image);

    // Validate file upload
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo "Upload failed with error code " . $_FILES['image']['error'];
    } else {
        // Insert property into the database
        $query = "INSERT INTO properties (title, location, price, type, description, image) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($query);
        $stmt->execute([$title, $location, $price, $type, $description, $image]);

        // Move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Property added successfully!";
            echo "<img src='$target' alt='Property Image' style='max-width: 300px; height: auto;'>";
        } else {
            echo "Failed to upload image.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../assets/css/styles.css">
    <title>Add Property</title>
</head>
<body>

    <?php include '../includes/header.php'; ?>

    <h2>Add Property</h2>
    <form action="add_property.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Property Title" required><br>
        <input type="text" name="location" placeholder="Location" required><br>
        <input type="number" name="price" placeholder="Price" required><br>
        <select name="type" required>
            <option value="">Select Property Type</option>
            <option value="Apartment">Apartment</option>
            <option value="House">House</option>
            <option value="Villa">Villa</option>
        </select><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="file" name="image" required><br>
        <button type="submit">Add Property</button>
    </form>

    <?php include '../includes/footer.php'; ?>
</body>
</html>

