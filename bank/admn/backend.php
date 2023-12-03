<?php
// Function to perform a basic HTTP check
function performHTTPCheck($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $httpCode == 200;
}

// Function to perform a database check
function performDatabaseCheck($host, $username, $password, $database) {
    $mysqli = new mysqli($host, $username, $password, $database);
    $isConnected = !$mysqli->connect_errno;
    $mysqli->close();

    return $isConnected;
}

// Function to perform a security check
function performSecurityCheck($url) {
    $headers = get_headers($url, 1);
    
    // Check for HTTPS
    $isSecure = isset($headers['Location']) && strpos($headers['Location'], 'https://') === 0;

    // Check for security headers
    $securityHeaders = ['Strict-Transport-Security', 'X-Content-Type-Options', 'X-Frame-Options', 'Content-Security-Policy'];
    $missingSecurityHeaders = array_diff($securityHeaders, array_keys($headers));

    return ['isSecure' => $isSecure, 'missingSecurityHeaders' => $missingSecurityHeaders];
}

// Perform health checks
$adminlogin = performHTTPCheck('http://localhost:8081/bakerweb/WEB/bank/admn/adminlogin.php');
$superadmin = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/admn/superadmin.php");
$adminindex = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/admn/index.php");
$home = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/users/home.php");
$userlogin = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/users/index.php");
$agentlogin =performHTTPCheck( "http://localhost:8081/bakerweb/WEB/bank/users/agentlogin.php");
$option = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/users/option.php");
$agentreg = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/users/aggentregistration.php");
$userreg = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/users/registration.php");
$profile =performHTTPCheck( "http://localhost:8081/bakerweb/WEB/bank/users/profile.php");
$accact = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/users/accact.php");
$utilities = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/users/utilities.php");
$others = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/users/others.php");
$agentpage = performHTTPCheck("http://localhost:8081/bakerweb/WEB/bank/users/agentpage.php");
$httpCheckResult = performHTTPCheck('http://localhost:8081/bakerweb/WEB/bank/users/home.php');
$databaseCheckResult = performDatabaseCheck('localhost', 'root', '', 'bank');
$databaseCheckResult2 = performDatabaseCheck('localhost', 'root', '', 'THEBANK');
$securityCheckResult = performSecurityCheck('http://localhost:8081/bakerweb/WEB/bank/users/home.php');

// Calculate the overall health percentage
$totalChecks = 16;
$successfulChecks = ($httpCheckResult ? 1 : 0) + ($adminlogin ? 1 : 0) + ($agentlogin ? 1 : 0) +($agentreg ? 1 : 0) +
                    ($superadmin ? 1 : 0) + ($option ? 1 : 0) +($profile ? 1 : 0) +
                    ($adminindex ? 1 : 0) + ($accact ? 1 : 0) +($utilities ? 1 : 0) +
                    ($home ? 1 : 0) + ($others ? 1 : 0) +($agentpage ? 1 : 0) +
                    ($userlogin ? 1 : 0) + ($databaseCheckResult2 ? 1 : 0) + ($securityCheckResult['isSecure'] ? 1 : 0);

$healthPercentage = ($successfulChecks / $totalChecks) * 100;

echo round($healthPercentage, 2);
?>