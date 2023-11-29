<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "bank";

$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$username_email = "kinyijr";
$password = "@Kinyijr1";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM `users` WHERE username='$username_email'";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM `users` WHERE username='$username_email' ";

$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    while ($row = $result->fetch_assoc()) 
    {
        $data = $row['account_no'];
        $username = $row['username'];
        $passwrd = $row['password'];
    }
} else {
    echo "No data found 1.";
    
}

$conns = new mysqli("localhost", "root", "", $data);

if ($conns->connect_error) {
    die("Connection failed: " . $conns->connect_error);
}
$sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
$result0 = $conns->query($sql0);

while ($row0 = $result0->fetch_assoc())
{
$bal = $row0['balance'];
}

while ($row = $result->fetch_assoc())
{

}
if(($username === $username_email) && ($passwrd === $hashedPassword)){
    
    $_SESSION['username'] = $username_email;
    $_SESSION['account_no'] = $data;
    $_SESSION['balance'] = $bal;
    setcookie("account_no", $data, time() + 31536000, "/");
    header("Location: profile.php");
} else {
    echo "Login failed. <a href='index.php'>Try again</a>";
}

$conn->close();


?>
