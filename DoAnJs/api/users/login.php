<?php
// Establish database connection
$host = 'localhost';
$username = 'your_username';
$password = '';
$database = 'shop';
$connection = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Sanitize and validate input (you can add your own validation logic here)

// Perform database query
$query = "SELECT * FROM your_table WHERE email = '$email' AND password = '$password'";
$result = $connection->query($query);

// Check if a matching record is found
if ($result->num_rows > 0) {
    // Login successful
    echo "Login successful";
} else {
    // Login failed
    echo "Invalid email or password";
}

// Close the database connection
$connection->close();
?>