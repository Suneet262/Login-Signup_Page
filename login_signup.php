<?php
// Database configuration
$hostname = 'localhost';
$username = 'root';
$password = '';

// Create database
$database = 'user_authentication';
$conn = mysqli_connect($hostname, $username, $password);
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully.";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);

// Establish connection to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);

// Handle login and signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        // Handle login form submission
        // Get form data
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '','user_authentication');

        // Check if the connection is successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if user exists
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $success = "Login successful!";
        } else {
            $error = "Invalid credentials. Please try again.";
        }

        // Close the database connection
        mysqli_close($conn);
    } elseif (isset($_POST['signup'])) {
        // Handle signup form submission
        // Get form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validate form data
        // Add your own validation rules here

        // Connect to the database
        $conn = mysqli_connect($hostname, $username, $password, $database);

        // Check if the connection is successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if user already exists
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $error = "User already exists. Please login.";
        } else {
            // Insert the user data into the database
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($conn, $sql)) {
                $success = "Registration successful! Thank you, $name.";
            } else {
                $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        // Close the database connection
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login/Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>User Login/Signup</h2>
        <div class="login-signup">
            <div class="form-toggle">
                <input type="radio" id="login-toggle" name="toggle" value="login" checked>
                <label for="login-toggle">Login</label>
                <input type="radio" id="signup-toggle" name="toggle" value="signup">
                <label for="signup-toggle">Sign Up</label>
            </div>
            <form id="login-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                
                <input type="submit" name="login" value="Login">
            </form>
            <form id="signup-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                
                <input type="submit" name="signup" value="Sign Up">
            </form>
        </div>

        <?php
        if (isset($error)) {
            echo "<p class='error'>$error</p>";
        }

        if (isset($success)) {
            echo "<p class='success'>$success</p>";
        }
        ?>
    </div>
    <script>
        const formToggle = document.querySelector('.form-toggle');
        const loginForm = document.querySelector('#login-form');
        const signupForm = document.querySelector('#signup-form');

        formToggle.addEventListener('change', function () {
            if (this.value === 'login') {
                loginForm.style.display = 'block';
                signupForm.style.display = 'none';
            } else if (this.value === 'signup') {
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
            }
        });
    </script>
</body>
</html>
