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

$query = "SELECT * FROM paybills";
$result = $db->query($query);

?>