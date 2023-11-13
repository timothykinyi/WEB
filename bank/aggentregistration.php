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
                return true;
            } else {
                  var notification = document.getElementById("notification");

                notification.innerHTML = "<p>Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.</p>";
                return false; 
        }
    }
    </script>
</head>

<body>
<section class="mid">
    <form class="log" action="agentreg_proces.php" method="post" onsubmit="return checkPasswordStrength();">

    <img class ="logo" src="tmg/24.png" alt="company logo" height="100px">
        <label for ="firstname" >first name</label>
        <input type="text"  placeholder="Enter your first name" name="first_name" required>
        <label for ="second_name" >second name</label>
        <input type="text" placeholder="Enter your second name" name="second_name" required> 
        <label for ="Email" >Email</label>
        <input type="Email" placeholder="Enter your Email"name="Email" required > 
        <label for="password" >password</label>
        <input type="password" id="password" placeholder="Enter your password" name="password" required> 
        <label for ="cpassword" >Confirm the password</label>
        <input type="password" id="cpassword" placeholder="Confirm password" name="cpassword" required> 
        
        <br>
        <button for="submit" id="sub"> submit</button>
        <p>If you have an account <button id="sub1"><a href="agentlogin.php">sign in</a></button></p>     
    
    <div id="notification"></div>
    </form>


</section>

<?php include "footer.php"; ?> 

</body>
</html>