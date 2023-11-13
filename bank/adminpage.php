

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<link rel="stylesheet" href="profile.css">

</head>
<body>
<?php include "header.php"; ?> 
<section class="mi">
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
            <p>You can contact our customer support team via email at <a href="mailto:support@bazebank.com">support@mybanking.com</a> or by phone at 0710000000.</p>
        </li>
        <li>
            <h3>Are my transactions secure?</h3>
            <p>Yes, we use advanced encryption to secure your transactions and personal information.</p>
        </li>
        <!-- Add more FAQ items as needed -->
    </ul>
</section>


</div>
<div class="div2">

<section class="contact-section">
    <h2>Contact Us</h2>
    <p>If you have any questions or need assistance, please feel free to contact us:</p>
    <div class="contact-info">
        <h3>Contact Information:</h3>
        <p><strong>Phone:</strong> 0710000000</p>
        <p><strong>Email:</strong> <a href="mailto:support@bazebank.com">support@bazebank.com</a></p>
    </div>
</section>


</div>
</section>


<script>

    document.getElementById("settings").addEventListener("click", function() {
    var popupMenu = document.getElementById("popup-menu");
    if (popupMenu.style.display === "block") {
        popupMenu.style.display = "none";
    } else {
        popupMenu.style.display = "block";
    }
});

</script>

<?php include "footer.php"; ?> 
</body>
</html>


