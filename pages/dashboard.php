<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You need to log in first.";
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel = "stylesheet" href = "../assets/css/styles.css">
    <style>
        h2 {
            display : flex;
            justify-content : center;
            color : #359eba ;
        }
        h2:hover {
            font-size : 28px ;
            color : #ffab0e ;
            transition : all 1s;
        }
        p , a {
            display : flex ;
            justify-content : center;
        }
        #hash {
            padding-bottom : 10px ;
        }
    </style>
</head>
<body style = "background-color : #f1decf  ;">
<?php include '../includes/header.php'; ?>
    <h2>Welcome <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
    <p>This is your dashboard. You are now logged in.</p>
    <a href="logout.php">Logout</a>
    <br/>
    <a href = "index.php" id = "hash"> HomePage </a>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
