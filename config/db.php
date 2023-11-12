<?php
// Database configuration
$host = 'localhost';// Replace with your actual database host
$user = 'root';  // Replace with your actual database username
$pass = '';  // Replace with your actual database password
$db = 'records_app';  // Replace with your actual database name

// Create Connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8mb4 (if needed)
$conn->set_charset("utf8mb4");

// You can also enable error reporting for debugging purposes
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Now you can use the $conn variable for database operations
?>
