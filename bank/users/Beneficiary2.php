<?php
session_start();

if (isset($_COOKIE['account_no'])) {
    $sharedData = $_COOKIE['account_no'];
} else {
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
    header("Location: utilities.php?error=$res");
}

$database = $_SESSION['account_no'];
$db = new mysqli("localhost", "root", "",$sharedData);
if ($db->connect_error)
{
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
    header("Location: utilities.php?error=$res");
}

$query = "SELECT * FROM beneficiaries";
$result = $db->query($query);

$savingquery = "SELECT * FROM saving";
$savingresult = $db->query($savingquery);

$budgetquery = "SELECT * FROM budget";
$budgetresult = $db->query($budgetquery);

?>