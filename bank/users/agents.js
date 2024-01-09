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

xhr.open('GET', 'agentnotificationdisp.php', true);
xhr.send();



function updateNotificationCount(counts) 
    {
    const counterElement = document.getElementById("notificationCounter");
    counterElement.textContent = counts;
    counterElement.style.display = counts > 0 ? 'block' : 'none';
    }
