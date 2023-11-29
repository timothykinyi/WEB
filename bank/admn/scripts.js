document.addEventListener('DOMContentLoaded', function () {
    // Fetch data from the PHP script
    fetch('data.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);

            // Update metrics
            document.getElementById('totalAssets').textContent = `KSH ${data.totalAssets.toLocaleString()}`;
            document.getElementById('totalAccounts').textContent = data.totalAccounts.toLocaleString();
            document.getElementById('recentTransactions').textContent = data.recentTransactions.toLocaleString();
            document.getElementById('userActivity').textContent = data.userActivity.toLocaleString();

            // Create bar graphs
            createBarGraph('accountCreationChart', 'Account Creation Trends', data.accountCreation.labels, data.accountCreation.data, 'New Accounts');
            createBarGraph('transactionVolumeChart', 'Transaction Volume Trends', data.transactionVolume.labels, data.transactionVolume.data, 'Transaction Volume');
        })
        .catch(error => console.error('Error:', error));
});

function createBarGraph(chartId, chartTitle, labels, data, datasetLabel) {
    const ctx = document.getElementById(chartId).getContext('2d');
    new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: labels,
            datasets: [{
                label: datasetLabel,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                data: data,
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'category',
                    labels: labels,
                },
                y: {
                    beginAtZero: true,
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                }
            },
            title: {
                display: true,
                text: chartTitle,
            }
        }
    });
}
  // Sample data for the table
var tableData = fetchDataAndPopulateTable();

function fetchDataAndPopulateTable() {
  $.ajax({
      url: 'fetch_data.php',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
          // Clear existing table rows
          $('#adminTable tbody').empty();

          // Append new rows based on fetched data
          for (var i = 0; i < data.length; i++) {
              var row = data[i];
              $('#adminTable tbody').append(
                  '<tr>' +
                  '<td>' + row.account_no + '</td>' +
                  '<td>' + row.username + '</td>' +
                  '<td>' + row.email + '</td>' +
                  '</tr>'
              );
          }
      },
      error: function (error) {
          console.log('Error fetching data: ', error);
      }
  });}
  
  // Function to show the chart
  function showaccountCreationChart() {
    document.getElementById('charts').style.display = 'block';
    document.getElementById('accountCreationChart').style.display = 'block';
    $('#adminTable').DataTable().destroy(); // Destroy DataTable if it exists
    document.getElementById('transactionVolumeChart').style.display = 'none';
    document.getElementById('adminTable').style.display = 'none';
    document.getElementById('adminhealthChart').style.display = 'none';
  }

  // Function to show the table
  function showtransactionVolumeChart() {
    document.getElementById('charts').style.display = 'block';
    document.getElementById('accountCreationChart').style.display = 'none';
    $('#adminTable').DataTable().destroy(); // Destroy DataTable if it exists
    document.getElementById('transactionVolumeChart').style.display = 'block';
    document.getElementById('adminTable').style.display = 'none';
    document.getElementById('adminhealthChart').style.display = 'none';
  }
  
  // Function to show the table
  function showTable() {
    document.getElementById('charts').style.display = 'none';
    document.getElementById('accountCreationChart').style.display = 'none';
    document.getElementById('transactionVolumeChart').style.display = 'none';
    document.getElementById('adminhealthChart').style.display = 'none';
    document.getElementById('adminTable').style.display = 'table';
    $('#adminTable').DataTable(); // Initialize DataTable
  }
  
  function showadminhealthChart() {
    document.getElementById('charts').style.display = 'none';
    document.getElementById('accountCreationChart').style.display = 'none';
    $('#adminTable').DataTable().destroy(); // Destroy DataTable if it exists
    document.getElementById('transactionVolumeChart').style.display = 'none';
    document.getElementById('adminTable').style.display = 'none';
    document.getElementById('adminhealthChart').style.display = 'block';
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
      if (systemHealthValue > 53.3333333333) {
          return ['#4CAF50', 'lightgrey'];
      } else if (systemHealthValue > 33.3333333333) {
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

  
  