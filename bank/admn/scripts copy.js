
  
  // Function to show the chart
  function showaccountCreationChart() {
    document.getElementById('charts').style.display = 'block';
    document.getElementById('accountCreationChart').style.display = 'block';
    $('#adminTable').DataTable().destroy(); // Destroy DataTable if it exists
    document.getElementById('transactionVolumeChart').style.display = 'none';
    document.getElementById('adminTable').style.display = 'none';
    document.getElementById('adminhealthChart').style.display = 'none';
    localStorage.setItem('lastAccessedSection', "accountCreationChart");
  }

  // Function to show the table
  function showtransactionVolumeChart() {
    document.getElementById('charts').style.display = 'block';
    document.getElementById('accountCreationChart').style.display = 'none';
    $('#adminTable').DataTable().destroy(); // Destroy DataTable if it exists
    document.getElementById('transactionVolumeChart').style.display = 'block';
    document.getElementById('adminTable').style.display = 'none';
    document.getElementById('adminhealthChart').style.display = 'none';
    localStorage.setItem('lastAccessedSection', "transactionVolumeChart");
  }
  
  // Function to show the table
  function showTable() {
    document.getElementById('charts').style.display = 'none';
    document.getElementById('accountCreationChart').style.display = 'none';
    document.getElementById('transactionVolumeChart').style.display = 'none';
    document.getElementById('adminhealthChart').style.display = 'none';
    document.getElementById('adminTable').style.display = 'table';
    $('#adminTable').DataTable(); // Initialize DataTable
    localStorage.setItem('lastAccessedSection', "adminTable");
  }
  
  function showadminhealthChart() {
    document.getElementById('charts').style.display = 'none';
    document.getElementById('accountCreationChart').style.display = 'none';
    $('#adminTable').DataTable().destroy(); // Destroy DataTable if it exists
    document.getElementById('transactionVolumeChart').style.display = 'none';
    document.getElementById('adminTable').style.display = 'none';
    document.getElementById('adminhealthChart').style.display = 'block';
    localStorage.setItem('lastAccessedSection', "adminhealthChart");
  }

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
      if (systemHealthValue > 80) {
          return ['#4CAF50', 'lightgrey'];
      } else if (systemHealthValue > 50) {
          return ['#FFC107', 'lightgrey'];
      } else {
        return ['#FF5722', 'lightgrey'];
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

  document.addEventListener('DOMContentLoaded', function() {
    var lastAccessedSection = localStorage.getItem('lastAccessedSection');
    if (lastAccessedSection) {
        showSection(lastAccessedSection);
    }
 });
 function showSection(sectionId) {
    document.getElementById(sectionId).style.display = 'block';
    localStorage.setItem('lastAccessedSection', sectionId);
 }