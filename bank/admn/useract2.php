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
else if (isset($_POST['adminfirstpassword'])) {
    adminfirstpassword();
}
else if (isset($_POST['adminpasswords'])) {
    adminpasswords();
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
    {   $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres"); }
    $accno = $_POST["acc_no"];
    $two = substr($accno, 0, 2);
    if ($two === "AC")
    {

    $sql = "UPDATE `users` SET `status`='Active' WHERE account_no = '$accno'";
    $result = $connection2->query($sql);
    
    if ($result === true) {
        $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Accout Activated";
        header("Location: superadmin.php?error=$nres");
        }
        else 
        {
            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
            header("Location: superadmin.php?error=$nres");
        }
    }
    else
    {
        $sql1 = "UPDATE `agents` SET `status`='Active' WHERE account_no = '$accno'";
        $result1 = $connection2->query($sql1);
        
        if ($result1 === true) {
            $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Accout Activated";
            header("Location: superadmin.php?error=$nres");
            }
            else {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }
    }
}

function freezeAccount()
{
    $connection2 = new mysqli("localhost", "root", "","bank");
    if ($connection2->connect_error)
    { die("Connection failed: " .$connection2->connect_error ); }
    $accno = $_POST["acc_no"];
    $two = substr($accno, 0, 2);
    if ($two === "AC")
    {
        $sql = "UPDATE `users` SET `status`='Frozen' WHERE account_no = '$accno'";
        $result = $connection2->query($sql);
        
        if ($result === true) {
            $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Account Frozen ";
            header("Location: superadmin.php?error=$nres");
            }
            else 
            {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }
        
    }
    else
    {
        $sql1 = "UPDATE `agents` SET `status`='Frozen' WHERE account_no = '$accno'";
        $result1 = $connection2->query($sql1);
        
        if ($result1 === true) {
            $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Account Frozen ";
            header("Location: superadmin.php?error=$nres");
            }
            else 
            {
                $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
                header("Location: superadmin.php?error=$nres");
            }
    }
}

function updateSystemSettings()
{
    $connection2 = new mysqli("localhost", "root", "","bank");
    if ($connection2->connect_error)
    {                
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }
    $interestRate = $_POST["interestRate"];
    $transactionLimit = $_POST["transactionLimit"];
    $transactioncost = $_POST["feeStructure"];
    $sql = "UPDATE `tSettings` SET `interestRate`='$interestRate' , `transactionLimit`='$transactionLimit' , `transactioncost`='$transactioncost' WHERE id = 1";
    $result = $connection2->query($sql);
    
    if ($result === true) {
        $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>System Updated";
        header("Location: superadmin.php?error=$nres");
        }
        else {
            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
            header("Location: superadmin.php?error=$nres");
        }
}

function admin()
{
    session_start();
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $currentpassword =$_POST["current-password"];
    $newpassword =$_POST["new-password"];
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
    if (isset($_COOKIE['adm_no'])) {
        $account_no = $_COOKIE['adm_no'];
    } else {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Cookie not set. ";
        header("Location: superadmin.php?error=$nres");
    }


    $sql1 = "SELECT * FROM admnusers WHERE adm_no='$account_no'";
    $result = $db->query($sql1);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passwrd = $row['password'];
        }
    } else {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }
    if(password_verify($currentpassword , $passwrd)) 
    {    
    $query = "UPDATE `admnusers` SET `password`='$hashedPassword' WHERE adm_no = '$account_no'";
    $result = $db->query($query);
    if($result === true)
    {   
        $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Password changed ";
        header("Location: superadmin.php?error=$nres");
    }else
    { 
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }}else{
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Current password entered is wrong ";
        header("Location: superadmin.php?error=$nres");
    }
}

function adminfirstpassword()
{
    session_start();
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $newpassword =$_POST["new-password"];
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
    $authCode = generateAuthCode();
    $hashedauthCode = password_hash($authCode, PASSWORD_DEFAULT);
    
    if (isset($_COOKIE['adm_no'])) {
        $account_no = $_COOKIE['adm_no'];
    } else {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Cookie not set. ";
        header("Location: superadmin.php?error=$nres");
    }

 
    $query = "UPDATE `admnusers` SET `password`='$hashedPassword' , `log`='2', `authcode` ='$hashedauthCode' WHERE adm_no = '$account_no'";
    $result = $db->query($query);
    if($result === true)
    {   
        $nres = "Password changed <br> your recovery token is: <br> <strong style='color: red;'>".$authCode."</strong><br>Save it securely this is the only way you can recover your account incase you forget your password. <br><a href='adminlogin.php'>Log in</a>";
        header("Location: pass.php?error=$nres");
    }else
    { 
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Wrong Auth code used ";
        header("Location: superadmin.php?error=$nres");
    }
}

function adminpasswords()
{
    session_start();
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $newpassword =$_POST["new-password"];
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);

    if (isset($_COOKIE['adm_no'])) {
        $account_no = $_COOKIE['adm_no'];
    } else {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Cookie not set. ";
        header("Location: superadmin.php?error=$nres");
    }

 
    $query = "UPDATE `admnusers` SET `password`='$hashedPassword' WHERE adm_no = '$account_no'";
    $result = $db->query($query);
    if($result === true)
    {   
        $nres = "Password changed<br> use your new password to <a href='adminlogin.php'>Log in</a>";
        header("Location: pass.php?error=$nres");
    }else
    { 
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }
}

function generateAuthCode() {
    $bytes = random_bytes(31); // 8 bytes = 64 bits
    return bin2hex($bytes);
}

?>