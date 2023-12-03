<?php
if (isset($_POST['adduser'])) {
    adduser();
}
else if (isset($_POST['modifyuser'])) {
    modifyuser();
}
else if (isset($_POST['deactivateUser'])) {
    deactivateUser();
}
else if (isset($_POST['activateUser'])) {
    activateUser();
}
else if (isset($_POST['RemoveUser'])) {
    RemoveUser();
}

function adduser()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $Reg_NO = $_POST["Reg_NO"];
    $role = $_POST["role"];
    $Email = $_POST["Email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    

    $addnewuser = "INSERT INTO admnusers (first_name, second_name, adm_no, role , email , password ,status, log)
    VALUE('$first_name', '$second_name', '$Reg_NO', '$role' , '$Email', '$hashedPassword' ,'Active') ,'1';";

    if($db->query($addnewuser) === true)
    {   
        if (makedb($Reg_NO) === true)
        {
            $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>User added succesfully";
            header("Location: superadmin.php?error=$nres");
        }else
        {
            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
            header("Location: superadmin.php?error=$nres");
        }
        
    }else
    { 
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again. <br> look out for the following: <br>1. Dublicate registration number. <br>2. Dublicate email. ";
        header("Location: superadmin.php?error=$nres");
    }

}

function modifyuser()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $Reg_NO = $_POST["Reg_NO"];
    $role = $_POST["role"];

    $modifyuser = "UPDATE admnusers SET  role = '$role' WHERE adm_no = '$Reg_NO'";

    if($db->query($modifyuser) === true)
    {   
        $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>User modified ";
        header("Location: superadmin.php?error=$nres");
    }else
    { 
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }


}

function deactivateUser()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $Reg_NO = $_POST["Reg_NO"];

    $deactivateUser = "UPDATE admnusers SET  status = 'Deactivated' WHERE adm_no = '$Reg_NO'";

    if($db->query($deactivateUser) === true)
    {   
        $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>user deactivated ";
        header("Location: superadmin.php?error=$nres");
    }else
    { 
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }


}

function activateUser()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $Reg_NO = $_POST["Reg_NO"];

    $activateUser = "UPDATE admnusers SET  status = 'Active' WHERE adm_no = '$Reg_NO'";

    if($db->query($activateUser) === true)
    {   
        $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>User activated  ";
        header("Location: superadmin.php?error=$nres");
    }else
    { 
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }


}

function RemoveUser()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: superadmin.php?error=$nres");
    }

    $Reg_NO = $_POST["Reg_NO"];

    $removeUser =  "DELETE FROM admnusers WHERE adm_no = '$Reg_NO'";

    if($db->query($removeUser) === true)
    {   
        if (removdb($Reg_NO) === true)
        {
            $nres = "<img class ='more' src='tmg/pass.png' alt='company logo' height='100px'>User removed ";
            header("Location: superadmin.php?error=$nres");
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

function makedb($user_number)
{

    $connection_created = new mysqli("localhost", "root", "");
        if ($connection_created -> connect_error){echo ("connection failed second " .$connection_created -> connect_error);}
        $database_new = "CREATE DATABASE $user_number;";
        $res = $connection_created->query($database_new);
        if($res === true)
        {   
            return true;
        }else
        { 
            return false;
        }
}

function removdb($Reg_NO)
{
    $connection_created = new mysqli("localhost", "root", "");
        if ($connection_created -> connect_error){echo ("connection failed second " .$connection_created -> connect_error);}
        $database_new = "DROP DATABASE $Reg_NO";
        $res = $connection_created->query($database_new);
        if($res === true)
        {   
            return true;
        }else
        { 
            return false;
        }
}
?>