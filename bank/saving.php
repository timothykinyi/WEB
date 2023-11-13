<?php
session_start();
$database =  $_SESSION['account_no'];
$connection = new mysqli("localhost", "root", "",$database);
if($connection -> connect_error)
{
    die ("Connection failled " . $connection -> connect_error);
}

$database_table4 = "CREATE TABLE saving (
    id INT AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(70),
    amount int,
    currentamount int
    );";
$res = $connection -> query($database_table4);

if ($res === true)
{
    $_SESSION['account_no'] = $database;
    echo "Registration successful.";
}
else {
    echo "Error3: " . $database_table4 . "<br>" . $connection->error;
}
?>