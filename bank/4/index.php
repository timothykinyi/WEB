<!DOCTYPE html>
<html lang="en">
<head>
  <title>Banking Admin Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="dashboard-container">
    <h1>Admin Dashboard</h1>
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
        <p id="userActivity"></p>
      </div>
    </div>
    <div id="toggleButtons">
        <button onclick="showChart()">Show Chart</button>
        <button onclick="showTable()">Show Table</button>
        
      </div>
    <div class="charts">
      <canvas id="accountCreationChart" width="400" height="300"></canvas>
      <br>
      <canvas id="transactionVolumeChart" width="400" height="300"></canvas>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="script.js"></script>
</body>
</html>
