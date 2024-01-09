
var popupMenu = document.getElementById("popup-menu");
var customer_support = document.getElementById("customer-support");
var Send_money1 = document.getElementById("Send_money");
var bill_payments1 = document.getElementById("bill-payments");
var Save_new1 = document.getElementById("Save_new");
var notific = document.getElementById("notifications");

document.getElementById("notifications_b").addEventListener("click", function() {
    if (notific.style.display === "block"){
        notific.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        notific.style.display = "block";
        localStorage.setItem('lastAccessedSection', "notifications");
    }
    
});
document.getElementById("Send_money_b").addEventListener("click", function() {
    if (Send_money1.style.display === "block") {
        Send_money1.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        Send_money1.style.display = "block";
        localStorage.setItem('lastAccessedSection', "Send_money");
    }
    
});

document.getElementById("bill-payments_b").addEventListener("click", function() {
    if (bill_payments1.style.display === "block") {
        bill_payments1.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        bill_payments1.style.display = "block";
        localStorage.setItem('lastAccessedSection', "bill-payments");
    }
    
});

document.getElementById("Save_new_b").addEventListener("click", function() {
    if (Save_new1.style.display === "block"){
        Save_new1.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        Save_new1.style.display = "block";
        localStorage.setItem('lastAccessedSection', "Save_new");
    }
    
});


document.getElementById("settings").addEventListener("click", function() {
    if (popupMenu.style.display === "block") {
        popupMenu.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        popupMenu.style.display = "block";
        localStorage.setItem('lastAccessedSection', "popup-menu");
    }
    
});



document.getElementById("customer_support_b").addEventListener("click", function() {
    if (customer_support.style.display === "block") {
        customer_support.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        customer_support.style.display = "block";
        localStorage.setItem('lastAccessedSection', "customer-support");
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
