<?php
session_start();
$database = $_SESSION['account_no'];
$connection = new mysqli("localhost", "root", "",$database);
if($connection -> connect_error)
{
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
    header("Location: utilities.php?error=$res");
}
$name= $_POST["beneficiaryname"];
$DOB= $_POST["beneficiaryDOB"];
$relationship = $_POST["beneficiaryrelationship"];

$sql = "INSERT INTO beneficiaries (name, DOB,relationship) VALUES('$name','$DOB','$relationship')";
$result = $connection->query($sql);

if ($result === true) {
    echo ("<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Beneficiary added successful.");
    $_SESSION['account_no'] = $database;
    header("Location: utilities.php");
    }
    else {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: utilities.php?error=$res");
    }
$connection->close();
?>