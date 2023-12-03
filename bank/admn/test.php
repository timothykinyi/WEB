<?php
$db = new mysqli("localhost", "root", "","bank");
if ($db->connect_error)
{
    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
    header("Location: superadmin.php?error=$nres");
}
$query = "SELECT * FROM Customer_Support";
$result = $db->query($query);

$loan = "SELECT * FROM loan_appl";
$loanresult = $db->query($loan);

$creditcard = "SELECT * FROM creadit_appl";
$creditcardresult = $db->query($creditcard);

$admnusers = "SELECT * FROM admnusers";
$admnusersresult = $db->query($admnusers);

$users = "SELECT * FROM users";
$viewAccountDetailsresult = $db->query($users);
?>