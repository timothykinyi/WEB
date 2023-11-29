<?php
session_start();

if (isset($_COOKIE['account_no'])) {
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

$savingquery = "SELECT * FROM saving";
$savingresult = $db->query($savingquery);

$budgetquery = "SELECT * FROM budget";
$budgetresult = $db->query($budgetquery);

?>