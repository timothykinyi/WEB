<?php


if (isset($_POST['payee_adder'])) {
    payee_adder();
}
else if (isset($_POST['payee_Deleter'])) {
    payee_Deleter();
}
else if (isset($_POST['contact'])) {
    contact();
}


function payee_adder()
{
    session_start();

$database = $_SESSION['account_no'];
$db = new mysqli("localhost","root","",$database);
if ($db->connect_error)
{ die("Connection failed: " .$db->connect_error );}


$payee = $_POST['payee'];
$acc_no = $_POST['acc_no'];
$yacc_no =$_POST['yacc_no'];

$d0b = new mysqli("localhost","root","",$acc_no);
if ($d0b->connect_error)
    {     $er = "Unknown database '".$acc_no."'";
        if($d0b->connect_error == $er)
        {
            $res = "Acoount number doesn't exist ! ";
            header("Location: error.php?error=$res");
        }
        else{
            die("Connection failed: " .$d0b->connect_error );
        }
    }

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

}
function payee_Deleter()
{
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

$delpayee = $_POST["payee"];

$query = "DELETE FROM paybills WHERE acc_no = '$delpayee'";
$result = $db->query($query);
if($result === true)
{   
    header("Location: profile.php");
}else
{ 
    echo(" failed ".$query. "<br>" .$db->error );
}
}

function contact()
{
    $connection = new mysqli("localhost", "root", "","bank");
if ($connection->connect_error)
{
    die("Connection failed: " .$connection->connect_error );
}

$name= $_POST["name"];
$email= $_POST["email"];
$message= $_POST["message"];
$status = "un seen";

$sql = "INSERT INTO Customer_Support (name, email, message, status) VALUES('$name','$email',\"$message\",'$status')";
$result = $connection->query($sql);

if ($result === true) {

    header("Location: profile.php");
    }
    else {

        $res = "Message not sent try again <br> ensure your message is less the 255 characters ! ";
        header("Location: error.php?error=$res");
    }
$connection->close();
}

?>