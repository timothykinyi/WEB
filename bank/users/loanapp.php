<?php
if (isset($_POST['loanapp'])) {
    loanapp();
}
else if (isset($_POST['creditapp'])) {
    creditapp();
}
else if (isset($_POST['savings'])) {
    savings();
}
else if (isset($_POST['save_for_goal'])) {
    save_for_goal();
}
else if (isset($_POST['retirementsaving'])) {
    retirementsaving();
}
else if (isset($_POST['Budgetplan'])) {
    Budgetplan();
}
else if (isset($_POST['DeleteBudgetplan'])) {
    DeleteBudgetplan();
}
else if (isset($_POST['AddBeneficiary'])) {
    AddBeneficiary();
}
else if (isset($_POST['delBeneficiary'])) {
    delBeneficiary();
}

function loanapp()
{
    session_start();
    $connection = new mysqli("localhost", "root", "","bank");
    if($connection -> connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Application failed try again ! ";
        header("Location: accact.php?error=$res");
    }
    
    $ltype= $_POST["loan-type"];
    $employmentstatus= $_POST["employment-status"];
    $amount = $_POST["loan-amount"];
    $comment = $_POST["comments"];
    $period = $_POST["period"];
    $accountno = $_SESSION['account_no'];
    $status = "waiting";
    $sql = "INSERT INTO loan_appl (ltype, employmentstatus, amount, period, account_no , comment, status)
                                     VALUES('$ltype','$employmentstatus','$amount' , '$period' ,'$accountno','$comment' ,'$status')";
    $result = $connection->query($sql);
    
    if ($result === true) {

        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Successful.";
        header("Location: accact.php?error=$res");
        }
        else {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Application failed try again ! ";
            header("Location: accact.php?error=$res");
        }
    $connection->close();
    
}

function creditapp()
{
    session_start();
    $connection = new mysqli("localhost", "root", "","bank");
    if($connection -> connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Application failed try again ! ";
        header("Location: accact.php?error=$res");
    }
    
    $name= $_POST["full-name"];
    $email= $_POST["email"];
    $annualincome = $_POST["income"];
    $creditscore = $_POST["credit-score"];
    $accountno = $_SESSION['account_no'];
    $status = "waiting";
    $sql = "INSERT INTO creadit_appl (name, email,annualincome, creditscore, accountno , status )
                                     VALUES('$name','$email','$annualincome' ,'$creditscore' ,'$accountno' ,'$status')";
    $result = $connection->query($sql);
    
    if ($result === true) {
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Application succesful ";
        header("Location: accact.php?error=$res");
        }
        else {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Application failed try again ! ";
            header("Location: accact.php?error=$res");
        }
    $connection->close();
    
}

function savings()
{
    session_start();
    $database = $_SESSION['account_no'];
    $connection = new mysqli("localhost", "root", "",$database);
    if($connection -> connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
        header("Location: accact.php?error=$res");
    }
    $goal_name = $_POST["goal-name"];
    $amount= $_POST["goal-amount"];
    $currentamount = 0;


    $sql = "INSERT INTO saving (goal_name, amount, currentamount) VALUES('$goal_name','$amount','$currentamount')";
    $result = $connection->query($sql);

    if ($result === true) {
        $_SESSION['account_no'] = $database;
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Succesfully added";
        header("Location: accact.php?error=$res");
        }
        else {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
            header("Location: accact.php?error=$res");
        }
    $connection->close();
}

