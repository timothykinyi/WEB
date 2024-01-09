<?php

session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "bank";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: utilities.php?error=$res");
}



$type = $_SESSION['type'];
$location = $_SESSION['location'];

$sql = "SELECT * FROM locations WHERE type='$type' AND location='$location'";
$result = $conn->query($sql);

$locator = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locator[] = $row; 
    }
}

echo json_encode($locator);

?>