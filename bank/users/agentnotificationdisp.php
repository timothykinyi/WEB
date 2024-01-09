<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = $_SESSION['agaccount_no'];
$db = new mysqli($server,$username,$password,$database);
if ($db->connect_error)
{
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>connection failed";
    header("Location: error.php?error=$res");
}

$query = "SELECT * FROM notifications";
$anresult = $db->query($query);

$anotifications = array();
if ($anresult->num_rows > 0) {
    while ($row = $anresult->fetch_assoc()) {
        $anotifications[] = $row; 
    }
}

echo json_encode($anotifications);
?>