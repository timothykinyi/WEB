<?php

$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error)
{
    die("Connection failed: " .$db->connect_error );
}

$users = "SELECT * FROM users ";
$viewAccountDetailsresult = $db->query($users);

$settings = "SELECT * FROM tSettings ";
$settingsresult = $db->query($settings);

?>