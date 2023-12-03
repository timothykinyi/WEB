<?php
session_start();
if (isset($_COOKIE['account_no'])) {
    // Access the data from the cookie
    $user_id =  $_COOKIE['account_no'];

} else {
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: error.php?error=$res");
}

$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error) { die("Connection failed: " .$db->connect_error );}

$logout_query = "DELETE FROM `user_activity` WHERE user_id = '$user_id'";
$result = $db->query($logout_query);
if($result === true)
{   
    $_SESSION['username'] = "";
    $_SESSION['account_no'] = "";
    $_SESSION['balance'] = "";
    $_SESSION['status'] = "";
    setcookie("retirementplan", "", time() + 31536000, "/");
    setcookie('userlogin', '', time() - 31536000, '/');
    $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>logged out";
    header("Location: index.php?error=$res");
}else
{ 
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: error.php?error=$res");
}

?>
