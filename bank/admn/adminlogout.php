<?php
session_start();
if (isset($_COOKIE['adm_no'])) {
    // Access the data from the cookie
    $user_id =  $_COOKIE['adm_no'];

} else {
    echo "Cookie not set.";
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
    header("Location: adminlogin.php");
}else
{ 
    echo(" failed " .$logout_query. "<br>" .$db->error );
}


function setCookieWithArray($name, $values, $expiryDays) {
    $serializedValues = serialize($values);
    $expiryTime = time() + ($expiryDays * 24 * 60 * 60); 
    setcookie($name, $serializedValues, $expiryTime, '/');
}

?>
