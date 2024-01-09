function setCookie(name, data, daysToExpire) {
    var expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + daysToExpire);

    var serializedData = JSON.stringify(data);

    var cookieValue = encodeURIComponent(serializedData) + "; expires=" + expirationDate.toUTCString() + "; path=/";

    document.cookie = name + "=" + cookieValue;
    alert("cookie has been set");
}

document.addEventListener('DOMContentLoaded', function () {
    // Fetch data from the PHP script
    fetch('login_process.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
        var userData = {
                username: data.username.toLocaleString(),
                account_no: data.account_no.toLocaleString(),
                loggedin: true
            };

        var test = setCookie(username, userData, 1);

        })
        .catch(error => console.error('Error:', error));
});

function clearCookie(name, data, daysToExpire) {
    var expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + daysToExpire);

    var serializedData = JSON.stringify(data);

    var cookieValue = encodeURIComponent(serializedData) + "; expires=" + expirationDate.toUTCString() + "; path=/";

    document.cookie = name + "=" + cookieValue;
}

function logout()
{
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch data from the PHP script
        fetch('login_process.php')
            .then(response => response.json())
            .then(data => {
                console.log(data);
            var userData = {
                    username: "",
                    account_no: "",
                    loggedin: false
                };
    
            var test2 = clearCookie(username, userData, -1);
            })
            .catch(error => console.error('Error:', error));
    });
    
}

