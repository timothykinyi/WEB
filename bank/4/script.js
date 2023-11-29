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

function showChart() {
    document.getElementById('accountCreationChart').style.display = 'block';
    $('#adminTable').DataTable().destroy(); // Destroy DataTable if it exists
    document.getElementById('transactionVolumeChart').style.display = 'none';
  }

  // Function to show the table
function showTable() {
    document.getElementById('accountCreationChart').style.display = 'none';
    document.getElementById('transactionVolumeChart').style.display = 'block';
    $('#adminTable').DataTable(); // Initialize DataTable
}