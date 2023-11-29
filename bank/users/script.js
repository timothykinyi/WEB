
var popupMenu = document.getElementById("popup-menu");
var customer_support = document.getElementById("customer-support");
var Send_money1 = document.getElementById("Send_money");
var bill_payments1 = document.getElementById("bill-payments");
var Save_new1 = document.getElementById("Save_new");
var notific = document.getElementById("notifications");

document.getElementById("notifications_b").addEventListener("click", function() {
    if (notific.style.display === "block"){
        notific.style.display = "none";
    } else {
        notific.style.display = "block";
    }
});
document.getElementById("Send_money_b").addEventListener("click", function() {
    if (Send_money1.style.display === "block") {
        Send_money1.style.display = "none";
    } else {
        Send_money1.style.display = "block";

    }
});

document.getElementById("bill-payments_b").addEventListener("click", function() {
    if (bill_payments1.style.display === "block") {
        bill_payments1.style.display = "none";
    } else {
        bill_payments1.style.display = "block";
    }
});

document.getElementById("Save_new_b").addEventListener("click", function() {
    if (Save_new1.style.display === "block"){
        Save_new1.style.display = "none";
    } else {
        Save_new1.style.display = "block";
    }
});


document.getElementById("settings").addEventListener("click", function() {
    if (popupMenu.style.display === "block") {
        popupMenu.style.display = "none";
    } else {
        popupMenu.style.display = "block";
    }
});



document.getElementById("customer_support_b").addEventListener("click", function() {
    if (customer_support.style.display === "block") {
        customer_support.style.display = "none";
    } else {
        customer_support.style.display = "block";
    }
});



function updateNotificationCount(count) 
{
  const counterElement = document.getElementById("notificationCounter");
  counterElement.textContent = count;
  counterElement.style.display = count > 0 ? 'block' : 'none';
}

function checkPasswordStrength() {
    var password = document.getElementById("new-password").value;
    var strongPasswordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (strongPasswordPattern.test(password)) {
            return true;
    } else {
        var notification = document.getElementById("notification");
        notification.innerHTML = "<p>Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.</p>";
        return false; 
    }
}