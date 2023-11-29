<?php
$currentYear = date("Y");
$conn = new mysqli("localhost", "root", "","bank");
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}

$sqljan = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 1 AND YEAR(registration_date) = '$currentYear'";
$sqlfeb = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 2 AND YEAR(registration_date) = '$currentYear'";
$sqlmar = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 3 AND YEAR(registration_date) = '$currentYear'";
$sqlapr = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 4 AND YEAR(registration_date) = '$currentYear'";
$sqlmay = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 5 AND YEAR(registration_date) = '$currentYear'";
$sqljun = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 6 AND YEAR(registration_date) = '$currentYear'";
$sqljul = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 7 AND YEAR(registration_date) = '$currentYear'";
$sqlaug = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 8 AND YEAR(registration_date) = '$currentYear'";
$sqlsep = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 9 AND YEAR(registration_date) = '$currentYear'";
$sqloct = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 10 AND YEAR(registration_date) = '$currentYear'";
$sqlnov = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 11 AND YEAR(registration_date) = '$currentYear'";
$sqldec = "SELECT COUNT(*) AS user_count FROM users WHERE MONTH(registration_date) = 12 AND YEAR(registration_date) = '$currentYear'";

$resultjan = mysqli_query($conn, $sqljan);
$resultfeb = mysqli_query($conn, $sqlfeb);
$resultmar = mysqli_query($conn, $sqlmar);
$resultapl = mysqli_query($conn, $sqlapr);
$resultmay = mysqli_query($conn, $sqlmay);
$resultjun = mysqli_query($conn, $sqljun);
$resultjul = mysqli_query($conn, $sqljul);
$resultaug = mysqli_query($conn, $sqlaug);
$resultsep = mysqli_query($conn, $sqlsep);
$resultoct = mysqli_query($conn, $sqloct);
$resultnov = mysqli_query($conn, $sqlnov);
$resultdec = mysqli_query($conn, $sqldec);

if ($resultjan) {
    $row = mysqli_fetch_assoc($resultjan);
    $userCount = $row['user_count'];
    $label = "JAN";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount' WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultfeb) {
    $row = mysqli_fetch_assoc($resultfeb);
    $userCount = $row['user_count'];
    $label = "FEB";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount'  WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultmar) {
    $row = mysqli_fetch_assoc($resultmar);
    $userCount = $row['user_count'];
    $label = "MAR";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount' WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultapl) {
    $row = mysqli_fetch_assoc($resultapl);
    $userCount = $row['user_count'];
    $label = "APL";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount'  WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultmay) {
    $row = mysqli_fetch_assoc($resultmay);
    $userCount = $row['user_count'];
    $label = "MAY";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount' WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultjun) {
    $row = mysqli_fetch_assoc($resultjun);
    $userCount = $row['user_count'];
    $label = "JUN";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount'  WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultjul) {
    $row = mysqli_fetch_assoc($resultjul);
    $userCount = $row['user_count'];
    $label = "JUL";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount' WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultaug) {
    $row = mysqli_fetch_assoc($resultaug);
    $userCount = $row['user_count'];
    $label = "AUG";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount'  WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultsep) {
    $row = mysqli_fetch_assoc($resultsep);
    $userCount = $row['user_count'];
    $label = "SEP";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount' WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultoct) {
    $row = mysqli_fetch_assoc($resultoct);
    $userCount = $row['user_count'];
    $label = "OCT";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount'  WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultnov) {
    $row = mysqli_fetch_assoc($resultnov);
    $userCount = $row['user_count'];
    $label = "NOV";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount' WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

if ($resultdec) {
    $row = mysqli_fetch_assoc($resultdec);
    $userCount = $row['user_count'];
    $label = "DEC";
    $sql = "UPDATE `account_creation_data` SET `value`='$userCount'  WHERE `label`= '$label'";
    $result = $conn->query($sql);
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>