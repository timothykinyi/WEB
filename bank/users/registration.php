<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="show.css">
<script>

        function checkPasswordStrength() {


            var password = document.getElementById("password").value;
            var cpassword = document.getElementById("cpassword").value;
    
            var strongPasswordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;


            if (strongPasswordPattern.test(password)) {
              return 1;

            } else {
                  var notification = document.getElementById("notification");

                notification.innerHTML = "<p>Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.</p>";
                return 2; 
        }
    }

    function validateEmail() {
      const email = document.getElementById('email').value;
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (emailRegex.test(email) && email.endsWith(".com")) {

                  document.getElementById('resultMessage').textContent = 'Valid email address';
                    return 1;

      } else {
        document.getElementById('resultMessage').textContent = 'Invalid email address';
        return 2; 
      }
    }


    </script>
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
    <form class="log" action="registration_process.php" method="post" onsubmit="return validateEmail();">

        <img class ="logo" src="tmg/24.png" alt="company logo" height="100px">
        <label for ="firstname" >First name</label>
        <input type="text"  placeholder="Enter your first name" name="first_name" required>
        <label for ="second_name" >Second name</label>
        <input type="text" placeholder="Enter your second name" name="second_name" required> 
        <label for ="username" >Username</label>
        <input type="text" placeholder="Enter your username" name="username" required> 
        <label for ="Email" >Email</label>
        <input type="Email" placeholder="Enter your Email"id ="email" name="Email" required > 
        <label for="password" >Password</label>
        <input type="password" id="password" placeholder="Enter your password" name="password" required>
        <br>
        <button for="submit" id="sub" > Register</button>
        <p>If you have an account <button id="sub1"><a href="index.php">sign in</a></button></p>     
    
    <div id="notification"></div>
    <p id="resultMessage" style="color: red;"></p>
    </form>


</section>

<?php include "footer.php"; ?> 

</body>
</html>