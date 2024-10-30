<?php
require '../config/db_connection.php';

// Fetch all properties
$query = "SELECT * FROM properties";
$stmt = $pdo->prepare($query);
$stmt->execute();
$properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties List</title>
    <link rel = "stylesheet" href = "../assets/css/styles.css">
    <style>
        table {
            border : 3px solid orange ;
            border-radius : 15px 25px ;
            position: relative;
            padding : 5px ;
            left : 450px ;
        }
        #sub-heading {
            text-decoration : underline;
            transition : all 0.6s ;
            display : flex ;
            position: relative;
            justify-content : center ;
        }
        tr, td{
            display : flex;
            justify-content : center;
            gap : 10px ;
        }
        .row1 {
            border : 2px solid blue;
            border-radius : 15px ;
            display : flex ;
            gap : 75px ;
        }
        h2 {
            display : flex;
            justify-content : center ;
        }
        td {
            border : 1px solid orange ;
            border-radius : 15px 5px;
            padding : 10px ;
            margin : 5px ;
            font-size : 15px ;
            font-weight : bolder ;
        }
    </style>
</head>
<body style = "background-color : #ffd9d9 ">
    <?php include '../includes/header.php'; ?>
    <h2 id = "sub-heading">Properties List</h2>
    <a href="add_property.php"><h2 id = "ani">Add New Property</h2></a>
    <table>
        <tr class = "row1">
            <th>Title</th>
            <th>Location</th>
            <th>Price</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($properties as $property): ?>
            <tr>
                <td><?php echo $property['title']; ?></td>
                <td><?php echo $property['location']; ?></td>
                <td><?php echo number_format($property['price'], 2); ?></td>
                <td><?php echo $property['type']; ?></td>
                <td>
                    <a href="edit_property.php?id=<?php echo $property['id']; ?>">Edit</a>
                    <a href="delete_property.php?id=<?php echo $property['id']; ?>" onclick="return confirm('Are you sure you want to delete this property?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br/>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
