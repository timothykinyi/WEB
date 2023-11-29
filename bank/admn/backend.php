<?php
function checkHttpStatus($url) {
    $headers = get_headers($url);
    $statusCode = intval(substr($headers[0], 9, 3));
    return $statusCode;
}


$adminlogin = "http://localhost:8081/bakerweb/WEB/bank/admn/adminlogin.php";
$superadmin = "http://localhost:8081/bakerweb/WEB/bank/admn/superadmin.php";
$adminindex = "http://localhost:8081/bakerweb/WEB/bank/admn/index.php";
$home = "http://localhost:8081/bakerweb/WEB/bank/users/home.php";
$userlogin = "http://localhost:8081/bakerweb/WEB/bank/users/index.php";
$agentlogin = "http://localhost:8081/bakerweb/WEB/bank/users/agentlogin.php";
$option = "http://localhost:8081/bakerweb/WEB/bank/users/option.php";
$agentreg = "http://localhost:8081/bakerweb/WEB/bank/users/aggentregistration.php";
$userreg = "http://localhost:8081/bakerweb/WEB/bank/users/registration.php";
$profile = "http://localhost:8081/bakerweb/WEB/bank/users/profile.php";
$accact = "http://localhost:8081/bakerweb/WEB/bank/users/accact.php";
$utilities = "http://localhost:8081/bakerweb/WEB/bank/users/utilities.php";
$others = "http://localhost:8081/bakerweb/WEB/bank/users/others.php";
$agentpage = "http://localhost:8081/bakerweb/WEB/bank/users/agentpage.php";

$active = 1;

$status1 = checkHttpStatus($adminlogin);
if ($status1 === 200) {
    $active ++;
} else {
    
}
$status2 = checkHttpStatus($superadmin);
if ($status2 === 200) {
    $active ++;
} else {
    
}
$status3 = checkHttpStatus($adminindex);
if ($status3 === 200) {
    $active ++;
} else {
    
}
$status4 = checkHttpStatus($home);
if ($status4 === 200) {
    $active ++;
} else {
    
}
$status5 = checkHttpStatus($userlogin);
if ($status5 === 200) {
    $active ++;
} else {
    
}
$status6 = checkHttpStatus($agentlogin);
if ($status6 === 200) {
    $active ++;
} else {
    
}
$status7 = checkHttpStatus($option);
if ($status7 === 200) {
    $active ++;
} else {
    
}
$status8 = checkHttpStatus($agentreg);
if ($status8 === 200) {
    $active ++;
} else {
    
}
$status9 = checkHttpStatus($userreg);
if ($status9 === 200) {
    $active ++;
} else {
    
}
$statu10s = checkHttpStatus($profile);
if ($status10 === 200) {
    $active ++;
} else {
    
}
$status11 = checkHttpStatus($accact);
if ($status11 === 200) {
    $active ++;
} else {
    
}
$status12 = checkHttpStatus($utilities);
if ($status12 === 200) {
    $active ++;
} else {
    
}
$status13 = checkHttpStatus($others);
if ($status13 === 200) {
    $active ++;
} else {
    
}
$status14 = checkHttpStatus($agentpage);
if ($status14 === 200) {
    $active ++;
} else {
    
}



$systemhealth = (100/15) * $active;
echo $systemhealth;
echo "<br>" .$active;
?>