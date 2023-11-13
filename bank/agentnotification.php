<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = $_SESSION['account_no'];
$db = new mysqli($server,$username,$password,$database);
if ($db->connect_error)
{
    die("Connection failed: " .$db->connect_error );
}

$query = "DELETE FROM notifications WHERE id > 0";
$result = $db->query($query);
if($result === true)
{   
    header("Location: agentpage.php");
}else
{ 
    echo(" failed ".$query. "<br>" .$db->error );
}
?>