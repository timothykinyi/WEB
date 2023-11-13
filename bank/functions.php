<?php
function connection($dbname)
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = $dbname;
    $connection = new mysqli($server,$username,$password,$database);
    if ($connection ->connect_error)
    {
        die("Connection failed: " .$connection->connect_error );
    }else{
        return $connection;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $from = $_POST["from-currency"];
    $to = $_POST["to-currency"];
    $amount =$_POST["amount"];
    // Call your PHP function and calculate result
    $result = 0;
    $result = conversion($from, $to, $amount);
    header("Location: utilities.php?result=$result");
    exit();
}
function conversion ($from, $to, $amount)
{


$result;
$holding;
$USD_EUR = 0.93;
$USD_GBP = 0.81;
$USD_KSH = 151.55;
    
        if ($from == "USD") {
            $holding = $amount;
        } else if ($from == "EUR") {
            $holding = $amount / $USD_EUR;
        } else if ($from == "GBP") {
            $holding = $amount / $USD_GBP;
        } else if (from == "KSH") {
            $holding = $amount / $USD_KSH;
        }
    
        switch ($to) {
            case "USD":
                $result = $holding;
                break;
            case "EUR":
                $result = $holding * $USD_EUR;
                break;
            case "GBP":
                $result = $holding * $USD_GBP;
                break;
            case "KSH":
                $result = $holding * $USD_KSH;
                break;
        }
         return $result;

}

function deposit ($myacc, $amount){
    $accountno = "THEBANK";
    // deposited account data
    $server1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $database1 = $accountno;
    $connection1 = new mysqli($server1,$username1,$password1,$database1);
    if ($connection1 ->connect_error)
    {
        die("Connection failed: " .$connection1->connect_error );
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

            if($connection1->query($sql4) === true)
            {
                if($connection1->query($sql5) === true)
                {   
                    $_SESSION['balance'] = $newbal;
                    header("Location: agentpage.php");
                }else
                { 
                    echo(" transaction failed ".$sql5. "<br>" .$connection1->error );
                }
        
            }else
            { 
                echo(" transaction failed ".$sql4. "<br>" .$connection1->error );
            }
}

function withdraw ($myacc, $amount){
    $accountno = "THEBANK";
    // deposited account data
    $server1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $database1 = $accountno;
    $connection1 = new mysqli($server1,$username1,$password1,$database1);
    if ($connection1 ->connect_error)
    {
        die("Connection failed: " .$connection1->connect_error );
    }

    $sql3 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
    $result3 = $connection1->query($sql3);
    while ($row3 = $result3-> fetch_assoc())
    {
    $bal2 = $row3['balance'];
    }
    $newbal2 = $bal2 - $amount;
    $sql4 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
            VALUE('$amount', 'deposite', '$myacc', '$newbal2');";
    $sql5 = "UPDATE transactions SET  balance = $newbal2 WHERE transactions = 'start'";

            if($connection1->query($sql4) === true)
            {
                if($connection1->query($sql5) === true)
                {   
                    $_SESSION['balance'] = $newbal;
                    header("Location: agentpage.php");
                }else
                { 
                    echo(" transaction failed ".$sql5. "<br>" .$connection1->error );
                }
        
            }else
            { 
                echo(" transaction failed ".$sql4. "<br>" .$connection1->error );
            }
}
?>