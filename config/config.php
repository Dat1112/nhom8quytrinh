<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "nhom8web"; // Đổi tên biến từ $sever thành $database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    exit();
}
//echo "Connected successfully";
?>
