<?php
session_start();
date_default_timezone_set('Africa/Nairobi');
$currentDateTime = date('Y-m-d H:i:s');

$server = "localhost";
$username = "root";
$password = "";
$database = $_SESSION['agaccount_no'];
$connection = new mysqli($server,$username,$password,$database);
if ($connection ->connect_error)
{
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>Failed Try again ";
    header("Location: agentpage.php?error=$result");
}
$myacc = $_SESSION['agaccount_no'];
$accountno = $_POST["number"];
$amount =$_POST["amount"];

if ($accountno === $myacc)
{
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>You can't send yourself money!";
    header("Location: agentpage.php?error=$result");
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
        $result1 = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>The account balance is to low to complete this transaction!";
        header("Location: agentpage.php?error=$result1");
    }else
    {
        $newbal = $bal - $amount;
        $sql1 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
            VALUE('$amount', 'depo', '$accountno', '$newbal')";          
        $sql2 = "UPDATE transactions SET  balance = $newbal WHERE transactions = 'start'";
        $message = "Confirmed. On ". $currentDateTime." you took Ksh" . $amount." cash from " . $accountno." New balance is Ksh " . $newbal.".";
        $queryz = "INSERT INTO `notifications`(messages) VALUE('$message')";
        if ($connection->query($queryz)=== true) {
        
            }
            else {
                $result1 = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>Failed Try again ";
                header("Location: agentpage.php?error=$result1");
            }
        // deposited account data
        $server1 = "localhost";
        $username1 = "root";
        $password1 = "";
        $database1 = $accountno;
        $connection1 = new mysqli($server1,$username1,$password1,$database1);
        if ($connection1 ->connect_error)
        {
            $result1= "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>The account number entered doesn't exist !";
            header("Location: agentpage.php?error=$result1");
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
        $message1 = "Confirmed. On ". $currentDateTime." you gave Ksh" . $amount." cash to " . $myacc." New balance is Ksh " . $newbal2.".";
        $queryz1 = "INSERT INTO `notifications`(messages) VALUE('$message1')";

        if($connection->query($sql1) === true)
        {
            if($connection->query($sql2) === true)
            {
                if($connection1->query($sql4) === true)
                {
                    if($connection1->query($sql5) === true)
                    {   
                        if ($connection1->query($queryz1)=== true) 
                        {}else { echo "Error3: " . $dqueryz1 . "<br>" . $connection1->error; }
                        
                        $con = new mysqli("localhost", "root", "","bank");
                        if ($con->connect_error) {die("Connection failed: " . $con->connect_error);}
                        $sq = "INSERT INTO `daily_transactions`(`amount`, `description`) VALUES ('$amount','Agent deposit')";
                        $res = $con->query($sq);
                        $_SESSION['agbalance'] = $newbal;
                        $result = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Transaction succesful";
                        header("Location: agentpage.php?error=$result");
                    }else
                    { 
                        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>Failed Try again ";
                        header("Location: agentpage.php?error=$result");
                    }
            
                }else
                { 
                    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>Failed Try again ";
                    header("Location: agentpage.php?error=$result");
                }
            }else
            { 
                $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>Failed Try again ";
                header("Location: agentpage.php?error=$result");
            }

        }else
        { 
            $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><br>Failed Try again ";
            header("Location: agentpage.php?error=$result");
        }

    }
}
?>