function save_for_goal()
{
    session_start();
    date_default_timezone_set('Africa/Nairobi');
    $currentDateTime = date('Y-m-d H:i:s');
    
    session_start();
    $accountno = $_SESSION['account_no'];
    $connection = new mysqli("localhost", "root", "",$accountno);
    if($connection -> connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
        header("Location: accact.php?error=$res");
    }
    $goal_name = $_POST["goal-name"];
    $amount= $_POST["goal-amount"];
    
    $transact = "saving";
    
    $sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
    $result0 = $connection->query($sql0);
    
    while ($row0 = $result0->fetch_assoc())
    {
    $bal = $row0['balance'];
    }
    if ($bal < $amount)
    {
        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>The account balance is to low to complete this transaction!";
        header("Location: accact.php?error=$result");
    }else
    {
        $newbal = $bal - $amount;
        $sql1 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
            VALUE('$amount', '$transact', '$accountno', '$newbal')";          
        $sql2 = "UPDATE transactions SET  balance = $newbal WHERE transactions = 'start'";
        $message ="Confirmed. Ksh " . $amount." sent to your saving account for ".$goal_name." on " . $currentDateTime.". New balance is " . $newbal.". Transaction cost, Ksh0.00.";
        $query = "INSERT INTO `notifications`(messages) VALUE('$message')";
        
    
        // deposited account data
        $sql3 = "SELECT currentamount FROM saving WHERE goal_name = '$goal_name' ";
        $result3 = $connection->query($sql3);
        while ($row3 = $result3-> fetch_assoc())
        {
        $bal2 = $row3['currentamount'];
        }
        $newbal2 = $bal2 + $amount;
        $sql4 =  "UPDATE saving SET  currentamount = $newbal2 WHERE goal_name = '$goal_name'";
    
        if($connection->query($sql1) === true)
        {
            if($connection->query($sql2) === true)
            {
                if($connection->query($sql4) === true)
                {
    
                        if ($connection->query($query)=== true) {}
                        else { echo "Error3: " . $dquery . "<br>" . $connection->error;}
                        $con = new mysqli("localhost", "root", "","bank");
                        if ($con->connect_error) {die("Connection failed: " . $con->connect_error);}
                        $sq = "INSERT INTO `daily_transactions`(`amount`, `description`) VALUES ('$amount','savings')";
                        $res = $con->query($sq);
                        $_SESSION['balance'] = $newbal;
                        $_SESSION['account_no'] = $accountno;
                        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Saved";
                        header("Location: accact.php?error=$res");
            
                }else
                { 
                    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
                    header("Location: accact.php?error=$res");
                }
            }else
            { 
                $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
                header("Location: accact.php?error=$res");
            }
    
        }else
        { 
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
            header("Location: accact.php?error=$res");
        }
    
      }
    $connection->close();
}


function retirementsaving()
{
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
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
        header("Location: accact.php?error=$res");
    }
    $myacc = $_SESSION['account_no'];
    $accountno = $_SESSION['account_no'];
    $amount =$_POST["goal-amount"];
    $transact = "retirement_saving";

        $sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
        $result0 = $connection->query($sql0);

        while ($row0 = $result0->fetch_assoc())
        {
        $bal = $row0['balance'];
        }
        if ($bal < $amount)
        {
            $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>The account balance is to low to complete this transaction!";
            header("Location: accact.php?error=$result");
        }else
        {
            $newbal = $bal - $amount;
            $sql1 = "INSERT INTO transactions (amount, transactions, account_to_from, balance)
                VALUE('$amount', '$transact', '$accountno', '$newbal')";          
            $sql2 = "UPDATE transactions SET  balance = $newbal WHERE transactions = 'start'";

            $message ="Confirmed. Ksh " . $amount." sent to retirement savings account on " . $currentDateTime.". New balance is " . $newbal.". Transaction cost, Ksh0.00.";
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
                    header("Location: accact.php?error=$result");
                }
                else{
                    die("Connection failed: " .$connection1->connect_error );
                }
            }

            $sql3 = "SELECT balance FROM retirementplan WHERE transactions = 'start' ";
            $result3 = $connection1->query($sql3);
            while ($row3 = $result3-> fetch_assoc())
            {
            $bal2 = $row3['balance'];
            }
            $newbal2 = $bal2 + $amount;
            $sql4 = "INSERT INTO retirementplan (amount, transactions, account_to_from, balance)
                    VALUE('$amount', 'retirement_ saving', '$myacc', '$newbal2');";
            $sql5 = "UPDATE retirementplan SET  balance = $newbal2 WHERE transactions = 'start'";

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
                            $con = new mysqli("localhost", "root", "","bank");
                            if ($con->connect_error) {die("Connection failed: " . $con->connect_error);}
                            $sq = "INSERT INTO `daily_transactions`(`amount`, `description`) VALUES ('$amount','Send Money')";
                            $res = $con->query($sq);
                            setcookie("retirementplan", $newbal2, time() + 31536000, "/");
                            $res ="<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>KSH ". $amount ." Saved for retirement";
                            header("Location: accact.php?error=$res");
                        }else
                        { 
                            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
                            header("Location: accact.php?error=$res");
                        }
                
                    }else
                    { 
                        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
                        header("Location: accact.php?error=$res");
                    }
                }else
                { 
                    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
                    header("Location: accact.php?error=$res");
                }

            }else
            { 
                $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ! ";
                header("Location: accact.php?error=$res");
            }

        }

}

