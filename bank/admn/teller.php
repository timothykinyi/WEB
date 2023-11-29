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
<?php 
require "system.php"; 
require "system2.php"; 
?>
  <link rel="icon" href="tmg/b.ico" type="image/x-icon">
  <title>BAZEBANK.com</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="adminpage.css">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="news.css">

</head>
<body>
<header>
    <div class="head">
        <span class = "span1">
        <img class ="logo" src="b.png" alt="company logo" width="100px">
        </span>
        <nav class = "nav">
        <strong>Admin Page</strong>
        </nav>
        
        <span class = "span">
        <button class= "ab"><a href="superadmin.php">BACK</a></button>
            <button class= "ab"><a href="adminlogout.php">Log out</a></button>
        </span>
    </div>
</header>
<main >
        <section class="bill-payments-section">
            <h2>Deposit</h2>
            <form id="bill-payments-form" method = "POST" action="mkrd.php">

                <label for="account-number">Account Number to deposit money to:</label>
                <input type="text" id="account-number" name="number" required><br><br>
                <label for="amount">Amount:</label>
                <input type="number" step="1" id="amount" name="amount" required><br><br>
                <input type="submit" name = "Deposit" value="Deposit">
                
                
            </form>
        </section>

        <section class="bill-payments-section">
                <h2>Witdraw</h2>
                <form id="bill-payments-form" method = "POST" action="mkrd.php">

                    <label for="account-number">Account Number to Witdraw money from:</label>
                    <input type="text" id="account-number" name="number" required><br><br>
                    <label for="amount">Amount:</label>
                    <input type="number" step="1" id="amount" name="amount" required><br><br>
                    <input type="submit" name = "Witdraw" value="Witdraw">
                    

                </form>
        </section>
</main>
  <script src="scripts.js"></script>
  <footer>
    &copy;  All Rights Reserved. Do not reproduce this page.
  </footer>
</body>
</html>
