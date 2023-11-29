<?php

session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "bank";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$type = $_SESSION['type'];
$location = $_SESSION['location'];

$sql = "SELECT * FROM locations WHERE type='$type' AND location='$location'";
$result = $conn->query($sql);


?>