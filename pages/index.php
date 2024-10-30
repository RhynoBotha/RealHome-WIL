<?php
// Start session
session_start();
require '../config/db_connection.php'; // Include your database connection

// Fetch featured properties for homepage (you can limit the number of properties displayed)
$query = "SELECT * FROM properties LIMIT 6"; 
$stmt = $pdo->prepare($query);
$stmt->execute();
$featuredProperties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealHome - Find Your Perfect Home - w in da chat</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <style>
        .hero {
            display : flex;
            justify-content : center;
        }
        #sub {
            display : flex;
            justify-content : center;
            font-size : 25px;
            color : #2f7ca8;
        }
        p {
            display : flex;
            font-size : 18px;
            color : #289ba0;
            justify-content : center;
        }
    </style>
</head>
<body>
    <!-- Include the header -->
    <?php include '../includes/header.php'; ?>

    <main>
        <!-- Hero Section -->
        <section>
            <h1 class = "hero">Welcome to RealHome</h1>
            <p id = "sub">Find your perfect property to buy or rent</p>
        </section>

        <form method="GET" action="search.php">
         <input type="text" name="location" placeholder="Location">
         <input type="number" name="min_price" placeholder="Min Price">
         <input type="number" name="max_price" placeholder="Max Price">
         <select name="property_type">
         <option value="">Any Type</option>
         <option value="house">House</option>
         <option value="apartment">Apartment</option>
         </select>
         <button type="submit">Search Properties</button>
        </form>



        <!-- Featured Properties -->
        <section class="featured-properties">
            <h2 id = "feat-head">Featured Properties</h2>
            <div class="property-container">
                <?php foreach ($featuredProperties as $property): ?>
                    <div class="property-item" data-location='<?php echo $property['location']; ?> " data-price="<?php echo $property['price']; ?>" data-type="<?php echo $property['property_type']; ?>'>
                        <img src="../assets/uploads/<?php echo $property['image']; ?>" alt="Property Image">
                        <h3><?php echo $property['title']; ?></h3>
                        <p>Location: <?php echo $property['location']; ?></p>
                        <p>Price: R<?php echo $property['price']; ?></p>
                        <a href="property_details.php?id=<?php echo $property['id']; ?>">View Details</a>
                        </br>
                        <a href="properties_list.php? id=<?php echo $property['id']; ?>">Modify Property</a>
                        </br>
                        <a href="add_to_favorites.php?property_id=<?php echo $property['id']; ?>">Add to Favorites</a>
                        </br>
                        <a href="add_to_wishlist.php?property_id=<?php echo $property['id']; ?>" class="wishlist-button">Add to Wishlist</a>
                        </br>
                        <!-- Add to Favorites button -->
                        <a href='delete_property.php?id=<?php echo $property['id']; ?>' onclick="return confirm('Are you sure you want to delete this property?');">Delete Property</a>
                    <iframe
                          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.43768988302!2d28.2293!3d-25.7479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDQ0JzUyLjAiUyAyOMKwMTMnNDMuOSJF!5e0!3m2!1sen!2sza!4v1600000000000!5m2!1sen!2sza"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        
                <!-- Remove from favourites button--><!-- Remove from Favorites button -->
                        </form>
                        <form action="remove_from_favorites.php" method="POST">
                        <input type="hidden" name="property_id" value='<?php echo $property['property_id']; ?>'>
                        <button type="submit">Remove from Favorites</button>
                        </form>
                       </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <!-- Include the footer -->
    <?php include '../includes/footer.php'; ?>

    <!-- Include JavaScript for filtering properties -->
    <script src="js/scripts.js"></script>
</body>
</html>
