<?php
session_start();
$database = $_SESSION['account_no'];
$connection = new mysqli("localhost", "root", "",$database);
if($connection -> connect_error)
{
    die ("Connection failled " . $connection -> connect_error);
}
$goal_name = $_POST["goal-name"];
$amount= $_POST["goal-amount"];
$currentamount = $_POST["current-amount"];


$sql = "INSERT INTO saving (goal_name, amount, currentamount) VALUES('$goal_name','$amount','$currentamount')";
$result = $connection->query($sql);

if ($result === true) {
    echo ("Beneficiary added successful.");
    $_SESSION['account_no'] = $database;
    header("Location: accact.php");
    }
    else {
        echo "Error3: " . $sql . "<br>" . $connection->error;
    }
$connection->close();
?>