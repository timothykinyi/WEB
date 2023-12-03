
document.getElementById("currency-exchange_b").addEventListener("click", function()
{   
    var currency_exchange = document.getElementById("currency-exchange");
    if(currency_exchange.style.display === "block")
    {
        currency_exchange.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    }else{
        currency_exchange.style.display = "block";
        localStorage.setItem('lastAccessedSection', "currency-exchange");
    }
});

document.getElementById("beneficiary-management_b").addEventListener("click", function() {
    var beneficiary_management = document.getElementById("beneficiary-management");
    if (beneficiary_management.style.display === "block") {
        beneficiary_management.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        beneficiary_management.style.display = "block";
        localStorage.setItem('lastAccessedSection', "beneficiary-management");
    }
});

document.getElementById("budget-tracker_b").addEventListener("click", function() {
    var budget_tracker = document.getElementById("budget-tracker");
    if (budget_tracker.style.display === "block") {
        budget_tracker.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        budget_tracker.style.display = "block";
        localStorage.setItem('lastAccessedSection', "budget-tracker");
    }
});
document.getElementById("branch-locator_b").addEventListener("click", function() {
    var branch_locator = document.getElementById("branch-locator");
    if (branch_locator.style.display === "block") {
        branch_locator.style.display = "none";
        localStorage.setItem('lastAccessedSection', "");
    } else {
        branch_locator.style.display = "block";
        localStorage.setItem('lastAccessedSection', "branch-locator");
    }
});

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