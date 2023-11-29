<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="profile.css">

</head>
<body>
<?php include "header.php"; ?> 
<section class="mi">
<div class ="div1">

<button id="Send_money_b">Send money</button>  <br>

<div id ="Send_money">
<section class="bill-payments-section">
    <h2>Send money</h2>
    <form id="bill-payments-form" method = "POST" action="profile_process.php">

        <label for="account-number">Account Number to send money to:</label>
        <input type="text" id="account-number" name="account-number" required><br><br>
        <label for="amount">Amount:</label>
        <input type="number" step="1" id="amount" name="amount" required><br><br>
        <label for="account-number">Password:</label>
        <input type="Password" id="Password" name="Password" required><br><br>
        <?php session_start(); $_SESSION['transaction'] = 'sending'; ?>
        <input type="submit" value="Send Money">
        

    </form>
</section>
</div>

<button id="bill-payments_b">bill payments</button>  <br>

<div id ="bill-payments">
<section class="bill-payments-section">
    <h2>Bill Payments</h2>
    <form id="bill-payments-form" method = "POST" action = "bill _payer.php">
        <label for="payee">Select Payee:</label>
        <select id="payee" name="payee">
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

<button id="Save_new_b">Save new payee</button> <br>

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
        <input type="submit" value="Save">
    </form><br>

    <h2>Delete payee</h2>
    <form id="bill-payments-form" action ="payee_Deleter.php" method="POST">
        <label for="payee">Select Payee to delete:</label>
        <select id="payee" name="payee">
        <?php
        include "dataretreval.php";
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['acc_no'] . '">' . $row['payee'] . '</option>';
        }
        ?>
        </select><br> <br>
        <input type="submit" value="Delete">
    </form>
</section>
</div>

<button id="customer_support_b">Customer Support</button> <br>
<div id ="customer-support">
<section class="customer-support-section">
    <h2>Customer Support</h2>
    <p>If you have any questions or need assistance, please feel free to contact our customer support team. We are here to help!</p>
    <div class="contact-info">
        <h3>Contact Information:</h3>
        <p><strong>Phone:</strong> 0710000000</p>
        <p><strong>Email:</strong> <a href="mailto:support@bazebank.com">support@bazebank.com</a></p>
    </div>
    <div class="contact-form">
        <h3>Contact Form:</h3>
        <form id="contact-form">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>
            <input type="submit" value="Submit Message">
        </form>
    </div>
</section>

</div>

</div>
<div class="div2">
<section class="account-details-section">
    <h2>Account Details</h2>
   <!--- <?php/*
    require "profpic.php";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imageId = $row['id'];
            $imageName = $row['image_name'];

            echo '<div>';
            echo '<img src="display.php?image_id=' . $imageId . '" alt="' . $imageName . '" height="100px">';
            echo '</div>';
        }
    } else {
        echo "<img height='100px' src=img/defprofile.jpeg>";
    }*/?>-->
    <img height='100px' src=img/defprofile.jpeg>
    <p>Account Username: <span id="username"><?php session_start();  echo $_SESSION['username']; ?></span></p>
    <p>Account Number: <span id="account-number"><?php   echo $_SESSION['account_no']; ?></span></p>
    <p>Account balance: <span id="balance"><?php  echo $_SESSION['balance']; ?></span></p>
    <p>Account Status: <span id="account-status">Active</span></p>
</section>

<button id="settings">Account Settings</button>

<div id ="popup-menu" >
<section class="notifications-section">
    <h2>Change Password</h2>
    <form id="password-change-form">
        <label for="current-password">Current Password:</label>
        <input type="password" id="current-password" name="current-password" required><br><br>
        <label for="new-password">New Password:</label>
        <input type="password" id="new-password" name="new-password" required><br><br>
        <label for="confirm-new-password">Confirm New Password:</label>
        <input type="password" id="confirm-new-password" name="confirm-new-password" required><br><br>
        <input type="submit" value="Change Password">
    </form>
</section>
<section class="notifications-section">
    <h2>Change profile picture</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data" id="password-change-form">
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</section>
</div>

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
</section>
<script src="script.js"></script>
<?php include "footer.php"; ?> 
</body>
</html>





