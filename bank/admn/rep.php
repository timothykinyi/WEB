<?php
if (isset($_POST['customerrep'])) {
    customerrep();
}



function customerrep()
{
session_start();
$server = "localhost";
$username = "root";
$password = "";
$database = "bank";
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
    header("Location: superadmin.php?error=$nres");
}

$email = $_POST["email"];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $account = $row['account_no'];
    }
} else {
    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>". $email . "email not found.";
    header("Location: superadmin.php?error=$nres");
}

$db = new mysqli("localhost","root","",$account);
if ($db->connect_error)
{
    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
    header("Location: superadmin.php?error=$nres");
}

$message1 =$_POST["message"];
$id =$_POST["id"];
$queryz1 = "INSERT INTO `notifications`(messages) VALUE(\"<br><strong>Customer_Support</strong><br>$message1\")";
    if ($db->query($queryz1)=== true) {
        $connection2 = new mysqli("localhost", "root", "","bank");
        if ($connection2->connect_error)
        {
            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
            header("Location: superadmin.php?error=$nres");
        }
        
        $sql = "UPDATE `Customer_Support` SET `status`='seen and replied' WHERE id = $id";
        $result = $connection2->query($sql);
        
        if ($result === true) 
            {
                $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Sent succesfully ";
                header("Location: superadmin.php?error=$nres");
            }
            else {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }
        $connection->close();
        }
        else {
            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
            header("Location: superadmin.php?error=$nres");
        }
}



?>