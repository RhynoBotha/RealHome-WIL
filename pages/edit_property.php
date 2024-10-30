<?php
// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Include the database connection
    require '../config/db_connection.php';

    // Retrieve property details for editing
    $stmt = $pdo->prepare("SELECT * FROM properties WHERE id = ?");
    $stmt->execute([$id]);
    $property = $stmt->fetch();

    if (!$property) {
        echo "Property not found.";
        exit;
    }
} else {
    echo "No property ID specified.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    
    // Handle file upload if a new image is provided
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "../assets/uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $image = $property['image']; // Keep the existing image
    }

    // Update the property in the database
    $query = "UPDATE properties SET title = ?, location = ?, price = ?, type = ?, description = ?, image = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title, $location, $price, $type, $description, $image, $id]);

    echo "Property updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
</head>
<body>
    <h2>Edit Property</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" value="<?php echo $property['title']; ?>" required><br>
        <input type="text" name="location" value="<?php echo $property['location']; ?>" required><br>
        <input type="number" name="price" value="<?php echo $property['price']; ?>" required><br>
        <select name="type" required>
            <option value="Apartment" <?php if ($property['type'] == 'Apartment') echo 'selected'; ?>>Apartment</option>
            <option value="House" <?php if ($property['type'] == 'House') echo 'selected'; ?>>House</option>
            <option value="Villa" <?php if ($property['type'] == 'Villa') echo 'selected'; ?>>Villa</option>
        </select><br>
        <textarea name="description" required><?php echo $property['description']; ?></textarea><br>
        <input type="file" name="image"><br>
        <button type="submit">Update Property</button>
    </form>
</body>
</html>
