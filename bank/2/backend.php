<?php
// Include or require any necessary files or configurations

// Check if it's an AJAX request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // It's an AJAX request

    // Check the action parameter to determine the function to call
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        // Call the corresponding function based on the action
        switch ($action) {
            case 'fetchDataFunction':
                $data = fetchDataFunction();
                break;
            case 'anotherFunction':
                $data = anotherFunction();
                break;
            // Add more cases for other functions as needed
            default:
                $data = ['error' => 'Invalid action parameter.'];
        }

        // Return data as JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        // Missing action parameter
        echo json_encode(['error' => 'Missing action parameter.']);
    }
} else {
    // Not an AJAX request, handle accordingly
    echo "Direct access is not allowed.";
}

// Define the function to fetch data
function fetchDataFunction() {
    // Implement your logic to fetch data from the database or any other source
    // For example:
    $data = array(
        array('account_no' => '123456', 'username' => 'john_doe', 'email' => 'john@example.com'),
        array('account_no' => '789012', 'username' => 'jane_doe', 'email' => 'jane@example.com'),
        // Add more data as needed
    );

    return $data;
}

// Define another function
function anotherFunction() {
    // Implement another function logic here
    $data = array(
        // Another set of data
    );

    return $data;
}
?>
