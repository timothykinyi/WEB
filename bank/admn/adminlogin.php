<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="show.css">
</head>
<body>
<?php
    if (isset($_GET["error"])) {
        $result = $_GET["error"];
        echo "<form><p class =  'note' > <button onclick ='out();'>x</button><br> <br> $result <br><br></p></form>";
    }
    function out()
    {
        $result="";
        header("Location: error.php?error=$result");
    }
?>
<section class="mid">
    <form class="log" action="adminlogin_process.php" method="POST">

        <img class ="logo" src="24.png" alt="company logo" height="100px">
        <label for ="user" >ADMIN</label>
        <label for ="username" >Email</label>
        <input name="email" type="text" placeholder="Enter your email" name="email" required> 
        <label for="password" >password</label>
        <input name="password" type="password" name="password" placeholder="Enter your password" required> 
        <br>
        <button for="submit" name ="login"id="sub"> log in</button>
        <a href="adminrecovery.php">Forgot my password </a>
    </form>

    
</section>
<?php include "footer.php"; ?> 
</body>
</html>

