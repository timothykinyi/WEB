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
    <h2>Change Password</h2>
    <form class="log" id="password-change-form" action = "passrecovery.php" method = "post" onsubmit="return checkPasswordStrength();">
        <label for="new-password">New Password:</label>
        <input type="password" id="new-password" name="new-password" required><br><br>
        <input type="submit"  name = "userpassword"value="Change Password">
    </form>
    <form id="notification" class =  'not'></form>
</section>
<script>
    function checkPasswordStrength() {
    var password = document.getElementById("new-password").value;
    var strongPasswordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (strongPasswordPattern.test(password)) {
            return true;
    } else {
        var notification = document.getElementById("notification");
        notification.innerHTML = "<p style='color: red;'>Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.</p>";
        return false; 
    }
}
</script>
<?php include "footer.php"; ?> 
</body>
</html>