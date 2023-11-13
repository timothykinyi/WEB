<?php
session_start();
$database = $_SESSION['account_no'];
$db = new mysqli("localhost", "root", "",$database);
if ($db->connect_error)
{
    die("Connection failed: " .$db->connect_error );
}

$query = "SELECT * FROM saving";
$result = $db->query($query);

?>