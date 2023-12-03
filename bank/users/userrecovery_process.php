<?php

if (isset($_POST['loginSubmit'])) {
    // Process login form
    handleLogin();
}

function handleLogin() {
session_start();

// Database configuration
$server = "localhost";
$username = "root";
$password = "";
$database = "bank";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: index.php?error=$res");
}

$username_email = $_POST["email/username"];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Process and use the data as needed
        $data = $row['account_no'];
        $username = $row['username'];
        $passwrd = $row['authcode'];
        $status = $row['status'];
    }
} else {
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><strong>Login failed </strong><br>Check your user name and try again <br>If you don't have an account <a href='option.php'>register</a>";
    header("Location: index.php?error=$res");
}

$conns = new mysqli("localhost", "root", "", $data);

if ($conns->connect_error) {
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><strong>Login failed </strong><br>Check your user name and try again <br>If you don't have an account <a href='option.php'>register</a>";
    header("Location: index.php?error=$res");
}
$sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
$result0 = $conns->query($sql0);

while ($row0 = $result0->fetch_assoc())
{
$bal = $row0['balance'];
}

$sql3 = "SELECT balance FROM retirementplan WHERE transactions = 'start' ";
$result3 = $conns->query($sql3);
while ($row3 = $result3-> fetch_assoc())
{
$bal2 = $row3['balance'];
}

if(($username === $username_email) && password_verify($password , $passwrd)) {
    
    $_SESSION['username'] = $username_email;
    $_SESSION['account_no'] = $data;
    $_SESSION['balance'] = $bal;
    $_SESSION['status'] = $status;
    setcookie("retirementplan", $bal2, time() + 31536000, "/");
    setcookie("account_no", $data, time() + 31536000, "/");
    setcookie("userlogin", "$data", time() + 31536000, "/");
    $user_id = $data;
        if ($status === "Active")
        {
            header("Location: userrecovery.php");
        }else
        {
            header("Location: frz.php");
        }
    
} else {
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Wrong auth code  <a href='index.php'>Try again</a>";
    header("Location: index.php?error=$res");
}

$conn->close();
}

?>
