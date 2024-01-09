<?php
if (isset($_POST['submitButton'])) {

    mk();
}
else if (isset($_POST['loan_Accept'])) {

    loan_acc();
}
else if (isset($_POST['loan_Decline'])) {

    loan_dec();
}
else if (isset($_POST['credit_card_accept'])) {

    card_acc();
}
else if (isset($_POST['credit_card_decline'])) {

    card_dec();
}
else if (isset($_POST['Witdraw'])) {
    Witdraw();
}
else if (isset($_POST['Deposit'])) {
    Deposit();
}

function mk()
{
    session_start();

    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$result");
    }
    $id =$_POST["id"];

    $query = "DELETE FROM Customer_Support WHERE id = $id";
    $result = $db->query($query);
    if($result === true)
    {   
            header("Location: superadmin.php");
    }else
    { 
        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$result");
    }
}


function loan_acc()
{
    session_start();

    $account = $_POST["account_no"];
    $amount = $_POST["amount"];
    $repayment_period = $_POST["period"];
    $db = new mysqli("localhost","root","",$account);
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $id =$_POST["id"];
    $queryz1 = "INSERT INTO `notifications`(messages) VALUE('<br><strong>Loan Application</strong><br>Your loan application was accepted')";
        if ($db->query($queryz1)=== true) {
            $connection2 = new mysqli("localhost", "root", "","bank");
            if ($connection2->connect_error)
            { die("Connection failed: " .$connection2->connect_error ); }
            
            $query = "DELETE FROM loan_appl WHERE id = $id";
            $result = $connection2->query($query);
            if($result === true)
            {   
                if(loantable ($account , $amount, $repayment_period))
                {  
                    if (loandepo ($account , $amount))
                    {
                        $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Loan accepted";
                        header("Location: superadmin.php?error=$nres");
                    }
                    else
                    {
                        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>can't send loan money to recepient";
                        header("Location: superadmin.php?error=$nres");
                    
                    }
                }else
                {
                    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>can't send loan money to recepient";
                    header("Location: superadmin.php?error=$nres");
                }
            }else
            { 
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }

            $connection->close();
            }
            else {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }
    }


function loan_dec()
{
    session_start();

    $account = $_POST["account_no"];
    $db = new mysqli("localhost","root","",$account);
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $id =$_POST["id"];
    $queryz1 = "INSERT INTO `notifications`(messages) VALUE('<br><strong>Loan Application</strong><br>Your loan application was declined')";
        if ($db->query($queryz1)=== true) {
            $connection2 = new mysqli("localhost", "root", "","bank");
            if ($connection2->connect_error)
            { die("Connection failed: " .$connection2->connect_error ); }
            
            $query = "DELETE FROM loan_appl WHERE id = $id";
            $result = $connection2->query($query);
            if($result === true)
            {   
                $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Loan declined ";
                header("Location: superadmin.php?error=$nres");
            }else
            { 
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }

            $connection->close();
            }
            else {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }
}

