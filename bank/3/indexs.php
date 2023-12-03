<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank Admin Page</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="style.css">

</head>
<body>

  <div id="header">
    <h1>Bank Admin Page</h1>
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
        <p id="userActivity"></p>
      </div>
    </div>
    <div id="adminPanel">
      <div id="toggleButtons">
        <button onclick="showaccountCreationChart()">Show Account Creation Chart</button>
        <button onclick="showtransactionVolumeChart()">Show Transaction Volume Chart</button>
        <button onclick="showTable()">Show Table</button>
        <button onclick="showadminhealthChart()">Show health Chart</button>

      </div>
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
      <p>Welcome to the admin panel!</p>
    </div>
  </div>

  <script src="scripts.js"></script>
</body>
</html>
