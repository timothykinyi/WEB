<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-hJRmIKjzVcSDXXSxj6yAxU5l/9bKJkgXgDqs7cv0Sf8gJgP6kn4tgDReeI2U+Em" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap">
<link rel="stylesheet" href="agent.css">
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
<header>
    <div class="head">
        <span class = "span1">
        <img class ="logo" src="img/b.png" alt="company logo" width="100px">
        </span>

        <span class = "span">
        <button id="notifications_b" class= "aa">&#128276;</button>
        <span id="notificationCounter"></span>
        <button id="settings" class= "aa">&#9881;</button>
        <button class= "ab"><a href="agentlogout.php">Log out</a></button>
        </span>
    </div>
</header>

<main class="mi">
    <div class ="div1">

    
        <section class="bill-payments-section">
            <h2>Deposit</h2>
            <form id="bill-payments-form" method = "POST" action="agentdepo.php">

                <label for="account-number">Account Number to deposit money to:</label>
                <input type="text" id="account-number" name="number" required><br><br>
                <label for="amount">Amount:</label>
                <input type="number" step="1" id="amount" name="amount" required><br><br>
                <input type="submit" value="Deposit">

            </form>
        </section>
        <div class="slideshow-container">
            <div class="mySlides">
                <img class = "img" src="tmg/15.webp" alt="Image 2">
            </div>
            <div class="mySlides">
                <img class = "img" src="tmg/14.jpeg" alt="Image 3">
            </div>
            <div class="mySlides">
                <img class = "img" src="tmg/16.jpg" alt="Image 3">
            </div>
            <div class="mySlides">
                <img class = "img" src="tmg/17.jpg" alt="Image 3">
            </div>
            <div class="mySlides">
                <img class = "img" src="tmg/18.jpg" alt="Image 3">
            </div>
        </div>
    </div>

    <div class="div2">

        <div id ="popup-menu" >
            <section class="notifications-section">
                <h2>Change Password</h2>
                <form id="password-change-form" action = "userpas.php" method = "post" onsubmit="return checkPasswordStrength();">
                    <label for="current-password">Current Password:</label>
                    <input type="password" id="current-password" name="current-password" required><br><br>
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new-password" required><br><br>
                    <input type="submit"  name = "agentpassword"value="Change Password">
                </form>
                <div id="notification"></div>
            </section>
        </div>

        <div id ="notifications">
            <section class="notifications-section">
                <h2>Notifications</h2>
                <p>Stay informed with important updates and alerts from My Banking:</p>
                <ul class="notifications-list">
                </ul>
                <form action="agentnotification.php" method="post">
                <button type="submit" name="submitButton">Mark as read</button>
                </form>
            </section>
        </div>

            <section class="account-details-section">
            <img class ="logo" src="tmg/24.png" alt="company logo" height="100px">
                <h2>Account Details</h2>
                <p>Agent no: <span id="username"><?php session_start();  echo $_SESSION['agent_n']; ?></span></p>
                <p>Account Number: <span id="account-number"><?php   echo $_SESSION['agaccount_no']; ?></span></p>
                <p>Account balance: <span id="balance"><?php  echo $_SESSION['agbalance']; ?></span></p>
                <p>Account Status: <span id="account-status"><?php  echo $_SESSION['agstatus']; ?></span></p>
            </section>

    </div>

 </main>

<?php include "bottom.php"; ?> 
<script src="script.js"></script>
<script src ="home.js"></script>
<script>
    document.getElementById("settings").addEventListener("click", function() {
    if (popupMenu.style.display === "block") {
        popupMenu.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        popupMenu.style.display = "block";
        localStorage.setItem('lastAccessedSection', "popup-menu");
    }
    
});

    function checkPasswordStrength() {
    var password = document.getElementById("new-password").value;
    var strongPasswordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (strongPasswordPattern.test(password)) {
            return true;
    } else {
        var notification = document.getElementById("notification");
        notification.innerHTML = "<p>Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.</p>";
        return false; 
    }
}

var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    var count = 0;
    if (this.readyState == 4 && this.status == 200) {
        var notifications = JSON.parse(this.responseText);
        var notificationList = document.getElementById('notifications-list');
        notifications.forEach(function(notification) {
            var li = document.createElement('li');
            li.innerHTML = '<p><strong>Notification:</strong>' + notification.messages + '</p>' +
                           '<span class="notification-time">' + notification.date + '</span>';

            count++;
            notificationList.appendChild(li);
        });
    }
    document.getElementById('notificationCounter').textContent = count;
    updateNotificationCount(count);
};

xhr.open('GET', 'agentnotificationdisp.php', true);
xhr.send();



function updateNotificationCount(counts) 
    {
    const counterElement = document.getElementById("notificationCounter");
    counterElement.textContent = counts;
    counterElement.style.display = counts > 0 ? 'block' : 'none';
    }

</script>
<script src = "agen.js"></script>
<?php include "footer.php"; ?> 
</body>
</html>