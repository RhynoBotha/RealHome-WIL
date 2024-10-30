<?php
require '../config/db_connection.php';  // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Encrypt the password
    $role = $_POST['role'];  // Can be 'agent' or 'buyer'

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $role);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Home : Sign Up Page:</title>
    <link rel = "stylesheet" href = "../assets/css/SignUp.css"/>
    <header><h1 id = "main-heading"><img id = "image" src = "../assets/images/tranbg.png"> Real Home : Sign-Up Page</h1></header>
    
    <style>
        body {
            background-image : url("../assets/images/SUBG.svg")
        }
    </style>
</head>
<body>
    <form id = "signupform" action = "register_process.php" method="post">
    <div class = "container">
            <ul class = "overall-li">
                <h1> Sign-Up Page</h1>
                <input class = "inputs"  type="text" id = "name" name = "username" placeholder="Username" required> 
                <input class = "inputs" type = "email" id = "email" name = "email" placeholder="Email / Gmail" required>
                <input class = "inputs" type="password" id = "password"name = "password" placeholder="Password" required>
                <a target = "_blank" href = "../pages/index.php"><input class = "buttons" type="submit" id = "Sign-Up" name = "Sign-Up-Button" value="Sign-Up" ></a>
                <h2>OR</h2>
                <h2> Already have an Account <span style = "color: #92bdff;">??</span></h2>
                <a target = "_blank" href = "../RealHome/index.php"><input class = "buttons" action = "../pages/login.php" type = "submit" id = "Login" name = "Login-Button" value="Login"></a>
            </ul>
    </div>
    </form>
</body>
</html>
