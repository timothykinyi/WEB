<?php

// Connect to the database
$conn = new mysqli("localhost", "root", "", "coffee_shop");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL command to create a table
$sql = "CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(20),
    order_details TEXT
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'customers' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>