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
<link rel="stylesheet" href="accacts.css">
<link rel="stylesheet" href="show.css">
<?php
include "login_process.php";
require "functions.php";
?> 
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
        <button class= "ab"><a href="logout.php">Log out</a></button>
        </span>
    </div>
</header>

<div class ="div1">
<div class = "buttons">
    <li><button id="Loan_Application_b">Loan Application</button>
    <li><button id="Credit_Card_Application_b">Credit Card Application</button>
    <li><button id="Savings_Goals_b">Savings Goals</button>
    <li><button id="Tax_Center_b">Tax Center</button>
    <li><button id="Retirement_Planning_b">Retirement Planning</button>
</div>
<div>

<div class ="div1">

<div id = "Loan_Application">
<section class="loan-application-section">
    <h2>Loan Application</h2>
    <form id="loan-application-form" action = "loanapp.php" method = "post">
        <label for="loan-type">Select Loan Type:</label>
        <select id="loan-type" name="loan-type">
            <option value="personal">Personal Loan</option>
            <option value="mortgage">Mortgage Loan</option>
            <option value="auto">Auto Loan</option>

        </select><br><br>
        <label for="loan-amount">Loan Amount:</label>
        <input type="number" step="0.01" id="loan-amount" name="loan-amount" required><br><br>
        <label for="loan-period">Loan repayment period in months:</label>
        <input type="number" step="1" id="loan-period" name="period" required><br><br>
        <label for="employment-status">Employment Status:</label>
        <select id="employment-status" name="employment-status">
            <option value="employed">Employed</option>
            <option value="unemployed">Unemployed</option>

        </select><br><br>
        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" rows="4" required></textarea><br><br>
        <input type="submit" name = "loanapp" value="Submit Application">
    </form>
</section>

</div>


<div id = "Credit_Card_Application">
<section class="credit-card-application-section">
    <h2>Credit Card Application</h2>
    <p>Apply for a credit card today. Please fill out the form below to get started.</p>
    <div class="credit-card-application-form">
        <form id="credit-card-application-form" action = "loanapp.php" method ="post">
            <label for="full-name">Your Full Name:</label>
            <input type="text" id="full-name" name="full-name" required><br><br>
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="income">Annual Income:</label>
            <input type="number" step="0.01" id="income" name="income" required><br><br>
            <label for="credit-score">Credit Score:</label>
            <input type="number" id="credit-score" name="credit-score" required><br><br>
            <input type="submit" name = "creditapp" value="Submit Application">
        </form>
    </div>
</section>

</div>


<div id = "Savings_Goals">
<section class="savings-goals-section">
    <h2>Savings Goals</h2>
    <form id="savings-goals-form" action = "loanapp.php" method = "post">
        <label for="goal-name">Goal Name:</label>
        <input type="text" id="goal-name" name="goal-name" required><br><br>
        <label for="goal-amount">Goal Amount:</label>
        <input type="number" step="0.01" id="goal-amount" name="goal-amount" required><br><br>
        <input type="submit" name = "savings" value="Set Goal">
    </form>
    <br>
    <h2>Save for a goal</h2>
    <form id="savings-goals-form" action = "loanapp.php" method = "post">
        <label for="goal-name">Goal Name:</label>
        <select id="employment-status" name="goal-name">
        <?php
            require "Beneficiary2.php";
            if ($savingresult->num_rows > 0)
            {
            while ($row = $savingresult->fetch_assoc()) {
                 echo '
                <option value="'. $row['goal_name'] .'">'. $row['goal_name'] .'</option>
                ';
            }
            }else{ echo "<p> no saving goals added yet <p>";}
            ?>
        </select><br><br>
        <label for="goal-amount">Amount to save:</label>
        <input type="number" step="0.01" id="goal-amount" name="goal-amount" required><br><br>
        <input type="submit" name = "save_for_goal" value="Save">
    </form>
    <br>
    <div class="savings-goals-list">
        <h3>Your Savings Goals:</h3>
        <table>
            <tr>
                <th>goal-name</th>
                <th> <th>
                <th>goal-amount</th>
                <th> <th>
                <th>current-amount</th>
            </tr>
        
        <?php
            require "Beneficiary2.php";
            if ($savingresult->num_rows > 0)
            {
            while ($row = $savingresult->fetch_assoc()) {
                 echo '
                <tr>
                <td>'. $row['goal_name'] .'</td>
                <td> <td>
                <td>'. $row['amount'] .'</td>
                <td> <td>
                <td>'. $row['currentamount'] .'</td>
                </tr>
                ';
            }
            }else{ echo "<td> no saving goals added yet <td>";}
            ?>

