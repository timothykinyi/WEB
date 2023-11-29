    <span>
    <?php
    include "profpic.php";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageId = $row['id'];
            $imageName = $row['image_name'];

            echo '<div>';
            echo '<img src="display.php?image_id=' . $imageId . '" alt="' . $imageName . '" height="100px">';
            echo '<p>' . $imageName . '</p>';
            echo '</div>';
        }
    } else {
        echo "<img height='100px' src=img/defprofile.jpeg>";
    }?>
    </span>