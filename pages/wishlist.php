<?php
session_start();
require '../config/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    die("You need to be logged in to view your wishlist.");
}

$user_id = $_SESSION['user_id'];

// Fetch wishlist properties for the user
$stmt = $pdo->prepare("
    SELECT p.* FROM wishlist w
    JOIN properties p ON w.property_id = p.id
    WHERE w.user_id = :user_id
");
$stmt->execute(['user_id' => $user_id]);
$wishlist = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wishlist</title>
    <link rel = "stylesheet" href = "../assets/css/styles.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
    <h2>Your Wishlist</h2>
    <div class="wishlist">
        <?php foreach ($wishlist as $property): ?>
            <div class="property-item">
                <h4><?php echo htmlspecialchars($property['title']); ?></h4>
                <p>Price: <?php echo htmlspecialchars($property['price']); ?></p>
                <a href="remove_from_wishlist.php?property_id=<?php echo $property['id']; ?>">Remove</a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
