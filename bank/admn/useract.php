<?php

$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error)
{
    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
    header("Location: superadmin.php?error=$nres");
}

$agent = "SELECT * FROM agents ";
$viewagentDetailsresult = $db->query($agent);

$users = "SELECT * FROM users ";
$viewAccountDetailsresult = $db->query($users);



$settings = "SELECT * FROM tSettings ";
$settingsresult = $db->query($settings);

?>