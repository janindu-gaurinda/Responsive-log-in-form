<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform basic validation (you should add more thorough validation and security measures)
    if (empty($email) || empty($password)) {
        echo "Please fill in both email and password.";
    } else {
        // Connect to your database (replace the placeholders with your actual database credentials)
        $servername = "your_servername";
        $username = "your_username";
        $password_db = "your_password";
        $database = "your_database";

        $conn = new mysqli($servername, $username, $password_db, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Perform a basic SQL query (you should use prepared statements to prevent SQL injection)
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User is authenticated
            echo "Login successful!";
            // You can redirect the user to a dashboard or another page
        } else {
            // Authentication failed
            echo "Invalid email or password.";
        }

        // Close the database connection
        $conn->close();
    }
}
?>
