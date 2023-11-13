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

<link rel="stylesheet" href="utilities.css">
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
        <button id="settings" class= "aa">&#128276;</button>
        <button id="settings" class= "aa">&#9881;</button>
        <button class= "ab"><a href="logout.php">Log out</a></button>
        </span>
    </div>
</header>

<div class ="div1">
<div class = "buttons">
    <li><button id="branch-locator_b">Branch locators</button>
    <li><button id="budget-tracker_b">Budget Tracker</button>
    <li><button id="currency-exchange_b">Currency exchange</button>
    <li><button id="beneficiary-management_b">Beneficiary management</button>
</div>
<div>
<div class ="div1">

<div id = "branch-locator">

<section class="branch-locator-section">
    <h2>Branch Locator</h2>
    <form id="branch-locator-form">
        <label for="location">Enter Your Location:</label>
        <input type="text" id="location" name="location" required><br><br>
        <label for="service-type">Select Service Type:</label>
        <select id="service-type" name="service-type">
            <option value="branch">Branch</option>
            <option value="atm">ATM</option>
        </select><br><br>
        <input type="submit" value="Find Nearest Location">
    </form>
    <div class="location-results">
        <h3>Nearest Locations:</h3>
        <ul><!--
            <li>
                <p><strong>Name:</strong> Main Branch</p>
                <p><strong>Address:</strong> 123 Main Street, City</p>
            </li>
            <li>
                <p><strong>Name:</strong> ATM #1</p>
                <p><strong>Address:</strong> 456 ATM Street, City</p>
            </li>
             Add more branch or ATM locations as needed -->
        </ul>
    </div>
</section>
</div>




<div id = "budget-tracker">
<section class="budget-tracker-section">
    <h2>Budget Tracker</h2>
    <form id="budget-form">
        <label for="budget-category">Budget Category:</label>
        <select id="budget-category" name="budget-category">
            <option value="groceries">Groceries</option>
            <option value="utilities">Utilities</option>
            <option value="entertainment">Entertainment</option>
            <!-- Add more budget category options as needed -->
        </select><br><br>
        <label for="budget-amount">Budget Amount:</label>
        <input type="number" step="0.01" id="budget-amount" name="budget-amount" required><br><br>
        <input type="submit" value="Set Budget">
    </form>
    <div class="budget-list">
        <h3>Your Budgets:</h3>
        <ul>
            <li>
               <!--- <p><strong>Category:</strong> Groceries</p>
                <p><strong>Amount:</strong> $300.00</p>
                <a href="#">Edit</a> | <a href="#">Delete</a>-->
            </li>
            <li>

            </li>
           
        </ul>
    </div>
</section>
</div>




<div id = "currency-exchange">
<section class="currency-exchange-section">
    <h2>Currency Exchange</h2>
    <div class="exchange-rates">
        <h3>Current Exchange Rates</h3>
        <table>
            <tr>
                <th>Currency</th>
                <th>Exchange Rate</th>
            </tr>
            <tr>
                <td>USD (United States Dollar)</td>
                <td>1.00 USD</td>
            </tr>
            <tr>
                <td>EUR (Euro)</td>
                <td>0.93 EUR</td>
            </tr>
            <tr>
                <td>GBP (British Pound)</td>
                <td>0.81 GBP</td>
            </tr>
            <tr>
                <td>KSH (Kenyan Shillimg)</td>
                <td>151.55 KSH</td>
            </tr>
            
        </table>
    </div>
    <div class="currency-converter">
        <h3>Currency Converter</h3>
        <form id="currency-converter-form" action="functions.php" method= "post">
            <label for="from-currency">From Currency:</label>
            <select id="from-currency" name="from-currency">
                <option value="USD">USD (United States Dollar)</option>
                <option value="EUR">EUR (Euro)</option>
                <option value="GBP">GBP (British Pound)</option>
                <option value="KSH">KSH (Kenyan Shillimg)</option>
            
            </select><br><br>
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" id="amount" name="amount" required><br><br>
            <label for="to-currency">To Currency:</label>
            <select id="to-currency" name="to-currency">
                <option value="USD">USD (United States Dollar)</option>
                <option value="EUR">EUR (Euro)</option>
                <option value="GBP">GBP (British Pound)</option>
                <option value="KSH">KSH (Kenyan Shillimg)</option>

            </select><br><br>
            <button id ="conv" >Convert Currency</button>
            
            
        </form>
        <div class="conversion-result">
            <h4>Conversion Result:</h4>
            <?php
            // Display the result if it's set
            if (isset($_GET["result"])) {
                $result = round($_GET["result"], 2);
                echo "<p>Conversion result is: $result</p>";
            } else {
                echo "<p>Conversion result found</p>";
            }
            ?>
        </div>
    </div>
