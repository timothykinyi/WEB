<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Health Dashboard</title>
  <!-- Link to Chart.js library -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <div class="container">
    <h1>System Health Dashboard</h1>
    <div class="chart-container">
    <canvas id="healthChart"></canvas>
    </div>
    <div class="legend-container" id="legendContainer"></div>
  </div>

  <script src="script.js"></script>
</body>
</html>
