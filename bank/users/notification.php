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
    header("Location: profile.php?error=$res");
}

$query = "DELETE FROM notifications WHERE id > 0";
$result = $db->query($query);
if($result === true)
{   
    header("Location: profile.php");
}else
{ 
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed to mark as read ";
    header("Location: profile.php?error=$res");
}
?>