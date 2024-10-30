<?php
require '../config/db_connection.php';

// Check if the 'id' parameter is in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $property_id = $_GET['id'];

    // Fetch property details using the provided ID
    $stmt = $pdo->prepare("SELECT * FROM properties WHERE id = ?");
    $stmt->execute([$property_id]);
    $property = $stmt->fetch();

    // Check if property exists
    if (!$property) {
        echo "Property not found.";
        exit();
    }
} else {
    echo "Property ID is not specified.";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $property['title']; ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <!-- Include header.php here -->
    </header>
    
    <main>
        <h1><?php echo $property['title']; ?></h1>
        <img src="uploads/<?php echo $property['image']; ?>" alt="Property Image">
        <p><?php echo $property['description']; ?></p>
        <p>Location: <?php echo $property['location']; ?></p>
        <p>Price: R<?php echo $property['price']; ?></p>
        <p>Amenities: <?php echo $property['amenities']; ?></p>
        <p>Contact Agent: <a href="agent_profile.php?id=<?php echo $property['agent_id']; ?>">View Agent</a></p>
    </main>
    
    <footer>
        <!-- Include footer.php here -->
        <?php include '../includes/footer.php'; ?>
    </footer>
</body>
</html>



