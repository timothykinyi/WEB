<?php
session_start();
$database = $_SESSION['account_no'];
$connection = new mysqli("localhost", "root", "",$database);
if($connection->connect_error)
{
    die ("Connection failled " . $connection -> connect_error);
}


$database_table = "CREATE TABLE transactions
(
amount INT,
transactions VARCHAR(50),
account_to_from VARCHAR(30),
balance INT,
dates timestamp
);";
$database_table1 = "CREATE TABLE paybills
(
payee VARCHAR(30),
acc_no VARCHAR(30),
your_acc_no	varchar(30)
);";
$database_table3 = "CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_name VARCHAR(255) NOT NULL,
    image_type VARCHAR(255) NOT NULL,
    image_data LONGBLOB NOT NULL
);";
$database_table4 = "CREATE TABLE beneficiaries (
    id INT AUTO_INCREMENT,
    name VARCHAR(70),
    DOB INT,
    relationship VARCHAR(20)
    );";

if ($connection_created1->query($database_table10) === true)
{
            if ($connection_created1->query($database_table) === true)
            {
                if ($connection_created1->query($database_table1) === true)                          
            {
                $servercreated2 = "localhost";
                $usernamecreated2 = "root";
                $passwordnew2 = "";
                $database2 = $account_number;
                $connection_created2 = new mysqli($servercreated2, $usernamecreated2, $passwordnew2, $database2);
                $database_table2 = "INSERT INTO transactions (transactions, balance) VALUE('start','0')";
                if ($connection_created2->query($database_table2) === true) {
                echo "Registration successful. <a href='index.php'>Login</a>";
                }
                else {
                    echo "Error3: " . $database_table2 . "<br>" . $connection_created1->error;
                }
            }
            else {
                echo "Error2: " . $database_table1 . "<br>" . $connection_created1->error;
            }
        }
            else {
                echo "Error2: " . $database_table . "<br>" . $connection_created1->error;
            }

} else {
echo "Error: " . $database_new . "<br>" . $connection_created->error;
}

?>