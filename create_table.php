<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = "images";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table
$sql = "CREATE TABLE images(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    imagename VARCHAR(100) NOT NULL,
    imagetmp BLOB NOT NULL,
    imagetext TEXT
  )";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>