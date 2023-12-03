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
          setcookie("adm_no", "$adm_no", time() + 31536000, "/");
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <link rel="stylesheet" href="adminpage.css">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="news.css">
  <link rel="stylesheet" href="show.css">
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
            <button class= "ab"><a href="adminlogout.php">Log out</a></button>
        </span>
    </div>
</header>
<div class ="div1">
<div class = "buttons">
    <li><button onclick="showaccountCreationChart()">Show Account Creation Chart</button>
    <li><button onclick="showtransactionVolumeChart()">Show Transaction Volume Chart</button>
    <li><button onclick="showTable()">Show Table</button>
    <li><button onclick="showadminhealthChart()">Show health Chart</button>
    <li><button for="submit" name="Visual_Service" id="Visual_Service_b"><a href="superadmin.php">Main page</a></button>
</div>
</div>

  <div id="container">
  <div class="metrics">
      <div class="metric">
        <h2>Total Assets</h2>
        <p id="totalAssets">0</p>
      </div>
      <div class="metric">
        <h2>Total Accounts</h2>
        <p id="totalAccounts">0</p>
      </div>
      <div class="metric">
        <h2>Recent Transactions</h2>
        <p id="recentTransactions">0</p>
      </div>
      <div class="metric">
        <h2>User Activity</h2>
        <p id="userActivity">0</p>
      </div>
    </div>
    <div id="adminPanel">
    <div id="charts">
      <canvas id="accountCreationChart" width="400" height="300"></canvas>
      <br>
      <canvas id="transactionVolumeChart" width="400" height="300"></canvas>
      </div>

      <table id="adminTable" class="display">
        <thead>
          <tr>
            <th>Account number</th>
            <th>Username</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      
      <div id="adminhealthChart" >
          <h1>System Health Dashboard</h1>
          <div id="healthChartContainer">
              <canvas id="healthChart"></canvas>
          </div>
          <div class="legend-container" id="legendContainer"></div>
      </div>
      <p>Welcome to the admin panel</p>
    </div>
  </div>

  <script src="scripts.js"></script>
  <footer>
    &copy;  All Rights Reserved. Do not reproduce this page.
  </footer>
</body>
</html>
