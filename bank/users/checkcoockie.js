document.addEventListener('DOMContentLoaded', function () {
    // Fetch data from the PHP script
    fetch('login_process.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
        
        var username= data.username.toLocaleString();
        
        var test =  checkCookieAndRedirect(username);

        })
        .catch(error => console.error('Error:', error));
});


function checkCookieAndRedirect(cookieName) {
    var cookieValue = getCookie(cookieName);

    if (cookieValue !== null) {
        var userData = JSON.parse(cookieValue);

        if (userData && userData.loggedin === true) {

        } else {

            window.location.href = 'index.php';
        }
    } else {
        window.location.href = 'index.php';
    }
}

function getCookie(name) {
    var cookies = document.cookie.split("; ");
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].split("=");
        if (cookie[0] === name) {
            // Decode the cookie value
            return decodeURIComponent(cookie[1]);
        }
    }
    return null;
}


