<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Validate the form data (you can add more validation if required)
    if (empty($email) || empty($password)) {
        $error = "Please fill in all the fields.";
    } else {
        // TODO: Perform login authentication and database operations
        
        // Assuming you have a database table named "users" with columns: id, name, email, password
        $conn = mysqli_connect('localhost', 'root', '','user_authentication');
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) == 1) {
            // Successful login
            $row = mysqli_fetch_assoc($result);
            $_SESSION["email"] = $row["email"];
            $_SESSION["name"] = $row["name"];
            
            // Redirect to the home page upon successful login
            header("Location: home.html");
            exit();
        } else {
            // Invalid credentials
            $error = "Invalid email or password.";
        }
        
        mysqli_close($conn);
    }
}
?>

<!-- Your login HTML code here -->
