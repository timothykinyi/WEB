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
<link rel="stylesheet" href="abouts.css">
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
        <nav class = "nav">
        <a href="home.php"><strong>Home</strong></a>
        <a href="profile.php"><strong>Transactions</strong></a>
        <a href="accact.php"><strong>Accounts</strong></a>
        <a href="utilities.php"><strong>Services</strong></a>
        <a href="others.php"><strong>Contact</strong></a>
        </nav>
        <span class = "span">
        <button class= "ab"><a href="logout.php">Log out</a></button>
        </span>
    </div>
</header>
<main class = 'mid'>
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
<main class="mi">
<div class ="div1">

<section class="help-faqs-section">
    <h2>Help and FAQs</h2>
    <p>If you have questions or need assistance, please check our Frequently Asked Questions (FAQs) below:</p>
    <ul class="faqs-list">
        <li>
            <h3>How do I reset my password?</h3>
            <p>You can reset your password by clicking on the "Forgot Password" link on the login page.</p>
        </li>
        <li>
            <h3>How can I contact customer support?</h3>
            <p>You can contact our customer support team via email at <a href="mailto:support@bazebank.com">support@bazebank.com</a> or by phone at 0742243421.</p>
        </li>
        <li>
            <h3>Are my transactions secure?</h3>
            <p>Yes, we use advanced encryption to secure your transactions and personal information.</p>
        </li>
    </ul>
</section>


</div>
<div class="div2">

<section class="contact-section">
    <h2>Contact Us</h2>
    <p>If you have any questions or need assistance, please feel free to contact us:</p>
    <div class="contact-info">
        <h3>Contact Information:</h3>
        <p><strong>Phone:</strong> 0742243421</p>
        <p><strong>Email:</strong> <a href="mailto:support@bazebank.com">support@bazebank.com</a></p>
    </div>
</section>


</div>
</main>
</main>

<?php include "bottom.php"; ?> 
<script src="accact.js"></script>
<script src ="home.js"></script>
<?php include "footer.php"; ?> 
</body>
</html>