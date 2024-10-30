<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel = "stylesheet" href = "../assets/css/styles.css">
    <style>
        .container {
            height : 100vh;
            width : 100vh;
            display : flex ;
            align-items : center;
            justify-content : center;
        }

        form {
            background : #dab8ff ;
            display : flex ;
            flex-direction : column ;
            padding : 2vw 4vw ;
            width : 90%;
            max-width : 600px ;
            border-radius : 10px;
        }
        form h3{
            color : #555 ;
            font-weight : 800;
            margin-bottom : 20px ;
        }

        form input, form textarea {
            border : 0;
            margin : 10px 0;
            padding : 20px ;
            outline : 0;
            background : #f5f5f5;
            font-size : 16px ;

        }
        form button {
            padding : 15px ;
            background : #ff5361;
            color : #fff;
            font-size : 18px;
            border : 0;
            outline : 0;
            cursor : pointer ;
            width : 150px;
            margin : 20px auto 0 ;
            border-radius : 30px ;
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <div class = "container">
        <form action="send_email.php" method="POST">
            <h3> RealHome : Contact Form</h3>
            
            <input type = "text" name = "first_name" id = "first_name" placeholder = "Your name" required >
            <input type = "email" name = "email" id = "email" placeholder = "Enter your email address" required >
            <input type = "text" name = "phone" placeholder = "Phone Number" required >
            <textarea id = "message" rows = "4" placeholder = "How can we help you?"></textarea>
            <button type = "submit"> Send </button>
        </form>
    </div>
       
    <?php include '../includes/footer.php'; ?>
</body>
</html>