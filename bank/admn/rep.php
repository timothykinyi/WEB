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
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $account = $row['account_no'];
    }
} else {
    echo "email not found." . $email . "email not found.";
}

$db = new mysqli("localhost","root","",$account);
if ($db->connect_error)
{
    die("Connection failed: " .$db->connect_error );
}

$message1 =$_POST["message"];
$id =$_POST["id"];
$queryz1 = "INSERT INTO `notifications`(messages) VALUE(\"<br><strong>Customer_Support</strong><br>$message1\")";
    if ($db->query($queryz1)=== true) {
        $connection2 = new mysqli("localhost", "root", "","bank");
        if ($connection2->connect_error)
        { die("Connection failed: " .$connection2->connect_error ); }
        
        $sql = "UPDATE `Customer_Support` SET `status`='seen and replied' WHERE id = $id";
        $result = $connection2->query($sql);
        
        if ($result === true) 
            {
                header("Location: superadmin.php");
            }
            else {
                echo "Error3: " . $sql . "<br>" . $connection2->error;
            }
        $connection->close();
        }
        else {
            echo "Error3: " . $dqueryz1 . "<br>" . $db->error;
        }
}



?>