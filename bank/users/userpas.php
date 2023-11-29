<?php
if (isset($_POST['userpassword'])) {
    user();
}
else if (isset($_POST['agentpassword'])) {
    agent();
}
else if (isset($_POST['adminpassword'])) {
    admin();
}



session_start();

function user()
{
$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error)
{
    die("Connection failed: " .$db->connect_error );
}

$currentpassword =$_POST["current-password"];
$newpassword =$_POST["new-password"];
$hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
if (isset($_COOKIE['account_no'])) {
    $account_no = $_COOKIE['account_no'];
} else {echo "Cookie not set.";}


$sql1 = "SELECT * FROM users WHERE account_no='$account_no'";
$result = $db->query($sql1);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $passwrd = $row['password'];
    }
} else {
    $res = "Failed try again ";
    header("Location: error.php?error=$res");
}
if(password_verify($currentpassword , $passwrd)) 
{    
$query = "UPDATE `users` SET `password`='$hashedPassword' WHERE account_no = '$account_no'";
$result = $db->query($query);
if($result === true)
{   
        header("Location: profile.php");
}else
{ 
    $res = "Failed try again ";
    header("Location: error.php?error=$res");
}}else
{
    $res = "Current password entered is wrong ";
    header("Location: error.php?error=$res");
}
}

function agent()
{
$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error)
{
    die("Connection failed: " .$db->connect_error );
}

$currentpassword =$_POST["current-password"];
$newpassword =$_POST["new-password"];
$hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
    if (isset($_COOKIE['account_no'])) 
    {
        $agent_no = $_COOKIE['account_no'];
    }
    else 
    {
        $res = "Failed try again ";
        header("Location: error.php?error=$res");
    }

$sql1 = "SELECT * FROM agents WHERE account_no ='$agent_no'";
$result = $db->query($sql1);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $passwrd = $row['password'];
    }
} else {
    $res = "Failed try again ";
    header("Location: error.php?error=$res");
}
if(password_verify($currentpassword , $passwrd)) 
{    
$query = "UPDATE `agents` SET `password`='$hashedPassword' WHERE account_no = '$agent_no'";
$result = $db->query($query);
if($result === true)
{   
        header("Location: agentpage.php");
}else
{ 
    $res = "Failed try again ";
    header("Location: error.php?error=$res");
}}else{
    $res = "Current password entered is wrong ";
    header("Location: error.php?error=$res");
}
}

function admin()
{
$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error)
{
    die("Connection failed: " .$db->connect_error );
}

$currentpassword =$_POST["current-password"];
$newpassword =$_POST["new-password"];
$hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
if (isset($_COOKIE['account_no'])) {
    $account_no = $_COOKIE['account_no'];
} else {echo "Cookie not set.";}


$sql1 = "SELECT * FROM users WHERE account_no='$account_no'";
$result = $db->query($sql1);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $passwrd = $row['password'];
    }
} else {
    $res = "Failed try again ";
    header("Location: error.php?error=$res");
}
if(password_verify($currentpassword , $passwrd)) 
{    
$query = "UPDATE `users` SET `password`='$hashedPassword' WHERE account_no = '$account_no'";
$result = $db->query($query);
if($result === true)
{   
        header("Location: profile.php");
}else
{ 
    $res = "Failed try again ";
    header("Location: error.php?error=$res");
}}else{
    $res = "Current password entered is wrong ";
    header("Location: error.php?error=$res");
}
}
?>