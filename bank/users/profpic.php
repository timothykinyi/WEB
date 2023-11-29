    <?php
    session_start();

    $database = $_SESSION['account_no'];
    $db = new mysqli('localhost', 'root', '', $database);
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $query = "SELECT id, image_name FROM images";
    $result = $db->query($query);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageId = $row['id'];
            $imageName = $row['image_name'];

            echo '<div>';
            echo '<img src="display.php?image_id=' . $imageId . '" alt="' . $imageName . '" height="100px">';
            echo '</div>';
        }
    } else {
        echo "<img height='100px' src=img/defprofile.jpeg>";
    }
    ?>


   <!--- <?php/*
    require "profpic.php";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageId = $row['id'];
            $imageName = $row['image_name'];

            echo '<div>';
            echo '<img src="display.php?image_id=' . $imageId . '" alt="' . $imageName . '" height="100px">';
            echo '</div>';
        }
    } else {
        echo "<img height='100px' src=img/defprofile.jpeg>";
    }*/?>-->