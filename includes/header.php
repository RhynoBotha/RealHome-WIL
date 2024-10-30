<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealHome</title>
    <link rel="stylesheet" href = "../assets/css/styles.css"> <!-- Linking to your CSS file -->
    <script src="https://kit.fontawesome.com/yourkit.js" crossorigin="anonymous"></script> <!-- For icons if needed -->
    <script src="assets/js/scripts.js" defer></script> <!-- Linking to your JS file -->

    <style>
        #main-logo {
            border : 2px solid black ;
            border-radius : 75% ;
        }
        li, summary {
            display : flex;
            justify-content : center;
        }
        summary {
            padding : 10px;
        }
        summary:hover {
            background-color : #ffab0e  ;
            color : white;
            transition : all 0.9s;
            border : 2px solid;
            border-radius : 15px 25px;
        }
        /* Make the container of the nav items a flex container */
        .nav-links {
             display: flex;
             justify-content: space-between;
            align-items: center;
            }

            /* Optional: if each item should be evenly spaced with space around */
        .nav-links a {
            margin: 0 15px; /* Adds space on left and right of each item */
         }

    </style>

</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="index.php"><img id = "main-logo" src= "../assets/images/Real Home Logo.png" alt="RealHome Logo"></a>
                <h1> RealHome : You tried the rest, now make space for the Best!! </h1>
            </div>
            <nav>
                <ul class="nav-links">
                    <details>
                    <summary>Home Page </summary>
                    <li><a href = "../pages/index.php"> Go to Home </a></li>
                    <li><a href = "../pages/favourites.php"> Favorites </a></li>
                    <li><a href = "../pages/wishlist.php"> Wishlist </a></li>
                    </details>
                    <details>
                    <summary> Properties </summary>
                    <li><a href = "../pages/add_property.php">Add Property</a></li>
                    <li><a href = "../pages/properties_list.php"> Show Properties </a><li>
                    </details>
                    <details>
                        <summary> User </summary>
                        <li><a href = "../pages/login.php"> Login </a></li>
                        <li><a href = "../pages/register.php"> Register </a></li>
                        <li><a href = "../pages/apply_agent.php"> Apply to be Agent </a></li>
                        <li><a href = "../pages/view_agents.php"> Show all Agents </a></li>
                    </details>
                    <li><a href="../pages/contact.php">Contact</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li><a href="../pages/dashboard.php">Dashboard</a></li>
                    <?php else: ?>
                        <li><a href="pages/login.php">Login</a></li>
                        <li><a href="pages/register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
</body>
</html>
