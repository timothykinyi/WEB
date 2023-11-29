<?php
session_start();
$database = $_SESSION['account_no'];
$connection = new mysqli("localhost", "root", "",$database);
if($connection -> connect_error)
{
    die ("Connection failled " . $connection -> connect_error);
}
$name= $_POST["beneficiaryname"];
$DOB= $_POST["beneficiaryDOB"];
$relationship = $_POST["beneficiaryrelationship"];

$sql = "INSERT INTO beneficiaries (name, DOB,relationship) VALUES('$name','$DOB','$relationship')";
$result = $connection->query($sql);

if ($result === true) {
    echo ("Beneficiary added successful.");
    $_SESSION['account_no'] = $database;
    header("Location: utilities.php");
    }
    else {
        echo "Error3: " . $sql . "<br>" . $connection->error;
    }
$connection->close();
?>