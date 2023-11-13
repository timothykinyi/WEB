<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "bank";
$connection = new mysqli($server, $username, $password, $database);
if ($connection -> connect_error){echo ("connection failed " .$connection -> connect_error);}

$first_name = $_POST['first_name'];
$second_name = $_POST['second_name'];
$username = $_POST['username'];
$email = $_POST['Email'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$file=fopen("accountno.txt","r") or exit("Unable to open file in read!");
$account_number = fgets($file);
$account_number ++;
fclose($file);
$file1=fopen("accountno.txt","w") or exit("Unable to open file in write!");
fwrite($file1, $account_number);
fclose($file1);


$sql = "INSERT INTO users  (first_name, second_name, username, email, password, account_no) 
        VALUES ('$first_name', '$second_name', '$username', '$email', '$hashedPassword', '$account_number')";

if ($connection->query($sql) === true) {
        $servercreated = "localhost";
        $usernamecreated = "root";
        $passwordnew = "";
        $connection_created = new mysqli($servercreated, $usernamecreated, $passwordnew);
            if ($connection_created -> connect_error){echo ("connection failed second " .$connection_created -> connect_error);}
            $database_new = "CREATE DATABASE $account_number;";


            if ($connection_created->query($database_new) === true) {
                
                $servercreated1 = "localhost";
                $usernamecreated1 = "root";
                $passwordnew1 = "";
                $database1 = $account_number;
                $connection_created1 = new mysqli($servercreated, $usernamecreated, $passwordnew, $database1);
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
                $database_table10 = "CREATE TABLE images (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    image_name VARCHAR(255) NOT NULL,
                    image_type VARCHAR(255) NOT NULL,
                    image_data LONGBLOB NOT NULL
                );";
                $database_table11 = "CREATE TABLE notifications (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    messages VARCHAR(255),
                    date timestamp
                    );";
                    if ($connection -> query($database_table11) === true)
                    {        
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
                        echo "Error: " . $database_table10. "<br>" . $connection_created->error;
                    }
                }else {
                    echo "Error11: " . $database_table11 . "<br>" . $connection->error;
                }
} else {
    echo "Error: " . $database_new . "<br>" . $connection_created->error;
}}
else{ echo "Error: " . $sql . "<br>" . $connection->error;}

$connection->close();

?>