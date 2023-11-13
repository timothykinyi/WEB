<?php
session_start();
$connection = new mysqli("localhost", "root", "","bank");
if($connection -> connect_error)
{
    die ("Connection failled " . $connection -> connect_error);
}

$ltype= $_POST["loan-type"];
$employmentstatus= $_POST["employment-status"];
$amount = $_POST["loan-amount"];
$comment = $_POST["comments"];
$period = $_POST["period"];
$accountno = $_SESSION['account_no'];

$sql = "INSERT INTO loan_appl (ltype, employmentstatus, amount, period, account_no , comment)
                                 VALUES('$ltype','$employmentstatus','$amount' , '$period' ,'$accountno','$comment' )";
$result = $connection->query($sql);

if ($result === true) {
    echo (" added successful.");
   
    header("Location: accact.php");
    }
    else {
        echo "Error3: " . $sql . "<br>" . $connection->error;
    }
$connection->close();

?>