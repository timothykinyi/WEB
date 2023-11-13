
document.getElementById("currency-exchange_b").addEventListener("click", function()
{   
    var currency_exchange = document.getElementById("currency-exchange");
    if(currency_exchange.style.display === "block")
    {
        currency_exchange.style.display = "none";
    }else{
        currency_exchange.style.display = "block";
    }
});

document.getElementById("beneficiary-management_b").addEventListener("click", function() {
    var beneficiary_management = document.getElementById("beneficiary-management");
    if (beneficiary_management.style.display === "block") {
        beneficiary_management.style.display = "none";
    } else {
        beneficiary_management.style.display = "block";
    }
});

document.getElementById("budget-tracker_b").addEventListener("click", function() {
    var budget_tracker = document.getElementById("budget-tracker");
    if (budget_tracker.style.display === "block") {
        budget_tracker.style.display = "none";
    } else {
        budget_tracker.style.display = "block";
    }
});
document.getElementById("branch-locator_b").addEventListener("click", function() {
    var branch_locator = document.getElementById("branch-locator");
    if (branch_locator.style.display === "block") {
        branch_locator.style.display = "none";
    } else {
        branch_locator.style.display = "block";
    }
});


