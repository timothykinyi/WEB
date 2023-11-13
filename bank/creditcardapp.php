<?php
session_start();
$connection = new mysqli("localhost", "root", "","bank");
if($connection -> connect_error)
{
    die ("Connection failled " . $connection -> connect_error);
}

$name= $_POST["full-name"];
$email= $_POST["email"];
$annualincome = $_POST["income"];
$creditscore = $_POST["credit-score"];
$accountno = $_SESSION['account_no'];

$sql = "INSERT INTO creadit_appl (name, email,annualincome, creditscore, accountno )
                                 VALUES('$name','$email','$annualincome' ,'$creditscore' ,'$accountno')";
$result = $connection->query($sql);

if ($result === true) {
    echo ("Beneficiary added successful.");
   
    header("Location: accact.php");
    }
    else {
        echo "Error3: " . $sql . "<br>" . $connection->error;
    }
$connection->close();

?>