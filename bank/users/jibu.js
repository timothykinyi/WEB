function completeTransaction() {
    $.ajax({
        url: 'bill _payer.php',
        type: 'POST',
        dataType: 'json',
        data: {
            // Your POST data here
        },
        success: function (response) {
            if (response.status === 'success') {
                showPopup('Success: ' + response.message);
            } else {
                showPopup('Error: ' + response.message);
            }
        },
        error: function (error) {
            showPopup('Error during transaction: ' + error.statusText);
        }
    });
}

function showPopup(message) {
    alert(message);
    // You can replace the alert with your custom pop-up/modal logic
}

completeTransaction();
