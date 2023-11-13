<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="home.css">
</head>
<body>
<header>
    <div class="head">
        <span class = "span1">
        <img class ="logo" src="img/b.png" alt="company logo" width="100px">
        </span>
        <nav class = "nav">
        <a href="index.php"><strong>Personal</strong></a>
        <a href="index.php"><strong>Business</strong></a>
        <a href="agentlogin.php"><strong>Agent</strong></a>
        </nav>
        <span class = "span">
        <button ><a href="registration.php">sign up</a></button>
        <button ><a href="index.php">sign in</a></button>
        </span>
    </div>
</header>
<section class="mid">
<div class = "info">
    <div class ="log">
    <img class = "imgs" src="tmg/26.jpeg" alt="Image 3">
    <p>Click the button below to register as an agent</p><br>
    <button id="sub1"><a href="aggentregistration.php">register</a></button>

    <p>If you have an account <button id="sub1"><a href="agentlogin.php">sign in</a></button></p>     
    </div>

    <div class ="log">
    <img class = "imgs" src="tmg/25.jpeg" alt="Image 3">
    <p>Click the button below to register for a bank account</p>
    <button id="sub1"><a href="registration.php">register</a></button>

    <p>If you have an account <button id="sub1"><a href="index.php">sign in</a></button></p>     
    </div>
    </div>
</section>
<?php include "footer.php"; ?> 
</body>
</html>