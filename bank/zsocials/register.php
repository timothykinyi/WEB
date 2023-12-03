<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "socials";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST["full_name"];
$dob = $_POST["dob"];
$address = $_POST["address"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

$check_username_sql = "SELECT id FROM users WHERE username = '$username'";
$result = $conn->query($check_username_sql);

if ($result->num_rows > 0) {
    $error_message = "Error: Username already exists. Please choose a different username.";
    header("Location: index.html?error_message=" . urlencode($error_message));
    $conn->close();
    exit();
}

$insert_sql = "INSERT INTO users (full_name, dob, address, email, phone, username, password)
               VALUES ('$full_name', '$dob', '$address', '$email', '$phone', '$username', '$password')";

if ($conn->query($insert_sql) === TRUE) {
    echo "Registration successful!";
} else {
    $error_message = "Error: " . $insert_sql . "<br>" . $conn->error;
    header("Location: index.html?error_message=" . urlencode($error_message));
}

$conn->close();
?>
