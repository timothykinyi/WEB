<?php
if (isset($_POST['userpassword'])) {
    user();
}
else if (isset($_POST['agentpassword'])) {
    agent();
}




session_start();

function user()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: index.php?error=$res");
    }

    $newpassword =$_POST["new-password"];
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
    if (isset($_COOKIE['account_no'])) {
        $account_no = $_COOKIE['account_no'];
    } else {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: index.php?error=$res");
    }

 
    $query = "UPDATE `users` SET `password`='$hashedPassword' WHERE account_no = '$account_no'";
    $result = $db->query($query);
    if($result === true)
    {
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Password changed <br> login using new password";
        header("Location: index.php?error=$res");
    }else
    { 
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: index.php?error=$res");
    }
}

function agent()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: agentlogin.php?error=$res");
    }


    $newpassword =$_POST["new-password"];
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
        if (isset($_COOKIE['agent_no'])) 
        {
            $agent_no = $_COOKIE['agent_no'];
        }
        else 
        {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
            header("Location: agentlogin.php?error=$res");
        }

    $query = "UPDATE `agents` SET `password`='$hashedPassword' WHERE account_no = '$agent_no'";
    $result = $db->query($query);
    if($result === true)
    {   
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Password changed <br> login using new password";
        header("Location: agentlogin.php?error=$res");
    }else
    { 
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: agentlogin.php?error=$res");
    }
}

?>