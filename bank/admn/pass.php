<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="home.css">
</head>
<body>
<section class="mid">

    <div style="min-width:580px; font-size: large;" class="log">
        <img class ="logo" src="tmg/pass.png" alt="company logo" height="100px">
        <br>
        <?php
            if (isset($_GET["error"])) {
                $result = $_GET["error"];
                echo "<p>$result</p>";

            }else
            {
                echo "<p>Failed try again </p>";

            }
        ?>

        </div>
   
</section>
<?php include "footer.php"; ?> 
</body>
</html>