function Budgetplan()
{
    session_start();
    $database = $_SESSION['account_no'];
    $connection = new mysqli("localhost", "root", "",$database);
    if($connection -> connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: utilities.php?error=$res");
    }
    $budgetcategory = $_POST["budget-category"];
    $amount= $_POST["budget-amount"];


    $sql = "INSERT INTO budget (budget_name, amount) VALUES('$budgetcategory','$amount')";
    $result = $connection->query($sql);

    if ($result === true) {
        $_SESSION['account_no'] = $database;
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Budget Added";
        header("Location: utilities.php?error=$res");
        }
        else {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
            header("Location: utilities.php?error=$res");
        }
    $connection->close();
}

function DeleteBudgetplan()
{
    session_start();
    $database = $_SESSION['account_no'];
    $connection = new mysqli("localhost", "root", "",$database);
    if($connection -> connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: utilities.php?error=$res");
    }
    $budgetname = $_POST["budgetname"];
    
    
    $sql = "DELETE FROM `budget` WHERE budget_name = '$budgetname'";
    $result = $connection->query($sql);

    if ($result === true) {

        $_SESSION['account_no'] = $database;
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Budget plan deleted ";
        header("Location: utilities.php?error=$res");
        }
        else {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
            header("Location: utilities.php?error=$res");
        }
    $connection->close();

}

function AddBeneficiary()
{

    session_start();
    $database = $_SESSION['account_no'];
    $connection = new mysqli("localhost", "root", "",$database);
    if($connection -> connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: utilities.php?error=$res");
    }
    $name= $_POST["beneficiaryname"];
    $DOB= $_POST["beneficiaryDOB"];
    $relationship = $_POST["beneficiaryrelationship"];
    
    $sql = "INSERT INTO beneficiaries (name, DOB,relationship) VALUES('$name','$DOB','$relationship')";
    $result = $connection->query($sql);
    
    if ($result === true) {
        $_SESSION['account_no'] = $database;
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Beneficiary added successfully.";
        header("Location: utilities.php?error=$res");
        }
        else {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
            header("Location: utilities.php?error=$res");
        }
    $connection->close();
}


function delBeneficiary()
{
    session_start();
    $database = $_SESSION['account_no'];
    $connection = new mysqli("localhost", "root", "",$database);
    if($connection -> connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: utilities.php?error=$res");
    }
    $name= $_POST["bname"];    
    
    $sql = "DELETE FROM `beneficiaries` WHERE name = '$name'";
    $result = $connection->query($sql);

    if ($result === true) {
        
        $_SESSION['account_no'] = $database;
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Beneficiary removed successfully.";
        header("Location: utilities.php?error=$res");
        }
        else {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
            header("Location: utilities.php?error=$res");
        }
    $connection->close();
}

?>
