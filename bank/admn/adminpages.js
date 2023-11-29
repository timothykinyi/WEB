
document.getElementById("adduser_b").addEventListener("click" , function()
{
    var addusers = document.getElementById("adduser");
    if(addusers.style.display === "none")
    {
        addusers.style.display = "block";
    }else
    {
        addusers.style.display = "none";
    }
});

document.getElementById("modifyuser_b").addEventListener("click" , function()
{
    var modifyusers = document.getElementById("modifyuser");
    if(modifyusers.style.display === "none")
    {
        modifyusers.style.display = "block";
    }else
    {
        modifyusers.style.display = "none";
    }
});

document.getElementById("customer_services_b").addEventListener("click" , function()
{
    var customer_services = document.getElementById("customer_service");
    if(customer_services.style.display === "none")
    {
        customer_services.style.display = "block";
    }else
    {
        customer_services.style.display = "none";
    }
});


document.getElementById("credit_card_services_b").addEventListener("click" , function()
{
    var credit_card_services = document.getElementById("credit_card_service");
    if(credit_card_services.style.display === "none")
    {
        credit_card_services.style.display = "block";
    }else
    {
        credit_card_services.style.display = "none";
    }
});


document.getElementById("loan_services_b").addEventListener("click" , function()
{
    var loan_services = document.getElementById("loan_service");
    if(loan_services.style.display === "none")
    {
        loan_services.style.display = "block";
    }else
    {
        loan_services.style.display = "none";
    }
});

document.getElementById("users_services_b").addEventListener("click" , function()
{
    var users_services = document.getElementById("users_service");
    if(users_services.style.display === "none")
    {
        users_services.style.display = "block";
    }else
    {
        users_services.style.display = "none";
    }
});

document.getElementById("Bank_Users_Service_b").addEventListener("click" , function()
{
    var bank_userss = document.getElementById("bank_users");
    if(bank_userss.style.display === "none")
    {
        bank_userss.style.display = "block";
    }else
    {
        bank_userss.style.display = "none";
    }
});

document.getElementById("Useraction_b").addEventListener("click" , function()
{
    var Useractions = document.getElementById("Useraction");
    if(Useractions.style.display === "none")
    {
        Useractions.style.display = "block";
    }else
    {
        Useractions.style.display = "none";
    }
});

var popupMenu = document.getElementById("popup-menu");
document.getElementById("settings").addEventListener("click", function() {
    if (popupMenu.style.display === "block") {
        popupMenu.style.display = "none";
    } else {
        popupMenu.style.display = "block";
    }
});


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


function validateEmail() {
    const email = document.getElementById('email').value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailRegex.test(email) && email.endsWith(".com")) {
    document.getElementById('resultMessage').textContent = 'Valid email address';
    return true;
    } else {
    document.getElementById('resultMessage').textContent = 'Invalid email address';
    return false; 
    }
}
