<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="home.css">
<script>

        function checkPasswordStrength() {


            var password = document.getElementById("password").value;
            var cpassword = document.getElementById("cpassword").value;
    
            var strongPasswordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;


            if (strongPasswordPattern.test(password)) {
                
                if(validateEmail())
                {
                    return true;
                }else
                {
                    return false;
                }
            } else {
                  var notification = document.getElementById("notification");

                notification.innerHTML = "<p>Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.</p>";
                return false; 
        }
    }

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
    <form class="log" action="registration_process.php" method="post" onsubmit="return checkPasswordStrength();">

        <img class ="logo" src="tmg/24.png" alt="company logo" height="100px">
        <label for ="firstname" >first name</label>
        <input type="text"  placeholder="Enter your first name" name="first_name" required>
        <label for ="second_name" >second name</label>
        <input type="text" placeholder="Enter your second name" name="second_name" required> 
        <label for ="username" >username</label>
        <input type="text" placeholder="Enter your username" name="username" required> 
        <label for ="Email" >Email</label>
        <input type="Email" placeholder="Enter your Email"id ="email" name="Email" required > 
        <label for="password" >password</label>
        <input type="password" id="password" placeholder="Enter your password" name="password" required>
        <br>
        <button for="submit" id="sub" > submit</button>
        <p>If you have an account <button id="sub1"><a href="index.php">sign in</a></button></p>     
    
    <div id="notification"></div>
    <p id="resultMessage" style="color: red;"></p>
    </form>


</section>

<?php include "footer.php"; ?> 

</body>
</html>