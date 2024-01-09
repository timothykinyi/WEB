document.getElementById("Loan_Application_b").addEventListener("click" , function()
{
   var Loan_Application = document.getElementById("Loan_Application");
   if(Loan_Application.style.display === "none")
   {
    Loan_Application.style.display = "block";
    localStorage.setItem('lastAccessedSection', "Loan_Application");
   }else
   {
    Loan_Application.style.display = "none";
    localStorage.setItem('lastAccessedSection', "");
   }
});


document.getElementById("Credit_Card_Application_b").addEventListener("click" , function()
{
   var Credit_Card_Application = document.getElementById("Credit_Card_Application");
   if(Credit_Card_Application.style.display === "none")
   {
    Credit_Card_Application.style.display = "block";
    localStorage.setItem('lastAccessedSection', "Credit_Card_Application");
   }else
   {
    Credit_Card_Application.style.display = "none";
    localStorage.setItem('lastAccessedSection', "");
   }
});

document.getElementById("Savings_Goals_b").addEventListener("click" , function()
{
   var Savings_Goals = document.getElementById("Savings_Goals");
   if(Savings_Goals.style.display === "none")
   {
    Savings_Goals.style.display = "block";
    localStorage.setItem('lastAccessedSection', "Savings_Goals");
   }else
   {
    Savings_Goals.style.display = "none";
    localStorage.setItem('lastAccessedSection', "");
   }
});

document.getElementById("Tax_Center_b").addEventListener("click" , function()
{
   var Tax_Center = document.getElementById("Tax_Center");
   if(Tax_Center.style.display === "none")
   {
    Tax_Center.style.display = "block";
    localStorage.setItem('lastAccessedSection', "Tax_Center");
   }else
   {
    Tax_Center.style.display = "none";
    localStorage.setItem('lastAccessedSection', "");
   }
});

document.getElementById("Retirement_Planning_b").addEventListener("click" , function()
{
   var Retirement_Planning = document.getElementById("Retirement_Planning");
   if(Retirement_Planning.style.display === "none")
   {
    Retirement_Planning.style.display = "block";
    localStorage.setItem('lastAccessedSection', "Retirement_Planning");
   }else
   {
    Retirement_Planning.style.display = "none";
    localStorage.setItem('lastAccessedSection', "");
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

var goalname = new XMLHttpRequest();
goalname.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var goalnamels = JSON.parse(this.responseText);
        var goalnamel = document.getElementById('goalname');
        var savingsTable = document.getElementById('savingsTable');
        goalnamels.forEach(function(saverow) {
            var option = document.createElement('option');
            var tbody = document.createElement('tbody');
            option.innerHTML = 
                            '<option value="'+ saverow.goal_name +'">'+ saverow.goal_name +'</option>';

            tbody.innerHTML =
               '<tr>' +
               '<td>' + saverow.goal_name + '</td>' +
               '<td>' + saverow.amount + '</td>' +
               '<td>' + saverow.currentamount + '</td>' +
               '</tr>'
            goalnamel.appendChild(option);
            savingsTable.appendChild(tbody);

        });
    }

};

goalname.open('GET', 'beneficiaries4.php', true);
goalname.send();

document.addEventListener('DOMContentLoaded', function () {
   // Fetch data from the PHP script
   fetch('loanapp.php')
       .then(response => response.json())
       .then(data => {
           console.log(data);

           document.getElementById('Retirement savings').textContent = ` KSH ${data.toLocaleString()}`;

       })
       .catch(error => console.error('Error:', error));
});