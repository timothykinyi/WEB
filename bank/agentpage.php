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
<?php
require "functions.php";
?> 
</head>
<body>
<header>
    <div class="head">
        <span class = "span1">
        <img class ="logo" src="img/b.png" alt="company logo" width="100px">
        </span>

        <span class = "span">
        <button id="settings" class= "aa">&#128276;</button>
        <button id="settings" class= "aa">&#9881;</button>
        <button class= "ab"><a href="logout.php">Log out</a></button>
        </span>
    </div>
</header>

<main class="mi">
    <div class ="div1">
    <div class="slideshow-container">
        <div class="mySlides">
            <img class = "img" src="tmg/6.png" alt="Image 1">
        </div>
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

    </div>

    <div class="div2">
        <section class="account-details-section">
            <h2>Account Details</h2>
            <img height='100px' src=img/defprofile.jpeg>
            <p>Agent no: <span id="username"><?php session_start();  echo $_SESSION['agent_no']; ?></span></p>
            <p>Account Number: <span id="account-number"><?php   echo $_SESSION['account_no']; ?></span></p>
            <p>Account balance: <span id="balance"><?php  echo $_SESSION['balance']; ?></span></p>
            <p>Account Status: <span id="account-status">Active</span></p>
        </section>


        <section class="notifications-section">
            <h2>Notifications</h2>
            <p>Stay informed with important updates and alerts from My Banking:</p>
            <ul class="notifications-list">
                <?php
                include "notificationdisp.php";
                if ($nresult->num_rows > 0)
                {
                while ($row = $nresult->fetch_assoc()) {
                    echo '    
                    <li>
                    <p><strong>Notification:</strong>' . $row['messages'] .'</p>
                    <span class="notification-time">'. $row['date'] .'</span>
                    </li>
                    ';
                    }
                }
                ?>
            </ul>
            <form action="agentnotification.php" method="post">
            <button type="submit" name="submitButton">Mark as read</button>
            </form>
        </section>
    </div>
 </main>
</main>

    <div class = "divee">
        <div>
            <h3>BANKING HOURS</h3>
            <lu>
                <li>Mon-Fri 8am to 4.30pm
                <li>Saturdays 8am to 12pm
                <li>Closed on Sundays
                <li>Closed on Public holidays
            </lu>
        </div>
        <div>
            <h3>ABOUT US</h3>
            <lu>
                <li><a href = "others.php">About Us</a>
                <li><a href = "others.php">Contact Us</a>
                <li><a href = "others.php">Meet the Team</a>
            </lu>
        </div>
        <div>
            <h3>FOR YOU</h3>
            <lu>
                <li><a href = "registration.php">pen an Account</a>
                <li><a href = "index.php">Get a Loan</a>
                <li><a href = "index.php">Get a Card</a>
                <l1><a href = "others.php">FAQS</a>
            </lu>
        </div>
        <div>
            <h3>SOCIAL MEDIA</h3>
            <ul>
                <l1><a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D"><img width = "30" src = "tmg/t.png"></a>
                <l1><a href="https://web.facebook.com/login.php/?_rdc=1&_rdr"><img width = "30" src = "tmg/f.png"></a>
                <l1><a href="https://www.instagram.com/"><img width = "30" src = "tmg/i.png"></a>
                <l1><a href="https://www.youtube.com/"><img width = "30" src = "tmg/y.png"></a>
            </ul>
        </div>
    </div>
<script src="accact.js"></script>
<script src ="home.js"></script>
<?php include "footer.php"; ?> 
</body>
</html>