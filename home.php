
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style_home_page.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h1>Welcome,  <?php 
                session_start();
                echo $_SESSION['$email'] ;?> !</h1>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="content">
        <h2>Welcome to the Home Page</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam commodo lacus eget sapien varius, id volutpat enim lacinia.
             Sed consequat tellus et nibh scelerisque tincidunt.</p>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2023 MyWebsite. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>