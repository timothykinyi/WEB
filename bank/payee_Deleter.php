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

$delpayee = $_POST["payee"];

$query = "DELETE FROM paybills WHERE acc_no = '$delpayee'";
$result = $db->query($query);
if($result === true)
{   
    header("Location: profile.php");
}else
{ 
    echo(" failed ".$query. "<br>" .$db->error );
}
?>