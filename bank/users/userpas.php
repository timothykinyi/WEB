<?php
if (isset($_POST['userpassword'])) {
    user();
}
else if (isset($_POST['agentpassword'])) {
    agent();
}
else if (isset($_POST['adminpassword'])) {
    admin();
}
else if (isset($_POST['userusername'])) {
    userusername();
}
else if (isset($_POST['useremail'])) {
    useremail();
}




session_start();

function user()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }

    $currentpassword =$_POST["current-password"];
    $newpassword =$_POST["new-password"];
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
    if (isset($_COOKIE['account_no'])) {
        $account_no = $_COOKIE['account_no'];
    } else {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }


    $sql1 = "SELECT * FROM users WHERE account_no='$account_no'";
    $result = $db->query($sql1);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passwrd = $row['password'];
        }
    } else {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }
    if(password_verify($currentpassword , $passwrd)) 
    {    
    $query = "UPDATE `users` SET `password`='$hashedPassword' WHERE account_no = '$account_no'";
    $result = $db->query($query);
    if($result === true)
    {
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Password changed ";
        header("Location: profile.php?error=$res");
    }else
    { 
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }}else
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Current password entered is wrong ";
        header("Location: profile.php?error=$res");
    }
}

function agent()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: agentpage.php?error=$res");
    }

    $currentpassword =$_POST["current-password"];
    $newpassword =$_POST["new-password"];
    $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
        if (isset($_COOKIE['agent_no'])) 
        {
            $agent_no = $_COOKIE['agent_no'];
        }
        else 
        {
            $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
            header("Location: agentpage.php?error=$res");
        }

    $sql1 = "SELECT * FROM agents WHERE account_no ='$agent_no'";
    $result = $db->query($sql1);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passwrd = $row['password'];
        }
    } else {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: agentpage.php?error=$res");
    }
    if(password_verify($currentpassword , $passwrd)) 
    {    
    $query = "UPDATE `agents` SET `password`='$hashedPassword' WHERE account_no = '$agent_no'";
    $result = $db->query($query);
    if($result === true)
    {   
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Password changed ";
        header("Location: agentpage.php?error=$res");
    }else
    { 
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: agentpage.php?error=$res");
    }}else{
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Current password entered is wrong ";
        header("Location: agentpage.php?error=$res");
    }
}

function useremail()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }

    $currentpassword =$_POST["current-password"];
    $newpassword =$_POST["new-password"];
    if (isset($_COOKIE['account_no'])) {
        $account_no = $_COOKIE['account_no'];
    } else {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }


    $sql1 = "SELECT * FROM users WHERE account_no='$account_no'";
    $result = $db->query($sql1);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passwrd = $row['password'];
        }
    } else {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }
    if(password_verify($currentpassword , $passwrd)) 
    {    
    $query = "UPDATE `users` SET `email`='$newpassword' WHERE account_no = '$account_no'";
    $result = $db->query($query);
    if($result === true)
    {
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Email changed ";
        header("Location: profile.php?error=$res");
    }else
    { 
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }}else
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Password entered is wrong ";
        header("Location: profile.php?error=$res");
    }
}


function userusername()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }

    $currentpassword =$_POST["current-password"];
    $newpassword =$_POST["new-password"];

    if (isset($_COOKIE['account_no'])) {
        $account_no = $_COOKIE['account_no'];
    } else {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }


    $sql1 = "SELECT * FROM users WHERE account_no='$account_no'";
    $result = $db->query($sql1);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $passwrd = $row['password'];
        }
    } else {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }   
    if(password_verify($currentpassword , $passwrd)) 
    {    
    $query = "UPDATE `users` SET `username`='$newpassword' WHERE account_no = '$account_no'";
    $result = $db->query($query);
    if($result === true)
    {
        session_start();
        $_SESSION['username'] = $newpassword;
        $res = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>Username changed ";
        header("Location: profile.php?error=$res");
    }else
    { 
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again ";
        header("Location: profile.php?error=$res");
    }}else
    {
        $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Password entered is wrong ";
        header("Location: profile.php?error=$res");
    }
}
?>