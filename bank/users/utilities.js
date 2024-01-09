
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

var locator = new XMLHttpRequest();
locator.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var locators = JSON.parse(this.responseText);
        var locationlist = document.getElementById('locationlist');
        locators.forEach(function(location) {
            var li = document.createElement('li');
            li.innerHTML = '<li class="location-item">'+
                                '<p class="location-detail"><strong>Location:</strong>'+ location.location + '</p>'+
                                '<p class="location-detail"><strong>Address:</strong>' + location.al + '</p>'+
                           '</li>';
            locationlist.appendChild(li);
        });
    }

};

locator.open('GET', 'locator.php', true);
locator.send();


var budhet = new XMLHttpRequest();
budhet.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var budhets = JSON.parse(this.responseText);
        var budhetlist = document.getElementById('budhetlist');
        budhets.forEach(function(budhetl) {
            var lii = document.createElement('li');
            lii.innerHTML = '<li class="location-item">'+
                                '<p class="location-detail" ><strong>Category:</strong>  '+ budhetl.budget_name +'</p>'+
                                '<p class="location-detail"><strong>Amount:</strong>  KSH '+ budhetl.amount +'</p>'+
                            '<form id="budget-form"action = "loanapp.php" method = "post" >'+
                                '<input type="hidden" id="budgetcat" name = "budgetname" value="'+ budhetl.budget_name +'"></input>'+
                                '<input type="submit" name = "DeleteBudgetplan" value="Delete">'+
                            '</form>'+
                           '</li>';
            budhetlist.appendChild(lii);
        });
    }

};

budhet.open('GET', 'Beneficiary2.php', true);
budhet.send();


var beneficiaries = new XMLHttpRequest();
beneficiaries.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var beneficiarieslists = JSON.parse(this.responseText);
        var beneficiarieslist = document.getElementById('BeneficiaryTable');
        beneficiarieslists.forEach(function(benefrow) {
            var liii = document.createElement('li');
            liii.innerHTML = 
                            '<li class="location-item">'+
                                '<p class="location-detail" ><strong>NAME:</strong>  '+ benefrow.name + '</p>'+
                                '<p class="location-detail"><strong>DOB:</strong>'+ benefrow.DOB + '</p>'+
                                '<p class="location-detail"><strong>RELATIONSHIP:</strong>'+ benefrow.relationship + '</p>'+
                            '<form method ="POST" action ="loanapp.php">'+
                                '<input type="hidden" name = "bname" value="'+ benefrow.name + '"></input>'+
                                '<input type="submit" name = "delBeneficiary" value="Remove Beneficiary">'+
                            '</form>'+
                           '</li>';
            beneficiarieslist.appendChild(liii);
        });
    }

};

beneficiaries.open('GET', 'beneficiaries3.php', true);
beneficiaries.send();

function conversion() {
    var from = document.getElementById('from-currency').value;
    var to = document.getElementById('to-currency').value;
    var amount = parseFloat(document.getElementById('amount').value);

    var result;
    var holding;
    var USD_EUR = 0.93;
    var USD_GBP = 0.81;
    var USD_KSH = 151.55;

    if (from == "USD") {
        holding = amount;
    } else if (from == "EUR") {
        holding = amount / USD_EUR;
    } else if (from == "GBP") {
        holding = amount / USD_GBP;
    } else if (from == "KSH") {
        holding = amount / USD_KSH;
    }

    switch (to) {
        case "USD":
            result = holding;
            break;
        case "EUR":
            result = holding * USD_EUR;
            break;
        case "GBP":
            result = holding * USD_GBP;
            break;
        case "KSH":
            result = holding * USD_KSH;
            break;
    }
    var fresult = result.toFixed(2);
    alert(`The conversion result is ${fresult.toLocaleString()}`);
}

