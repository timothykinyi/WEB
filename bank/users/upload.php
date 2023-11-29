<?php
session_start();

$database = $_SESSION['account_no'];
$db = new mysqli('localhost', 'root', '', $database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) {
    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageData = file_get_contents($_FILES['image']['tmp_name']);

    // Delete all records from the images table
    $query1 = "DELETE FROM `images` WHERE 1";
    $stmt1 = $db->prepare($query1);
    if (!$stmt1) {
        die("Delete query failed: " . $db->error);
    }
    $stmt1->execute();
    $stmt1->close();

    // Insert image data into the database
    $query = "INSERT INTO images (image_name, image_type, image_data) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    if (!$stmt) {
        die("Insert query failed: " . $db->error);
    }
    $stmt->bind_param('sss', $imageName, $imageType, $imageData);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the homepage or another page
    header("Location: profile.php");
    exit();
}
?>