</table>
    </div>
</section>
</div>


<div id = "Tax_Center">
<section class="savings-goals-section">

    <h2>Tax Center</h2>
    <p>Explore tax resources and tools to help you with tax planning and filing.</p>
    <ul class="tax-resources">
        <li><a href="https://apps.wingubox.com/best-paye-tax-calculator-for-kenya">Tax Calculator</a></li>
        <li><a href="https://www.nerdwallet.com/article/taxes/tax-filing">Tax Filing Guide</a></li>
        
    </ul>
</section>
</div>


<div id = "Retirement_Planning">
<section class="savings-goals-section">

    <h2>Retirement Planning Tools</h2>
    <p>Your retirement savings: <span id="Retirement savings"><?php
if (isset($_COOKIE['retirementplan'])) {
    $retirementsaving = $_COOKIE['retirementplan'];
    echo "KSH " .$retirementsaving ;
} else {
    echo "o data found";
}
?></span></p>
    <br><p>Plan for a secure retirement with our retirement savings calculators and resources.</p>
    <div class="retirement-tools">
    <h2>Save for retirement</h2>
    <form id="savings-goals-form" action = "loanapp.php" method = "post">
        <label for="goal-amount">Enter amount to save:</label>
        <input type="number" step="0.01" id="goal-amount" name="goal-amount" required><br><br>
        <input type="submit" name = "retirementsaving" value="Save">
    </form>
    </div>
</section>

</div>


<div class = "info">

<div class = "show">
<h1>Loans:</h1>
<img class = "imgs" src="tmg/lo.jpeg" alt="Image 3">
<p>
<strong>Simple Loan Solutions:</strong><br>
Explore hassle-free loan options designed to meet your financial needs with straightforward terms.
<br><br><strong>Quick Approvals, Easy Process:</strong><br>
Get swift loan approvals and a streamlined application process, ensuring you access funds when you need them.
</p>
</div>

<div class = "show">
<h1>Credit Card:</h1>
<img class = "imgs" src="tmg/crc.jpeg" alt="Image 3">
<p>
<strong>Smart Spending, Secure Transactions:</strong><br>
Unlock the power of responsible spending with our credit cards, offering secure transactions and financial flexibility.
<br><br><strong>Rewards and Benefits:</strong><br>
Enjoy exclusive rewards and benefits tailored to enhance your lifestyle when you use our credit cards.
</p>
</div>
<div class = "show">
<h1>Retirement:</h1>
<img class = "imgs" src="tmg/rt.jpeg" alt="Image 3">
<p>
<strong>Secure Retirement Planning:</strong><br>
Safeguard your future with our comprehensive retirement planning services, tailored to your financial goals.
<br><br><strong>Financial Freedom Awaits:</strong><br>
Plan for a worry-free retirement and enjoy the freedom you deserve with our personalized retirement solutions.

</p>
</div>
<div class = "show">
<h1>Tax Center:</h1>
<img class = "imgs" src="tmg/tx.jpeg" alt="Image 3">
<p>
<strong>
Tax Assistance Hub:</strong><br>
Navigate tax season seamlessly with our dedicated tax assistance center, providing expert guidance and support.
<br><br><strong>Simplify Tax Processes:</strong><br>
Simplify your tax journey with our resources, ensuring accuracy and ease in filing your returns.

</p>
</div>
</div>

</div>

</div>
</div>

<?php include "bottom.php"; ?> 
<script src="accact.js"></script>
<script src ="home.js"></script>
<?php include "footer.php"; ?> 
</body>
</html>