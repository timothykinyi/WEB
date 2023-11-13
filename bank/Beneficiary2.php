<?php
session_start();

// Check if the cookie is set
if (isset($_COOKIE['account_no'])) {
    // Access the data from the cookie
    $sharedData = $_COOKIE['account_no'];

} else {
    echo "Cookie not set.";
}


$database = $_SESSION['account_no'];
$db = new mysqli("localhost", "root", "",$sharedData);
if ($db->connect_error)
{
    die("Connection failed: " .$db->connect_error );
}

$query = "SELECT * FROM beneficiaries";
$result = $db->query($query);

?>