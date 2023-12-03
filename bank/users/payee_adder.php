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
{    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
    header("Location: profile.php?error=$result");
}


$payee = $_POST['payee'];
$acc_no = $_POST['acc_no'];
$yacc_no =$_POST['yacc_no'];

$d0b = new mysqli("localhost","root","",$acc_no);
if ($d0b->connect_error)
    {     $er = "Unknown database '".$acc_no."'";
        if($d0b->connect_error == $er)
        {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Acoount number doesn't exist ! ";
            header("Location: error.php?profile=$res");
        }
        else{
            $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
            header("Location: profile.php?error=$result");
        }
    }

$query = "INSERT INTO paybills (payee, acc_no, your_acc_no) VALUE('$payee','$acc_no','$yacc_no')";
$result = $db->query($query);

if ($result === true) {
    $result1 = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Payee added successful.";
    header("Location: profile.php?error=$result1");
    }
    else {
        $result1 = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$result1");
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
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
    header("Location: profile.php?error=$result");
}

$delpayee = $_POST["payee"];

$query = "DELETE FROM paybills WHERE acc_no = '$delpayee'";
$result = $db->query($query);
if($result === true)
{   
    $result = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Payee deleted ";
    header("Location: profile.php?error=$result");
}else
{ 
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
    header("Location: profile.php?error=$result");
}
}

function contact()
{
    $connection = new mysqli("localhost", "root", "","bank");
if ($connection->connect_error)
{
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
    header("Location: profile.php?error=$result");
}

$name= $_POST["name"];
$email= $_POST["email"];
$message= $_POST["message"];
$status = "un seen";

$sqlq = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";
$resultq = $connection->query($sqlq);

if ($resultq->num_rows > 0) {
    while ($row = $resultq->fetch_assoc()) {
        $emailz = $row['email'];
    }
} else {
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Message not sent try again ";
    header("Location: profile.php?error=$res");
}
if ($emailz != $email)
{
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Use the email you registered with on this platform";
    header("Location: profile.php?error=$res");  
}

$sql = "INSERT INTO Customer_Support (name, email, message, status) VALUES('$name','$email',\"$message\",'$status')";
$result = $connection->query($sql);

if ($result === true) {

    $result1 = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Message sent succesfully ";
    header("Location: profile.php?error=$result1");
    }
    else {

        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Message not sent try again <br> ensure your message is less the 255 characters ! ";
        header("Location: profile.php?error=$res");
    }
$connection->close();
}

?>