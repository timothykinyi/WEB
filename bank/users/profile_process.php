<?php
session_start();
date_default_timezone_set('Africa/Nairobi');
$currentDateTime = date('Y-m-d H:i:s');

$server = "localhost";
$username = "root";
$password = "";
$database = $_SESSION['account_no'];
$connection = new mysqli($server,$username,$password,$database);
if ($connection ->connect_error)
{
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
    header("Location: profile.php?error=$result");
}
$myacc = $_SESSION['account_no'];
$accountno = $_POST["account-number"];
$amount =$_POST["amount"];
$transact = $_SESSION['transaction'];
if ($accountno === $database)
{
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>You can't send yourself money !";
    header("Location: profile.php?error=$result");
}
else
{
    $sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
    $result0 = $connection->query($sql0);

    while ($row0 = $result0->fetch_assoc())
    {
    $bal = $row0['balance'];
    }
    if ($bal < $amount)
    {
        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>The account balance is to low to complete this transaction!";
        header("Location: profile.php?error=$result");
    }else
    {
        $newbal = $bal - $amount;
        $sql1 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
            VALUE('$amount', '$transact', '$accountno', '$newbal')";          
        $sql2 = "UPDATE transactions SET  balance = $newbal WHERE transactions = 'start'";

        $message ="Confirmed. Ksh" . $amount." sent to " . $accountno." on " . $currentDateTime.". New balance is " . $newbal.". Transaction cost, Ksh0.00.";
        $query = "INSERT INTO `notifications`(messages) VALUE('$message')";
        

        // deposited account data
        $server1 = "localhost";
        $username1 = "root";
        $password1 = "";
        $database1 = $accountno;
        $connection1 = new mysqli($server1,$username1,$password1,$database1);
        if ($connection1 ->connect_error)
        {
            $er = "Unknown database '".$accountno."'";
            if($connection1->connect_error == $er)
            {
                $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Acoount number doesn't exist ! ";
                header("Location: profile.php?error=$result");
            }
            else{
                $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
                header("Location: profile.php?error=$result");
            }
        }

        $sql3 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
        $result3 = $connection1->query($sql3);
        while ($row3 = $result3-> fetch_assoc())
        {
        $bal2 = $row3['balance'];
        }
        $newbal2 = $bal2 + $amount;
        $sql4 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
                VALUE('$amount', 'deposite', '$myacc', '$newbal2');";
        $sql5 = "UPDATE transactions SET  balance = $newbal2 WHERE transactions = 'start'";
        $message1 = "Confirmed.You have received Ksh" . $amount."  from " . $myacc."  on " . $currentDateTime." New balance is " . $newbal2.".";
        $query1 = "INSERT INTO `notifications`(messages) VALUE('$message1')";
        

        if($connection->query($sql1) === true)
        {
            if($connection->query($sql2) === true)
            {
                if($connection1->query($sql4) === true)
                {
                    if($connection1->query($sql5) === true)
                    {   
                        if ($connection->query($query)=== true) {}
                        else { echo "Error3: " . $dquery . "<br>" . $connection->error;}
                        if ($connection1->query($query1)=== true) {}
                        else { echo "Error3: " . $dquery1 . "<br>" . $connection1->error; }
                        $con = new mysqli("localhost", "root", "","bank");
                        if ($con->connect_error) {die("Connection failed: " . $con->connect_error);}
                        $sq = "INSERT INTO `daily_transactions`(`amount`, `description`) VALUES ('$amount','Send Money')";
                        $res = $con->query($sq);
                        $_SESSION['balance'] = $newbal;
                        $result = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Money sent succesfully";
                        header("Location: profile.php?error=$result");
                    }else
                    { 
                        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
                        header("Location: profile.php?error=$result");
                    }
            
                }else
                { 
                    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
                    header("Location: profile.php?error=$result");
                }
            }else
            { 
                $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
                header("Location: profile.php?error=$result");
            }

        }else
        { 
            $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
            header("Location: profile.php?error=$result");
        }

    }
}

?>