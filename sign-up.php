<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs from the form
    $fname = $_POST["Fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Perform basic validation (you should add more thorough validation and security measures)
    if (empty($fname) || empty($lname) || empty($email) || empty($tel) || empty($address) || empty($password) || empty($confirmPassword)) {
        echo "Please fill in all the fields.";
    } elseif ($password != $confirmPassword) {
        echo "Passwords do not match.";
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
        $sql = "INSERT INTO users (fname, lname, email, tel, address, password) VALUES ('$fname', '$lname', '$email', '$tel', '$address', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, show a JavaScript alert
            echo '<script>';
            echo 'alert("Registration successful!");';
            echo 'window.location.href = "index.html";'; // Redirect to the login page
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo 'window.location.href = "index.html";'; // Redirect to the login page
        }

        // Close the database connection
        $conn->close();
    }
}
?>
