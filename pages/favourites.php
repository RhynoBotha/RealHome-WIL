<?php
session_start();
require '../config/db_connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your favorites.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch the user's favorite properties

$stmt = $pdo->prepare("
    SELECT p.* FROM favorites f
    JOIN properties p ON f.property_id = p.id
    WHERE f.user_id = :user_id
");
$stmt->execute(['user_id' => $user_id]);
$favorites = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Favorites</title>
    <link rel="stylesheet" href="../assets/styles.css">

    <style>
        h2 {
            display : flex;
            justify-content : center;
        }
    </style>
</head>
<body>
<?php include '../includes/header.php'; ?>

    <h2>My Favorite Properties</h2>
    <?php if (count($favorites) > 0): ?>
        <div class="property-list">
            <?php foreach ($favorites as $property): ?>
                <div class="property-item">
                    <h3><?php echo htmlspecialchars($property['title']); ?></h3>
                    <p>Location: <?php echo htmlspecialchars($property['location']); ?></p>
                    <p>Price: <?php echo htmlspecialchars($property['price']); ?></p>
                    <a href='properties_list.php?property_id=<?php echo $property['property_id']; ?>'>View Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>You have no favorite properties yet.</p>
    <?php endif; ?>

    <?php include '../includes/footer.php'; ?>
</body>
</html>

