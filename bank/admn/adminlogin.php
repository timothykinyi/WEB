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
    <form class="log" action="adminlogin_process.php" method="POST">

        <img class ="logo" src="24.png" alt="company logo" height="100px">
        <label for ="user" >ADMIN</label>
        <label for ="username" >Email</label>
        <input name="email" type="text" placeholder="Enter your email" name="email" required> 
        <label for="password" >password</label>
        <input name="password" type="password" name="password" placeholder="Enter your password" required> 
        <br>
        <button for="submit" name ="login"id="sub"> log in</button>

    </form>

    
</section>
<?php include "footer.php"; ?> 
</body>
</html>

