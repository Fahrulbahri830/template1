<?php
// Database configuration
$servername = "localhost"; // For XAMPP, the server is usually "localhost"
$username = "root";       // Default XAMPP username
$password = "";           // Default XAMPP password is empty
$dbname = "wedding_invitation"; // Name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8mb4 to support emojis and special characters
$conn->set_charset("utf8mb4");
?>