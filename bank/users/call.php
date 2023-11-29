<?php
session_start();
$type = $_POST["service-type"];
$location = $_POST['location'];

$_SESSION['type'] = $type;
$_SESSION['location'] = $location;


require "locator.php";
header("Location: utilities.php");
?>