<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = $_SESSION['account_no'];
$db = new mysqli($server,$username,$password,$database);
if ($db->connect_error)
{
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed ";
    header("Location: error.php?error=$res");
}

$query = "SELECT * FROM paybills";
$result = $db->query($query);

$payee = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $payee[] = $row; 
    }
}

echo json_encode($payee);
?>