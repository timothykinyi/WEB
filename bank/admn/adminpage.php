<?php
        function getCookieWithArray($name) {
            if (isset($_COOKIE[$name])) {
                $serializedValues = $_COOKIE[$name];
                $unserializedValues = unserialize($serializedValues);
                if ($unserializedValues !== false) {
                    return $unserializedValues;
                }
            }
            return null;
        }
        if (isset($_COOKIE['adm_no'])) { $admn = $_COOKIE['adm_no']; } 
        else { header("Location: adminlogin.php");}
        $cookieValues = getCookieWithArray($admn);
        if ($cookieValues) {
          $adm_no = $cookieValues[0];
          $role = $cookieValues[1];
          $log = $cookieValues[2];
        }else { header("Location: adminlogin.php"); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="tmg/b.ico" type="image/x-icon">
<title>BAZEBANK.com</title>
<link rel="icon" href="users/tmg/b.ico" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-hJRmIKjzVcSDXXSxj6yAxU5l/9bKJkgXgDqs7cv0Sf8gJgP6kn4tgDReeI2U+Em" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap">
<link rel="stylesheet" href="adminpage.css">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="show.css">
<link rel="stylesheet" href="news.css">
</head>
<body>
<?php
    if (isset($_GET["error"])) {
        $result = $_GET["error"];
        echo "<form><p class =  'note' > <button onclick ='out();'>x</button><br> <br> $result <br></p></form>";
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
        <img class ="logo" src="b.png" alt="company logo" width="100px">
        </span>
        <nav class = "nav">
        <strong>Admin Page</strong>
        </nav>
        
        <span class = "span">
            <button id="settings" class= "aa">&#9881;</button>
            <button class= "ab"><a href="adminlogout.php">Log out</a></button>
        </span>
    </div>
</header>
<main class ="div2">
<div id ="popup-menu" >
    <section class="notifications-section">
        <h2>Change Password</h2>
        <form id="password-change-form" action = "useract2.php" method = "post" onsubmit="return checkPasswordStrength();">
            <label for="current-password">Current Password:</label>
            <input type="password" id="current-password" name="current-password" required><br><br>
            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="new-password" required><br><br>
            <input type="submit"  name = "adminpassword"value="Change Password">
        </form>
        <div id="notification"></div>
    </section>
</div>
<div class ="div1">
    <div class = "buttons">
            <li><button id="customer_services_b">Customer Service</button>
            <li><button id="credit_card_services_b">Credit Card Service</button>
            <li> <button id="loan_services_b">Loan Service</button> 
            <li><button id="users_services_b">Users Service</button> 
    </div>
</div>

<div id="customer_service">
    <h1>Customer Service</h1>
    <?php
            require "test.php";
            while ($row = $result->fetch_assoc()) {
                echo 
                '<span class="customer_service_info">
                    <div id = "info_form">
                    <h3>Info Form:</h3>
                    <p><strong>Name</strong> ' . $row['name'] . '</p>
                    <p><strong>Email</strong> ' . $row['email'] . '</p>
                    <p style="max-width: 300px;"><strong>Message</strong><br> ' . $row['message'] . '</p>
                    <p><strong>Message status</strong> ' . $row['status'] . '</p>
                    </div>
                    <div id="reply-form">
                        <h3>reply Form:</h3>
                        <form id="rep-form" action ="rep.php" method="POST">
                            <div id = "blank">
                                <select id="payee" name="id">
                                    <option  value="' . $row['id'] . '"></option>
                                </select>
                                <select id="payee" name="email">
                                    <option value="' . $row['email'] . '"></option>
                                </select>
                            </div>
                            <label for="message">Your Message:</label><br>
                            <textarea id="message" name="message" rows="4" required></textarea><br><br>
                            <input type="submit" name= "customerrep" value=" reply">
                        </form>
                        <form action="mkrd.php" method="post">
                            <div id = "blank">
                                <select id="payee" name="id">
                                <option  value="' . $row['id'] . '"></option>
                                </select>
                            </div>
                            <input type="submit" name="submitButton" value = "Mark as read">
                        </form>
                    </div>
                </span>';
            }
    ?>
</div>

<div id="credit_card_service">
    <h1>Credit card service</h1>
    <div class = "flex">
    <?php
            require "test.php";
            while ($row = $creditcardresult->fetch_assoc()) {
                echo 
                '<span class="customer_service_info">
                    <div id="reply-form">
                    <h3>Credit card application:</h3>
                    <p><strong>Name</strong> ' . $row['name'] . '</p>
                    <p><strong>Email</strong> ' . $row['email'] . '</p>
                    <p><strong>Annual Income</strong> ' . $row['annualincome'] . '</p>
                    <p><strong>Credit Score</strong> ' . $row['creditscore'] . '</p>
                    <p><strong>Account number</strong> ' . $row['accountno'] . '</p>
                    <p><strong>Application date</strong> ' . $row['date'] . '</p>
                    <p><strong>Apllication status</strong> ' . $row['status'] . '</p>

                    <form id="rep-form" action ="mkrd.php" method="POST">
                    <div id = "blank">
                        <select id="payee" name="id">
                            <option  value="' . $row['id'] . '"></option>
                        </select>
                        <select id="payee" name="accountno">
                            <option value="' . $row['accountno'] . '"></option>
                        </select>
                    </div>
                    <input type="submit" name= "credit_card_accept" value=" Accept">
                    <input type="submit" name= "credit_card_decline" value=" Decline">
                    </form>
                </div>
                </span>';
            }
    ?>
    </div>
</div>

<div id="loan_service">
    <h1>Loan service</h1>
    <div class = "flex">
    <?php
            require "test.php";
            while ($row = $loanresult->fetch_assoc()) {
                echo 
                '<span class="customer_service_info">
                    <div id="reply-form">
                    <h3>Loan application:</h3>
                    <p><strong>Loan type</strong> ' . $row['ltype'] . '</p>
                    <p><strong>Employment status</strong> ' . $row['employmentstatus'] . '</p>
                    <p><strong>Amount</strong> ' . $row['amount'] . '</p>
                    <p><strong>Repayment period</strong> ' . $row['period'] . '</p>
                    <p style="max-width: 300px;"><strong>Reason</strong> ' . $row['comment'] . '</p>
                    <p><strong>Account number</strong> ' . $row['account_no'] . '</p>
                    <p><strong>Application status</strong> ' . $row['status'] . '</p>

                    <form id="rep-form" action ="mkrd.php" method="POST">
                    <div id = "blank">
                        <select id="payee" name="id">
                            <option  value="' . $row['id'] . '"></option>
                        </select>
                        <select id="payee" name="account_no">
                            <option value="' . $row['account_no'] . '"></option>
                        </select>
                        <select id="payee" name="amount">
                            <option value="' . $row['amount'] . '"></option>
                        </select>
                        <select id="payee" name="period">
                            <option value="' . $row['period'] . '"></option>
                        </select>
                    </div>
                    <input type="submit" name= "loan_Accept" value=" Accept">
                    <input type="submit" name= "loan_Decline" value=" Decline">
                    </form>

                </div>
                </span>';
            }
    ?>
    </div>
</div>


<div id= "users_service">
    <div class = "flex">

    <div class="account-management-container">
        
        <div id="accountActions">
        <h2>Actions</h2>
        <form class="log" action="useract2.php" method="post" >
        <label for="accountId">Account number:</label>
        <input type="text" id="accountId" placeholder="Enter account number" name="acc_no" required><br>
        <button name="freezeAccount">Freeze Account</button><br>
        <button name="unfreezeAccount">Unfreeze Account</button><br>
        <button name="viewAccountDetails">View Account Details</button><br>

        </form>
        </div>
        <div>
        <table>
                <thead>
                <tr>
                    <th>NAME</th>
                    <th>email</th>
                    <th>account_no</th>
                    <th>STATUS</th>
                </tr>
                </thead>
            <?php
            require "useract.php";
            if ($viewAccountDetailsresult->num_rows > 0)
            {
                $coun =0;
            while ($row = $viewAccountDetailsresult->fetch_assoc()) {
                if (isset($_COOKIE['view'])) {
                    $accno = $_COOKIE['view'];
                
                } else {
                    echo "Cookie not set.";
                }

                if ($row['account_no'] === $accno)
                    {  
                    echo 
                    '
                    <tbody>
                    <tr>
                        <td>' . $row['first_name'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['account_no'] . '</td>
                        <td>' . $row['status'] . '</td>
                    </tr>
                    </tbody>';
                    $coun ++;
                    }else if ($coun < 1)
                    {
                        echo "<td> No data founder <td>";
                    }
                }
                }else
                {
                    echo "<td> No data founder <td>";
                }
            ?>
        </table>
        </div>
    </div>

    <div class="system-configuration-container">
        <h1>System Configuration</h1>
        <div id="systemSettings">
            <?php
            require "useract.php";
            if ($settingsresult->num_rows > 0)
            {
            while ($row = $settingsresult->fetch_assoc()) {
                echo 
                '
                <p> interestRate: ' . $row['interestRate'] . ' (%), </p>
                <p> transactionLimit: KSH' . $row['transactionLimit'] . ', </p>
                <p> feeStructure: Flat Fee: KSH' . $row['transactioncost'] . ' per transaction, </p>
                ';
            } 
            }else
            {
                echo "<td> No data founder <td>";
            }
            
            ?>
        </div>
        <div id="configurationActions">
        <h2>Actions</h2>
        <form class="log" action="useract2.php" method="post" >
        <label for="interestRate">Interest Rate (%):</label>
        <input type="text" name="interestRate" id="interestRate"><br>
        <label for="transactionLimit">Transaction Limit (KSH):</label>
        <input type="text" name="transactionLimit" id="transactionLimit"><br>
        <label for="feeStructure">Fee Structure:</label>
        <input type="text" name="feeStructure" id="feeStructure"><br>
        <button name="updateSystemSettings">Update System Settings</button>
        </form>
        </div>
    </div>

    </div>
</div>

</main>
<script>
    var popupMenu = document.getElementById("popup-menu");
    document.getElementById("settings").addEventListener("click", function() {
        if (popupMenu.style.display === "block") {
            popupMenu.style.display = "none";
        } else {
            popupMenu.style.display = "block";
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
</script>
<script src="adminpages.js"></script>
<footer>
    
&copy;  All Rights Reserved. Do not reproduce this page.

</footer>
</body>
</html>