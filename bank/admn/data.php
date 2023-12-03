<?php


$conn = new mysqli("localhost", "root", "","bank");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function fetchData($conn, $query) {
    $result = $conn->query($query);

    $data = array('labels' => array(), 'data' => array());

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data['labels'][] = $row['label'];
            $data['data'][] = (int)$row['value'];
        }
    }

    return $data;
}


$selectMaxIdQuery = "SELECT COUNT(*)AS max_id FROM daily_transactions";
$result = $conn->query($selectMaxIdQuery);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $recentTransactionsData = $row["max_id"];
} else {
    echo "No transactions found.";
}

$totalAccounts = "SELECT COUNT(*) AS max_id FROM users";
$taresult = $conn->query($totalAccounts);

if ($taresult->num_rows > 0) {

    $row = $taresult->fetch_assoc();
    $totalAccountsData = $row["max_id"];
} else {
    echo "No transactions found.";
}


$con = new mysqli("localhost", "root", "","THEBANK");
if ($con->connect_error) {die("Connection failed: " . $con->connect_error);}

$totalAssets = "SELECT balance FROM transactions WHERE transactions = 'start' ";
$totalAssetsresult = $con->query($totalAssets);

if ($totalAssetsresult->num_rows > 0) {

    $row = $totalAssetsresult->fetch_assoc();
    $totalAssetsData = $row["balance"];
} else {
    echo "No transactions found.";
}


$con = new mysqli("localhost", "root", "","bank");
if ($con->connect_error) {die("Connection failed: " . $con->connect_error);}

$active_users_query = "SELECT COUNT(DISTINCT user_id) AS c_user_id  FROM user_activity WHERE activity_type = 'login' ";
$active_users_result = $con->query($active_users_query);

if ($active_users_result->num_rows > 0) {

    $row = $active_users_result->fetch_assoc();
    $active_users_count = $row["c_user_id"];
} else {
    echo "No data found.";
}


$accountCreationQuery = "SELECT label, value FROM account_creation_data";
$accountCreationData = fetchData($conn, $accountCreationQuery);


$transactionVolumeQuery = "SELECT label, value FROM transaction_volume_data";
$transactionVolumeData = fetchData($conn, $transactionVolumeQuery);


$conn->close();

$data = array(
    'totalAssets' => $totalAssetsData,
    'totalAccounts' => $totalAccountsData,
    'recentTransactions' => $recentTransactionsData,
    'userActivity' => $active_users_count,
    'accountCreation' => $accountCreationData,
    'transactionVolume' => $transactionVolumeData,
);


echo json_encode($data);
?>
