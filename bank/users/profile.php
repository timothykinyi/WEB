<?php
    if (isset($_COOKIE['userlogin'])) {
        $login = $_COOKIE['userlogin'];
        if (isset($_COOKIE['account_no'])) {
            $account_no = $_COOKIE['account_no'];
            if ($login === $account_no) {
                setcookie("account_no", $account_no, time() + 31536000, "/");
                setcookie("userlogin", "$login", time() + 31536000, "/");
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
?>
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
<link rel="stylesheet" href="profile.css">
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
        <nav class = "nav">
        <a href="home.php"><strong>Home</strong></a>
        <a href="profile.php"><strong>Transactions</strong></a>
        <a href="accact.php"><strong>Accounts</strong></a>
        <a href="utilities.php"><strong>Services</strong></a>
        <a href="others.php"><strong>Contact</strong></a>
        </nav>
        <span class = "span">
        
        
        <button id="notifications_b" class= "aa">&#128276;</button>
        
        <span id="notificationCounter"><?php echo getNotificationCount(); ?></span>
        <script>updateNotificationCount(<?php  echo getNotificationCount(); ?>);
            function updateNotificationCount(count) 
                {
                const counterElement = document.getElementById("notificationCounter");
                counterElement.textContent = count;
                counterElement.style.display = count > 0 ? 'block' : 'none';
                }
        </script>
        <?php
        function getNotificationCount() 
        {
            $counter=0;
            include "notificationdisp.php";
            if ($nresult->num_rows > 0)
            { while ($row = $nresult->fetch_assoc()) {$counter ++;  }}
            return $counter;
        }
        ?>
        <button id="settings" class= "aa">&#9881;</button>
        <button class= "ab"><a href="logout.php">Log out</a></button>
        </span>
    </div>
</header>

<main class="mi">
<div class ="div1">
<div class = "buttons">
    <li><button id="Send_money_b">Send money</button>
    <li><button id="bill-payments_b">Bill payments</button>
    <li> <button id="Save_new_b">Save new payee</button> 
    <li><button id="customer_support_b">Customer Support</button> 
</div>
<div>
<div id ="Send_money">
<section class="bill-payments-section">
    <h2>Send money</h2>
    <form id="bill-payments-form" method = "POST" action="profile_process.php">

        <label for="account-number">Account Number to send money to:</label>
        <input type="text" id="account-number" name="account-number" required><br><br>
        <label for="amount">Amount:</label>
        <input type="number" step="1" id="amount" name="amount" required><br><br>
        <?php session_start(); $_SESSION['transaction'] = 'sending'; ?>
        <input type="submit" value="Send Money">
        

    </form>
</section>
</div>



<div id ="bill-payments">
<section class="bill-payments-section">
    <h2>Bill Payments</h2>
    <form id="bill-payments-form" method = "POST" action = "bill _payer.php">
        <label for="payee">Select Payee:</label>
        <select id="payee" name="paye">
        <?php
        include "dataretreval.php";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['acc_no'] . '">' . $row['payee'] . '</option>';
        }
        ?>
        </select><br> <br>
        <label for="amount">Amount:</label>
        <input type="number" step="0.01" id="amount" name="amount" required><br><br>
        <label for="account-number">Your Account Number for the service if applicable:</label>
        <input type="text" id="account-number" name="account-number" ><br><br>
        <input type="submit" value="Pay Bill">
    </form><br>

    <form id="bill-payments-form" method = "POST" action = "bill _payer.php">
        <label for="account-number">Account Number:</label>
        <input type="text" id="paye" name="paye" required><br><br>
        <label for="amount">Amount:</label>
        <input type="number" step="0.01" id="amount" name="amount" required><br><br>
        <label for="account-number">Your Account Number for the service if applicable:</label>
        <input type="text" id="account-number" name="account-number" ><br><br>
        <?php session_start(); $_SESSION['transaction'] = 'not_saved'; ?>
        <input type="submit" value="Pay Bill">
    </form>
</section>
</div>


<div id ="Save_new">
<section class="bill-payments-section">
    <h2>Save new payee</h2>
    <form id="bill-payments-form" action ="payee_adder.php" method="POST">
        
        <label for="amount">Payee's Name:</label>
        <input type="text" id="Payee's_Name" name="payee" required><br><br>
        <label for="Payee's account-number">Payee's Account Number:</label>
        <input type="text" id="Payee's_account-number" name="acc_no" required>
        <label for="account-number">Your Account Number for the service if applicable:</label>
        <input type="text" id="your_account-number" name="yacc_no"><br><br>
        <input type="submit" value="Save" name = "payee_adder">
    </form><br>

    <h2>Delete payee</h2>
    <form id="bill-payments-form" action ="payee_adder.php" method="POST">
        <label for="payee">Select Payee to delete:</label>
        <select id="payee" name="payee">
        <?php
        include "dataretreval.php";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['acc_no'] . '">' . $row['payee'] . '</option>';
        }
        ?>
        </select><br> <br>
        <input type="submit"  name = "payee_Deleter" value="Delete">
    </form>
</section>
</div>


<div id ="customer-support">
<section class="customer-support-section">
    <h2>Customer Support</h2>
    <p>If you have any questions or need assistance, please feel free to contact our customer support team. We are here to help!</p>
    <div class="contact-info">
        <h3>Contact Information:</h3>
        <p><strong>Phone:</strong> 0742243421</p>
        <p><strong>Email:</strong> <a href="mailto:bazebank0@gmail.com">bazebank0@gmail.com</a></p>
    </div>
    <div class="contact-form">
        <h3>Contact Form:</h3>
        <form id="contact-form"action ="payee_adder.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" placeholder ="use the email you reistred with" required><br><br>
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>
            <input type="submit" value="Submit Message" name ="contact">
        </form>
    </div>
</section>

</div>
<div class = "info">

<div class = "show">
<h1>Send Money:</h1>
<img class = "imgs" src="tmg/send.jpeg" alt="Image 3">
<p>
<strong>Swift & Secure Transfers:</strong><br>Send money globally with confidence, benefitting from secure and fast transactions.
<br><br><strong>Easy Access, Low Fees:</strong><br> 
Enjoy hassle-free transfers 24/7, with low fees for maximum value in every transaction.
</p>
</div>
<div class = "show">
<h1>Pay Bills</h1>
<img class = "imgs" src="tmg/pay.jpeg" alt="Image 3">
<p>
<strong>Effortless Bill Payments:</strong><br>
Simplify your life by easily paying bills online with our secure and user-friendly platform.
<br><br><strong>Timely Payments, No Hassle:</strong><br>
Ensure your bills are paid on time without the stress, thanks to our convenient and efficient payment system.
</p>
</div>
<div class = "show">
<h1>Customer Support:</h1>
<img class = "imgs" src="tmg/cs.jpeg" alt="Image 3">
<p>
<strong>Dedicated Customer Support:</strong><br>
Experience reliable assistance from our dedicated support team, ready to help you with any inquiries or concerns.
<br><br><strong>Swift Assistance, Anytime:</strong><br>
Enjoy prompt and accessible customer support services 24/7, ensuring a seamless banking experience.
</p>
</div>
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
        <input type="submit"  name = "userpassword"value="Change Password">
    </form>
    <div id="notification"></div>
</section>
</div>

<div id ="notifications">
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
    <form action="notification.php" method="post">
    <button type="submit" name="submitButton">Mark as read</button>
    </form>
</section>
 </div>


<section class="account-details-section">
    
    <img class ="logo" src="tmg/24.png" alt="company logo" height="100px">
    <h2>Account Details</h2>
    <p>Account Username: <span id="username"><?php session_start();  echo $_SESSION['username']; ?></span></p>
    <p>Account Number: <span id="account-number"><?php   echo $_SESSION['account_no']; ?></span></p>
    <p>Account balance: <span id="balance"><?php  echo $_SESSION['balance']; ?></span></p>
    <p>Account Status: <span id="account-status"><?php  echo $_SESSION['status']; ?></span></p>
</section>


<div  class = "moti">
    <p>Log out</p>
    <button class = "ab" ><a href="logout.php">Log out</a></button>
</div>

</div>
</main>

<?php include "bottom.php"; ?> 
<script>
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
</script>
<script src="script.js"></script>
<script src ="home.js"></script>
<?php include "footer.php"; ?> 
</body>
</html>





