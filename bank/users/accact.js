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