<?php
// Database configuration
$host = 'localhost'; // Your host name or IP address
$username = 'anil'; // Your MySQL user name
$password = 'password'; // Your MySQL password
$database = 'mero_diet_planner'; // Your MySQL database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for errors
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Connection successful
// echo 'Connected to the database successfully!';
?>
