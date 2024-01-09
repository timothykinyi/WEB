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
        echo "<form><p class =  'note' > <button onclick ='out();'>x</button>$result</p></form>";
    }
    function out()
    {
        $result="";
        header("Location: error.php?error=$result");
    }
?>
<section class="mid">
    <form class="log" action="agentlogin_process.php" method="POST">

        <img class ="logo" src="tmg/24.png" alt="company logo" height="100px">
        <label for ="user" >AGENT</label>
        <label for ="username" >Email</label>
        <input name="email" type="text" placeholder="Enter your email" name="email" required> 
        <label for="password" >Password</label>
        <input name="password" type="password" name="password" placeholder="Enter your password" required> 
        <br>
        <button for="submit" id="sub"> log in</button>
        <br>
        <a href="agentrecovery.php">recover password</a>
        <p>If you don't have an account <button id="sub1"><a href="option.php">register</a></button></p>
    </form>

    
</section>
<?php include "footer.php"; ?> 
</body>
</html>

