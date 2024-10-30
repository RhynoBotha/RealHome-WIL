
<?php
// Connect to your database
include '../config/db_connection.php';

// Get search criteria from URL parameters
$location = $_GET['location'] ?? '';
$min_price = $_GET['min_price'] ?? '';
$max_price = $_GET['max_price'] ?? '';
$property_type = $_GET['property_type'] ?? '';

// Prepare a query with optional filters
$query = "SELECT * FROM properties WHERE 1";
if ($location) $query .= " AND location LIKE :location";
if ($min_price) $query .= " AND price >= :min_price";
if ($max_price) $query .= " AND price <= :max_price";
if ($property_type) $query .= " AND property_type = :property_type";

$stmt = $pdo->prepare($query);

if ($location) $stmt->bindValue(':location', "%$location%");
if ($min_price) $stmt->bindValue(':min_price', $min_price);
if ($max_price) $stmt->bindValue(':max_price', $max_price);
if ($property_type) $stmt->bindValue(':property_type', $property_type);

$stmt->execute();
$properties = $stmt->fetchAll();
?>

<h2>Search Results</h2>
<?php if ($properties): ?>
    <?php foreach ($properties as $property): ?>
        <div class="property-item">
            <h3><?php echo htmlspecialchars($property['title']); ?></h3>
            <p><?php echo htmlspecialchars($property['description']); ?></p>
            <p>Price: <?php echo htmlspecialchars($property['price']); ?></p>
            <p>Location: <?php echo htmlspecialchars($property['location']); ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No properties found matching your criteria.</p>
<?php endif; ?>
