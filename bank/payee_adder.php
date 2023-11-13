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

$payee = $_POST['payee'];
$acc_no = $_POST['acc_no'];
$yacc_no =$_POST['yacc_no'];

$query = "INSERT INTO paybills (payee, acc_no, your_acc_no) VALUE('$payee','$acc_no','$yacc_no')";
$result = $db->query($query);

if ($result === true) {
    echo ("Payee added successful.");
    header("Location: profile.php");
    }
    else {
        echo "Error3: " . $dquery . "<br>" . $db->error;
    }

$db->close();
?>