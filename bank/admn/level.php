<?php
session_start();
$level = $_SESSION['role'];

if ($level === "Admin")
{
    
    header("Location: superadmin.php");
}
else 
{
    header("Location: adminpage.php");
}
?>