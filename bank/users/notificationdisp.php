<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = $_SESSION['account_no'];
$db = new mysqli($server,$username,$password,$database);
if ($db->connect_error)
{
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>connection failed";
    header("Location: error.php?error=$res");
}

$query = "SELECT * FROM notifications";
$nresult = $db->query($query);

$notifications = array();
if ($nresult->num_rows > 0) {
    while ($row = $nresult->fetch_assoc()) {
        $notifications[] = $row; 
    }
}

echo json_encode($notifications);
?>
