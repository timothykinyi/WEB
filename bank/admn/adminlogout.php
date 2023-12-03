<?php
session_start();
if (isset($_COOKIE['adm_no'])) {
    // Access the data from the cookie
    $user_id =  $_COOKIE['adm_no'];

} else {
    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>log out failed";
    header("Location: superadmin.php?error=$nres");
}

$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error) { die("Connection failed: " .$db->connect_error );}

$logout_query = "DELETE FROM `user_activity` WHERE user_id = '$user_id'";
$result = $db->query($logout_query);
if($result === true)
{   
    

    if (isset($_COOKIE['adm_no'])) { $admn = $_COOKIE['adm_no']; } 
    else { header("Location: adminlogin.php");}
    $values = ["", "" , ''];
    setCookieWithArray($admn, $values, -1);
    session_destroy();        
    $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Logged out ";
    header("Location: adminlogin.php?error=$nres");
}else
{ 
    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
    header("Location: superadmin.php?error=$nres");
}


function setCookieWithArray($name, $values, $expiryDays) {
    $serializedValues = serialize($values);
    $expiryTime = time() + ($expiryDays * 24 * 60 * 60); 
    setcookie($name, $serializedValues, $expiryTime, '/');
}

?>
