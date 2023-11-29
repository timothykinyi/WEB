
  // Function to fetch system health value from the server
  function getSystemHealthValue() {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              var systemHealthValue = parseFloat(xhr.responseText);
              updateChart(systemHealthValue);
          }
      };
      xhr.open("GET", "backend.php", true);
      xhr.send();
  }

  // Function to update the chart based on the system health value
  function updateChart(systemHealthValue) {
      var thickness = 5; // Desired thickness in pixels
      var cutoutPercentage = 100 - thickness / 3; // Calculate cutout percentage

      var ctx = document.getElementById('healthChart').getContext('2d');
      var healthChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
              datasets: [{
                  data: [systemHealthValue, 100 - systemHealthValue],
                  backgroundColor: getChartColors(systemHealthValue),
              }],
          },
          options: {
              cutoutPercentage: cutoutPercentage,
              hoverOffset: 10,
          },
      });
  }

  // Function to determine chart colors based on the system health value
  function getChartColors(systemHealthValue) {
      if (systemHealthValue > 85) {
          return ['red', 'lightgrey'];
      } else if (systemHealthValue > 69) {
          return ['yellow', 'lightgrey'];
      } else {
          return ['green', 'lightgrey'];
      }
  }

  var donutChartData = {
    labels: ['Healthy', 'Warning', 'Critical'],
    datasets: [{
      data: [70, 20, 10],
      backgroundColor: ['#4CAF50', '#FFC107', '#FF5722'],
    }]
  };


  // Display legend
  var legendContainer = document.getElementById('legendContainer');
  donutChartData.labels.forEach(function (label, index) {
    var legendItem = document.createElement('div');
    legendItem.classList.add('legend-item');
    var legendColor = document.createElement('div');
    legendColor.classList.add('legend-color');
    legendColor.style.backgroundColor = donutChartData.datasets[0].backgroundColor[index];
    legendItem.appendChild(legendColor);
    legendItem.innerHTML += label;
    legendContainer.appendChild(legendItem);
  });
  
  // Initial call to fetch and update the system health value
  getSystemHealthValue();

  