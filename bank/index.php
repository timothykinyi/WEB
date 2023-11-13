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

    <form class="log" action="login_process.php" method="post">

        <img class ="logo" src="tmg/24.png" alt="company logo" height="100px">
        <label for ="username" >USER / BUSINESS</label>
        <label for ="username" >username</label>
        <input name="email/username" type="text" placeholder="Enter your username" name="email" required> 
        <label for="password" >password</label>
        <input name="password" type="password" name="password" placeholder="Enter your password" required> 
        <br>
        <a href ="kkkk" >Forgot your password?</a>
        <br>
        <input type="submit" id="sub" name="loginSubmit" value="Login">
        
       
        <p>If you don't have an account <button id="sub1"><a href="option.php">register</a></button></p>
    </form>

    
</section>
<?php include "footer.php"; ?> 
</body>
</html>