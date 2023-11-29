<?php
session_start();
if (isset($_COOKIE['account_no'])) {
    // Access the data from the cookie
    $user_id =  $_COOKIE['account_no'];

} else {
    echo "Cookie not set.";
}

$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error) { die("Connection failed: " .$db->connect_error );}

$logout_query = "DELETE FROM `user_activity` WHERE user_id = '$user_id'";
$result = $db->query($logout_query);
if($result === true)
{   
    session_destroy();
    setcookie('userlogin', '', time() - 31536000, '/');
    header("Location: index.php");
}else
{ 
    echo(" failed " .$logout_query. "<br>" .$db->error );
}

?>
