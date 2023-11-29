<?php
if (isset($_POST['freezeAccount'])) {
    freezeAccount();
}
else if (isset($_POST['unfreezeAccount'])) {
    unfreezeAccount();
}
else if (isset($_POST['viewAccountDetails'])) {
    viewAccountDetails();
}
else if (isset($_POST['updateSystemSettings'])) {
    updateSystemSettings();
}
else if (isset($_POST['adminpassword'])) {
    admin();
}


function viewAccountDetails()
{
    session_start();
    $accno = $_POST["acc_no"];
    setcookie("view", $accno, time() + 31536000, "/");

    header("Location: superadmin.php");

}


function unfreezeAccount()
{
    $connection2 = new mysqli("localhost", "root", "","bank");
    if ($connection2->connect_error)
    { die("Connection failed: " .$connection2->connect_error ); }
    $accno = $_POST["acc_no"];
    $sql = "UPDATE `users` SET `status`='Active' WHERE account_no = '$accno'";
    $result = $connection2->query($sql);
    
    if ($result === true) {
        header("Location: superadmin.php");
        }
        else {
            echo "Error3: " . $sql . "<br>" . $connection2->error;
        }
}

function freezeAccount()
{
    $connection2 = new mysqli("localhost", "root", "","bank");
    if ($connection2->connect_error)
    { die("Connection failed: " .$connection2->connect_error ); }
    $accno = $_POST["acc_no"];
    $sql = "UPDATE `users` SET `status`='Frozen' WHERE account_no = '$accno'";
    $result = $connection2->query($sql);
    
    if ($result === true) {
        header("Location: superadmin.php");
        }
        else {
            echo "Error3: " . $sql . "<br>" . $connection2->error;
        }
}

function updateSystemSettings()
{
    $connection2 = new mysqli("localhost", "root", "","bank");
    if ($connection2->connect_error)
    { die("Connection failed: " .$connection2->connect_error ); }
    $interestRate = $_POST["interestRate"];
    $transactionLimit = $_POST["transactionLimit"];
    $transactioncost = $_POST["feeStructure"];
    $sql = "UPDATE `tSettings` SET `interestRate`='$interestRate' , `transactionLimit`='$transactionLimit' , `transactioncost`='$transactioncost' WHERE id = 1";
    $result = $connection2->query($sql);
    
    if ($result === true) {
        header("Location: superadmin.php");
        }
        else {
            echo "Error3: " . $sql . "<br>" . $connection2->error;
        }
}

function admin()
{
    session_start();
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        die("Connection failed: " .$db->connect_error );
    }

    $currentpassword =$_POST["current-password"];
    $newpassword =$_POST["new-password"];
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
    if (isset($_COOKIE['adm_no'])) {
        $account_no = $_COOKIE['adm_no'];
    } else {
        $res = "Cookie not set. ";
        header("Location: error.php?error=$res");
    }


    $sql1 = "SELECT * FROM admnusers WHERE adm_no='$account_no'";
    $result = $db->query($sql1);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passwrd = $row['password'];
        }
    } else {
        $res = "Failed try again ";
        header("Location: error.php?error=$res");
    }
    if(password_verify($currentpassword , $passwrd)) 
    {    
    $query = "UPDATE `admnusers` SET `password`='$hashedPassword' WHERE adm_no = '$account_no'";
    $result = $db->query($query);
    if($result === true)
    {   
        header("Location: superadmin.php");
    }else
    { 
        $res = "Failed try again ";
        header("Location: error.php?error=$res");
    }}else{
        $res = "Current password entered is wrong ";
        header("Location: error.php?error=$res");
    }
}
?>