</section>
</div>


<div id = "beneficiary-management">
<section class="budget-tracker-section">
            <h3>Manage Beneficiaries</h3>
            <ul id="beneficiary-list">

            </ul>
            <table>
            <tr>
                <th>NAME</th>
                <th> <th>
                <th>DOB</th>
                <th> <th>
                <th>RELATIONSHIP</th>
            </tr>
        
        <?php
            include "Beneficiary2.php";
            if ($result->num_rows > 0)
            {
            while ($row = $result->fetch_assoc()) {
                 echo '
                <tr>
                <td>'. $row['name'] .'</td>
                <td> <td>
                <td>'. $row['DOB'] .'</td>
                <td> <td>
                <td>'. $row['relationship'] .'</td>
                </tr>
                ';
            }
            }else{ echo "<p> no beneficiaries added yet <p>";}
            ?>

</table>
            <h3>Add Beneficiaries</h3>
            <form id="beneficiary-form" method ="POST" action ="Beneficiary1.php">
                <label for="new-beneficiary">Beneficiary Name:</label>
                <input type="text" id="beneficiary'sname" name="beneficiaryname" required>
                <label for="new-beneficiary">Beneficiary DOB:</label>
                <input type="date" id="beneficiaryDOB" name="beneficiaryDOB" required>
                <label for="new-beneficiary">Beneficiary relationship:</label>
                <select id="beneficiaryrelationship" name="beneficiaryrelationship" required>
                <option value="Spouse">Spouse</option>
                <option value="Son">Son</option>
                <option value="Daughter">Daughter</option>
                </select><br>
                
                <input type="submit" value="Add Beneficiary">
            </form>
</section>
</div>

<div class ="info">
<div class = "show">
<h1>Branch locators</h1>
<img class = "imgs" src="tmg/loc.jpeg" alt="Image 3">
<p>
<strong>Locate Branches and ATMs:</strong><br>
Find our nearest branches and ATMs easily with our locator, providing convenience at your fingertips.
<br><br><strong>On-the-Go Banking:</strong><br>
Access our network of branches and ATMs wherever you are, ensuring seamless banking on your terms.
</p>
</div>
<div class = "show">
<h1>Budget Tracker:</h1>
<img class = "imgs" src="tmg/bt.jpeg" alt="Image 3">
<p>
<strong>Financial Planning:</strong><br> Personalized strategies to help you reach your financial goals.
<br><br><strong>Retirement Accounts:</strong><br> Plan for your future with Individual Retirement Accounts (IRAs).
<br><br><strong>Investment Portfolios:</strong><br> Diversify your investments with our expert guidance.
</p>
</div>
<div class = "show">
<h1>Currency exchange:</h1>
<img class = "imgs" src="tmg/cr.jpeg" alt="Image 3">
<p>
<strong>Financial Planning:</strong><br> Personalized strategies to help you reach your financial goals.
<br><br><strong>Retirement Accounts:</strong><br> Plan for your future with Individual Retirement Accounts (IRAs).
<br><br><strong>Investment Portfolios:</strong><br> Diversify your investments with our expert guidance.
</p>
</div>
<div class = "show">
<h1>Beneficiarys:</h1>
<img class = "imgs" src="tmg/bn.jpeg" alt="Image 3">
<p>
<strong>Financial Planning:</strong><br> Personalized strategies to help you reach your financial goals.
<br><br><strong>Retirement Accounts:</strong><br> Plan for your future with Individual Retirement Accounts (IRAs).
<br><br><strong>Investment Portfolios:</strong><br> Diversify your investments with our expert guidance.
</p>
</div>
</div>

</div>
</div>

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
<script src="utilities.js"></script>
<script src ="home.js"></script>
<?php include "footer.php"; ?> 
</body>
</html>