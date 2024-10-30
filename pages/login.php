<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        h2 {
            display : flex ;
            justify-content : center ;
            font-size : 30px ;
        }
        label {
            font-weight : bolder;
            font-size : 15px ;
        }
    </style>
</head>
<body style = "background-color : #e9f2ff ">
<?php include '../includes/header.php'; ?>
    <h2>Login Page</h2>
    <form action="login_process.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <br/>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
