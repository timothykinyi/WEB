function fetchDataAndPopulateTable() {
    $.ajax({
        url: 'fetch_data.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Clear existing table rows
            $('#adminTable tbody').empty();
  
            // Append new rows based on fetched data
            for (var i = 0; i < data.length; i++) {
                var row = data[i];
                $('#adminTable tbody').append(
                    '<tr>' +
                    '<td>' + row.account_no + '</td>' +
                    '<td>' + row.username + '</td>' +
                    '<td>' + row.email + '</td>' +
                    '</tr>'
                );
            }
        },
        error: function (error) {
            console.log('Error fetching data: ', error);
        }
    });}


    function fetchDataAndPopulateTable() {
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            dataType: 'json',
            data: { action: 'fetchDataFunction' }, // Specify the action parameter
            success: function (data) {
                // Process the data as needed
                console.log(data);
            },
            error: function (error) {
                console.log('Error fetching data: ', error);
            }
        });
    }
    
    // Call another function
    function callAnotherFunction() {
        $.ajax({
            url: 'fetch_data.php',
            type: 'GET',
            dataType: 'json',
            data: { action: 'anotherFunction' }, // Specify the action parameter
            success: function (data) {
                // Process the data as needed
                console.log(data);
            },
            error: function (error) {
                console.log('Error fetching data: ', error);
            }
        });
    }
    