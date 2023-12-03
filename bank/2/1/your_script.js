function completeTransaction() {
    // Collect data from the form
    var formData = {
        'account-number': $('#account-number').val(),
        'paye': $('#paye').val(),
        'payee': $('#paye').val(),
        'amount': $('#amount').val()

        // Add more fields as needed
    };

    // Make an AJAX request to the PHP script
    $.ajax({
        url: 'bill _payer.php',
        type: 'POST',
        dataType: 'json',
        data: formData,
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
