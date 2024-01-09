<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="show.css">
<script>


    function validateEmail() {
      // Get the entered email value
      const email = document.getElementById('email').value;

      // Regular expression to match a valid email address
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      // Check if the email matches the regular expression and ends with ".com"
      if (emailRegex.test(email) && email.endsWith(".com")) {
        document.getElementById('resultMessage').textContent = 'Valid email address';
        return true;
      } else {
        document.getElementById('resultMessage').textContent = 'Invalid email address';
        return false; 
      }
    }
    </script>
</head>

<body>

<section class="mid">
    <form class="log" action="agentreg_proces.php" method="post" onsubmit="return validateEmail();">

    <img class ="logo" src="tmg/24.png" alt="company logo" height="100px">
        <label for ="firstname" >First name</label>
        <input type="text"  placeholder="Enter your first name" name="first_name" required>
        <label for ="second_name" >Second name</label>
        <input type="text" placeholder="Enter your second name" name="second_name" required> 
        <label for ="Email" >Email</label>
        <input type="Email" placeholder="Enter your Email"id ="email" name="Email" required> 
        <label for="password" >Password</label>
        <input type="password" id="password" placeholder="Enter your password" name="password" required> 
        <br>
        <button for="submit" id="sub"> Register</button>
        <p>If you have an account <button id="sub1"><a href="agentlogin.php">sign in</a></button></p>     
    
    <div id="notification"></div>
    <p id="resultMessage" style="color: red;"></p>
    </form>


</section>

<?php include "footer.php"; ?> 

</body>
</html>