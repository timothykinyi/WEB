document.addEventListener('DOMContentLoaded', function () {
    // Fetch data from the PHP script
    fetch('login_process.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);

            // Update metrics
            document.getElementById('username').textContent = data.username.toLocaleString();
            document.getElementById('account_no').textContent = data.account_no.toLocaleString();
            document.getElementById('balance').textContent = data.balance.toLocaleString();
            document.getElementById('account-status').textContent = data.status.toLocaleString();

        })
        .catch(error => console.error('Error:', error));
});

var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    var count = 0;
    if (this.readyState == 4 && this.status == 200) {
        var notifications = JSON.parse(this.responseText);
        var notificationList = document.getElementById('notifications-list');
        notifications.forEach(function(notification) {
            var li = document.createElement('li');
            li.innerHTML = '<p><strong>Notification:</strong>' + notification.messages + '</p>' +
                           '<span class="notification-time">' + notification.date + '</span>';

            count++;
            notificationList.appendChild(li);
        });
    }
    document.getElementById('notificationCounter').textContent = count;
    updateNotificationCount(count);
};

xhr.open('GET', 'notificationdisp.php', true);
xhr.send();



function updateNotificationCount(counts) 
    {
    const counterElement = document.getElementById("notificationCounter");
    counterElement.textContent = counts;
    counterElement.style.display = counts > 0 ? 'block' : 'none';
    }


    var payee = new XMLHttpRequest();
    payee.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var payees = JSON.parse(this.responseText);
            var payeeList = document.getElementById('payee');
            payees.forEach(function(payees) {
                var option = document.createElement('option');
                option.innerHTML = '<option value="' + payees.acc_no + '">' + payees.payee +'</option>';
                
                payeeList.appendChild(option);
            });
        }
    };
    
    payee.open('GET', 'dataretreval.php', true);
    payee.send();
    