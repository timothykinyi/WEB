<?php
// Fetch table data from the database

$conn =  new mysqli("localhost", "root", "","bank");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT account_no, username, email FROM users";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
