<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = $_SESSION['agaccount_no'];
$db = new mysqli($server,$username,$password,$database);
if ($db->connect_error)
{
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: agentpage.php?error=$result");
}

$query = "DELETE FROM notifications WHERE id > 0";
$result = $db->query($query);
if($result === true)
{   
    header("Location: agentpage.php");
}else
{ 
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: agentpage.php?error=$result");
    
}
?>