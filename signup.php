<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Validate the form data (you can add more validation if required)
    if (empty($name) || empty($email) || empty($password)) {
        $error = "Please fill in all the fields.";
    } else {
        // TODO: Perform signup and database operations
        
        // Assuming you have a database table named "users" with columns: id, name, email, password
        $conn = mysqli_connect('localhost', 'root', '','user_authentication');
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Check if the user already exists
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            // User already exists, redirect to login page
            header("Location: login.html");
            exit();
        } else {
            // User does not exist, proceed with signup
            $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($conn, $query)) {
                // Signup successful
                // You can add further code or redirection if needed
                
                mysqli_close($conn);
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        }
        
        // mysqli_close($conn);
    }
}
?>

<!-- Your signup HTML code here -->
