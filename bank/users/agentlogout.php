<?php
session_start();
if (isset($_COOKIE['agent_no'])) {
    // Access the data from the cookie
    $user_id =  $_COOKIE['agent_no'];

} else {
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: agentpage.php?error=$result");
}

$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error) {     
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: agentpage.php?error=$result");}

$logout_query = "DELETE FROM `user_activity` WHERE user_id = '$user_id'";
$result = $db->query($logout_query);
if($result === true)
{   
    $_SESSION['agent_n'] = "";
    $_SESSION['agaccount_no'] = "";
    $_SESSION['agbalance'] = "";
    setcookie('agentlogin', '', time() - 31536000, '/');
    $result1 = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Logged out";
    header("Location: agentlogin.php?error=$result1");
}else
{ 
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: agentpage.php?error=$result");
}

?>