function card_acc()
{
    session_start();

    $account = $_POST["accountno"];
    $db = new mysqli("localhost","root","",$account);
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $id =$_POST["id"];
    $queryz1 = "INSERT INTO `notifications`(messages) VALUE('<br><strong>Credit Card  Application </strong><br>Your credit card  application was accepted. Pick your credit card at the nearest Branch')";
        if ($db->query($queryz1)=== true) {
            $connection2 = new mysqli("localhost", "root", "","bank");
            if ($connection2->connect_error)
            {         
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres"); }
            
            $query = "DELETE FROM creadit_appl WHERE id = $id";
            $result = $connection2->query($query);
            if($result === true)
            {   
                if (cardtable ($account))
                {
                    $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Credit card aproved";
                    header("Location: superadmin.php?error=$nres");
                }
                else
                {
                    
                    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Can't create credit teble";
                    header("Location: superadmin.php?error=$nres");
                }
                
            }else
            { 
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }

            $connection->close();
            }
            else {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }
}


function card_dec()
{
    session_start();

    $account = $_POST["accountno"];
    $db = new mysqli("localhost","root","",$account);
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $id =$_POST["id"];
    $queryz1 = "INSERT INTO `notifications`(messages) VALUE('<br><strong>Credit Card  Application </strong><br>Your credit card application was declined')";
        if ($db->query($queryz1)=== true) {
            $connection2 = new mysqli("localhost", "root", "","bank");
            if ($connection2->connect_error)
            {                 
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres"); }
            
            $query = "DELETE FROM creadit_appl WHERE id = $id";
            $result = $connection2->query($query);
            if($result === true)
            {   
                $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Credit card applcation declined ";
                header("Location: superadmin.php?error=$nres");
            }else
            { 
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }

            $connection->close();
            }
            else {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }
}

function loandepo ($account , $amount)
{
    session_start();
    date_default_timezone_set('Africa/Nairobi');
    $currentDateTime = date('Y-m-d H:i:s');
    $connection = new mysqli("localhost","root","",$account);
    if ($connection ->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

        $sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
        $result0 = $connection->query($sql0);

        while ($row0 = $result0->fetch_assoc())
        {
        $bal = $row0['balance'];
        }

            $newbal = $bal + $amount;
            $sql1 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
                VALUE('$amount', 'loan deposite', 'BAZE BANK', '$newbal')";          
            $sql2 = "UPDATE transactions SET  balance = $newbal WHERE transactions = 'start'";

            $message ="Confirmed. Ksh" . $amount." received from BAZE BANK on " . $currentDateTime." for your loan. New balance is " . $newbal.".";
            $query = "INSERT INTO `notifications`(messages) VALUE('$message')";
            
            if ($connection->query($query)=== true) {
            
                }
                else {
                    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                    header("Location: superadmin.php?error=$nres");
                }
            // deposited account data
            $server1 = "localhost";
            $username1 = "root";
            $password1 = "";
            $database1 = "THEBANK";
            $connection1 = new mysqli($server1,$username1,$password1,$database1);
            if ($connection1 ->connect_error)
            {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }

            $sql3 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
            $result3 = $connection1->query($sql3);
            while ($row3 = $result3-> fetch_assoc())
            {
            $bal2 = $row3['balance'];
            }
            $newbal2 = $bal2 - $amount;
            $sql4 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
                    VALUE('$amount', 'loan out', '$account', '$newbal2');";
            $sql5 = "UPDATE transactions SET  balance = $newbal2 WHERE transactions = 'start'";

            if($connection->query($sql1) === true)
            {
                if($connection->query($sql2) === true)
                {
                    if($connection1->query($sql4) === true)
                    {
                        if($connection1->query($sql5) === true)
                        {   
                            $_SESSION['balance'] = $newbal;
                            return true;
                        }else
                        { 
                            return false;
                        }
                
                    }else
                    { 
                        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                        header("Location: superadmin.php?error=$nres");
                    }
                }else
                { 
                    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                    header("Location: superadmin.php?error=$nres");
                }

            }else
            { 
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }

}

function loantable ($account, $amount, $repayment_period)
{
    session_start();
    $database = $_SESSION['account_no'];
    $connection = new mysqli("localhost","root","",$account);
    if($connection->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $rate = 0;

    $loan_table = "CREATE TABLE IF NOT EXISTS loans
    (
    amount INT,
    transactions VARCHAR(50),
    account_to_from VARCHAR(30),
    loanbalance INT,
    repayment_period INT,
    rate INT,
    dates timestamp
    );";

        if ($connection->query($loan_table) === true)
        {
            $database_table3 = "INSERT INTO loans (transactions, loanbalance, repayment_period, rate) VALUE('start','0' , '$repayment_period' , '$rate')";
            if ($connection->query($database_table3) === true) {

                $database_table2 = "UPDATE loans SET  loanbalance = $amount WHERE transactions = 'start'";
                if ($connection->query($database_table2) === true) {
                return true;
                }
                else {
                    echo "Error3: " . $database_table2 . "<br>" . $connection->error;
                    return false ;
                }
            }
            else {
                echo "Error3: " . $database_table3 . "<br>" . $connection->error;
                return false ;
            }
        }
        else {
            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
            header("Location: superadmin.php?error=$nres");
        }
}


function cardtable ($account)
{
    session_start();
    $connection = new mysqli("localhost","root","",$account);
    if($connection->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $creditlimit = 100000;

    $loan_table = "CREATE TABLE IF NOT EXISTS credit_card
    (
    amount INT,
    transactions VARCHAR(50),
    account_to_from VARCHAR(30),
    balance INT,
    creditlimit INT,
    dates timestamp
    );";

        if ($connection->query($loan_table) === true)
        {
                $database_table2 = "INSERT INTO credit_card (transactions, balance, creditlimit) VALUE('start','0' , '$creditlimit')";
                if ($connection->query($database_table2) === true) {
                return true;
                }
                else {
                    echo "Error3: " . $database_table2 . "<br>" . $connection->error;
                    return false ;
                }

        }
        else {
            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
            header("Location: superadmin.php?error=$nres");
        }
}


function Witdraw()
{
    $myacc = 'THEBANK';
    $account = $_POST["number"];
    $amount =$_POST["amount"];
    session_start();
    date_default_timezone_set('Africa/Nairobi');
    $currentDateTime = date('Y-m-d H:i:s');
    $connection = new mysqli("localhost","root","",$account);
    if ($connection ->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Account doesn't exist ";
        header("Location: teller.php?error=$nres");
    }

        $sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
        $result0 = $connection->query($sql0);

        while ($row0 = $result0->fetch_assoc())
        {
        $bal = $row0['balance'];
        }
        if ($bal >= $amount)
        {
            $newbal = $bal - $amount;
            $sql1 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
                VALUE('$amount', 'Bank Withdraw', 'BAZE BANK', '$newbal')";          
            $sql2 = "UPDATE transactions SET  balance = $newbal WHERE transactions = 'start'";

            $message ="Confirmed you have Withdrawn  Ksh" . $amount."  from BAZE BANK on " . $currentDateTime.". New balance is " . $newbal.".";
            $query = "INSERT INTO `notifications`(messages) VALUE('$message')";
            
            if ($connection->query($query)=== true) {
            
                }
                else {
                    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                    header("Location: teller.php?error=$nres");
                }
            // deposited account data
            $server1 = "localhost";
            $username1 = "root";
            $password1 = "";
            $database1 = "THEBANK";
            $connection1 = new mysqli($server1,$username1,$password1,$database1);
            if ($connection1 ->connect_error)
            {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Account doesn't exist";
                header("Location: teller.php?error=$nres");
            }

            $sql3 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
            $result3 = $connection1->query($sql3);
            while ($row3 = $result3-> fetch_assoc())
            {
            $bal2 = $row3['balance'];
            }
            $newbal2 = $bal2 - $amount;
            $sql4 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
                    VALUE('$amount', 'user withdrawn', '$account', '$newbal2');";
            $sql5 = "UPDATE transactions SET  balance = $newbal2 WHERE transactions = 'start'";

            if($connection->query($sql1) === true)
            {
                if($connection->query($sql2) === true)
                {
                    if($connection1->query($sql4) === true)
                    {
                        if($connection1->query($sql5) === true)
                        {   
                            $con = new mysqli("localhost", "root", "","bank");
                            if ($con->connect_error) {die("Connection failed: " . $con->connect_error);}
                            $sq = "INSERT INTO `daily_transactions`(`amount`, `description`) VALUES ('$amount','teller withdrawn')";
                            if ($res = $con->query($sq))
                            {
                                $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Witdrown succesfully";
                                header("Location: teller.php?error=$nres");
                            }
                            else
                            {
                                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>not recorded";
                                header("Location: teller.php?error=$nres");
                            }
                        }else
                        { 
                            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                            header("Location: teller.php?error=$nres");
                            
                        }
                
                    }else
                    { 
                        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                        header("Location: teller.php?error=$nres");
                    }
                }else
                { 
                    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                    header("Location: teller.php?error=$nres");
                }

            }else
            { 
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: teller.php?error=$nres");
            }
        }
        else
        {
            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Your account balance is too low to complete this transaction ";
            header("Location: teller.php?error=$nres");
        }
}


function Deposit()
{

    $myacc = 'THEBANK';
    $account = $_POST["number"];
    $amount =$_POST["amount"];
    session_start();
    date_default_timezone_set('Africa/Nairobi');
    $currentDateTime = date('Y-m-d H:i:s');
    $connection = new mysqli("localhost","root","",$account);
    if ($connection ->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Account doesn't exist";
        header("Location: teller.php?error=$nres");
    }

        $sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
        $result0 = $connection->query($sql0);

        while ($row0 = $result0->fetch_assoc())
        {
        $bal = $row0['balance'];
        }

            $newbal = $bal + $amount;
            $sql1 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
                VALUE('$amount', 'Bank Deposite', 'BAZE BANK', '$newbal')";          
            $sql2 = "UPDATE transactions SET  balance = $newbal WHERE transactions = 'start'";

            $message ="Confirmed you deposited  Ksh" . $amount." at BAZE BANK on " . $currentDateTime.". New balance is " . $newbal.".";
            $query = "INSERT INTO `notifications`(messages) VALUE('$message')";
            
            if ($connection->query($query)=== true) {
            
                }
                else {
                    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                    header("Location: teller.php?error=$nres");
                }
            // deposited account data
            $server1 = "localhost";
            $username1 = "root";
            $password1 = "";
            $database1 = "THEBANK";
            $connection1 = new mysqli($server1,$username1,$password1,$database1);
            if ($connection1 ->connect_error)
            {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: teller.php?error=$nres");
            }

            $sql3 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
            $result3 = $connection1->query($sql3);
            while ($row3 = $result3-> fetch_assoc())
            {
            $bal2 = $row3['balance'];
            }
            $newbal2 = $bal2 + $amount;
            $sql4 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
                    VALUE('$amount', 'User Deposit', '$account', '$newbal2');";
            $sql5 = "UPDATE transactions SET  balance = $newbal2 WHERE transactions = 'start'";

            if($connection->query($sql1) === true)
            {
                if($connection->query($sql2) === true)
                {
                    if($connection1->query($sql4) === true)
                    {
                        if($connection1->query($sql5) === true)
                        {   
                            $con = new mysqli("localhost", "root", "","bank");
                            if ($con->connect_error) {die("Connection failed: " . $con->connect_error);}
                            $sq = "INSERT INTO `daily_transactions`(`amount`, `description`) VALUES ('$amount','teller deposit')";
                            if ($res = $con->query($sq))
                            {
                                $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Deposited succesfully ";
                                header("Location: teller.php?error=$nres");
                            }
                            else
                            {
                                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Not recorded ";
                                header("Location: teller.php?error=$nres");
                            }
                        }else
                        { 
                            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                            header("Location: teller.php?error=$nres");
                            
                        }
                
                    }else
                    { 
                        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                        header("Location: teller.php?error=$nres");
                    }
                }else
                { 
                    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                    header("Location: teller.php?error=$nres");
                }

            }else
            { 
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: teller.php?error=$nres");
            }

}
?>
