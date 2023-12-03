<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "bank";
$connection = new mysqli($server, $username, $password, $database);
if ($connection -> connect_error){  
     $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: registration.php?error=$result");}

$first_name = $_POST['first_name'];
$second_name = $_POST['second_name'];
$username = $_POST['username'];
$email = $_POST['Email'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $strongPasswordPattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/';

    if (preg_match($strongPasswordPattern, $password)) {
        

$file=fopen("accountno.txt","r") or exit("Unable to open file in read!");
$account_number = fgets($file);
$account_number ++;
fclose($file);
$file1=fopen("accountno.txt","w") or exit("Unable to open file in write!");
fwrite($file1, $account_number);
fclose($file1);

$authCode = generateAuthCode();
$hashedauthCode = password_hash($authCode, PASSWORD_DEFAULT);
$sql = "INSERT INTO users  (first_name, second_name, username, email, password, account_no, status, authcode) 
        VALUES ('$first_name', '$second_name', '$username', '$email', '$hashedPassword', '$account_number' , 'Active' ,'$hashedauthCode')";

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
                $database_table11 = "CREATE TABLE IF NOT EXISTS notifications (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    messages VARCHAR(255),
                    date timestamp
                    );";

                $saving_table = "CREATE TABLE saving (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    goal_name VARCHAR(70),
                    amount int,
                    currentamount int
                    );";
                $res = $connection_created1 -> query($saving_table);

                $budget_table = "CREATE TABLE budget (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    budget_name VARCHAR(70),
                    amount int
                    );";
                $budgetres = $connection_created1 -> query($budget_table);

                $retirement_table = "CREATE TABLE retirementplan 
                    (
                    amount INT,
                    transactions VARCHAR(50),
                    account_to_from VARCHAR(30),
                    balance INT,
                    dates timestamp
                    );";
                $retirementres = $connection_created1 -> query($retirement_table);

                $beneficiaries_table = "CREATE TABLE beneficiaries (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(70),
                    DOB varchar(50),
                    relationship VARCHAR(20)
                    );";
                $beneficiaries_tableres = $connection_created1 -> query($beneficiaries_table);
                
                if ($beneficiaries_tableres === true)
                {
                    if ($retirementres === true)
                    {
                        if ($budgetres === true)
                        {
                            if ($res === true)
                            {

                                if ($connection_created1 -> query($database_table11) === true)
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
                                                        $database_table3 = "INSERT INTO retirementplan (transactions, balance) VALUE('start','0')";
                                                        if ($connection_created2->query($database_table3) === true) {
                                                            $result = "Registration successful.<br> your recovery token is: <br> <strong style='color: red;'>".$authCode."</strong><br>Save it securely this is the only way you can recover your account incase you forget your password. <br><a href='index.php'>Login</a>";
                                                            header("Location: pass.php?error=$result");
                                                        }
                                                        else {
                                                            $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                                                            header("Location: registration.php?error=$result");
                                                        }
                                                    }
                                                    else {
                                                        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                                                        header("Location: registration.php?error=$result");
                                                    }
                                                }
                                                else {
                                                    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                                                    header("Location: registration.php?error=$result");
                                                }
                                            }
                                            else {
                                                $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                                                header("Location: registration.php?error=$result");
                                            }

                                    } else {
                                        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                                        header("Location: registration.php?error=$result");
                                    }
                                }else {
                                    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                                    header("Location: registration.php?error=$result");
                                }
                            }
                            else {
                                $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                                header("Location: registration.php?error=$result");
                            }
                        }
                        else {
                            $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                            header("Location: registration.php?error=$result");
                        }
                    }
                    else {
                        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                        header("Location: registration.php?error=$result");
                    }
                }
                else {
                    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
                    header("Location: registration.php?error=$result");
                }
} else {
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: registration.php?error=$result");
}}
else{
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: registration.php?error=$result");
}

} else {
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><p>Password should be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one digit.</p>";
    header("Location: registration.php?error=$result");
}
$connection->close();

function generateAuthCode() {
    $bytes = random_bytes(31);
    return bin2hex($bytes);
}
?>