// Sample data for the chart
var chartData = {
    labels: ['January', 'February', 'March', 'April', 'May'],
    datasets: [{
      label: 'Monthly Revenue',
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgba(75, 192, 192, 1)',
      borderWidth: 1,
      data: [15000, 20000, 18000, 22000, 25000],
    }]
  };
  
  // Get the canvas element
  var ctx = document.getElementById('adminChart').getContext('2d');
  
  // Create the chart
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: chartData,
  });
  
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
  function showChart() {
    document.getElementById('adminChart').style.display = 'block';
    $('#adminTable').DataTable().destroy(); // Destroy DataTable if it exists
    document.getElementById('adminTable').style.display = 'none';
  }
  
  // Function to show the table
  function showTable() {
    document.getElementById('adminChart').style.display = 'none';
    document.getElementById('adminTable').style.display = 'table';
    $('#adminTable').DataTable(); // Initialize DataTable
  }
  
  // Function to export table data to CSV
  function exportToCSV() {
    var csvContent = 'data:text/csv;charset=utf-8,';
    csvContent += 'Customer ID,Name,Balance\n';
  
    tableData.forEach(function (row) {
      csvContent += row.id + ',' + row.name + ',' + row.balance + '\n';
    });
  
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', 'bank_data.csv');
    document.body.appendChild(link);
    link.click();
  }
  