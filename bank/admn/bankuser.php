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
        die("Connection failed: " .$db->connect_error );
    }
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $Reg_NO = $_POST["Reg_NO"];
    $role = $_POST["role"];
    $Email = $_POST["Email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    

    $addnewuser = "INSERT INTO admnusers (first_name, second_name, adm_no, role , email , password ,status)
    VALUE('$first_name', '$second_name', '$Reg_NO', '$role' , '$Email', '$hashedPassword' ,'Active');";

    if($db->query($addnewuser) === true)
    {   
        if (makedb($Reg_NO) === true)
        {
            echo 'gone';
            header("Location: superadmin.php");
        }else
        {
            $res = "Error: " . $addnewuser . "<br>" . $db->error;
            header("Location: error.php?error=$res");
        }
        
    }else
    { 
        $res = "Failed try again. <br> look out for the following: <br>1. Dublicate registration number. <br>2. Dublicate email. ";
        header("Location: error.php?error=$res");
    }

}

function modifyuser()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        die("Connection failed: " .$db->connect_error );
    }

    $Reg_NO = $_POST["Reg_NO"];
    $role = $_POST["role"];

    $modifyuser = "UPDATE admnusers SET  role = '$role' WHERE adm_no = '$Reg_NO'";

    if($db->query($modifyuser) === true)
    {   
        header("Location: superadmin.php");
    }else
    { 
        $res = "Failed try again ";
        header("Location: error.php?error=$res");
    }


}

function deactivateUser()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        die("Connection failed: " .$db->connect_error );
    }

    $Reg_NO = $_POST["Reg_NO"];

    $deactivateUser = "UPDATE admnusers SET  status = 'Deactivated' WHERE adm_no = '$Reg_NO'";

    if($db->query($deactivateUser) === true)
    {   
        header("Location: superadmin.php");
    }else
    { 
        $res = "Failed try again ";
        header("Location: error.php?error=$res");
    }


}

function activateUser()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        die("Connection failed: " .$db->connect_error );
    }

    $Reg_NO = $_POST["Reg_NO"];

    $activateUser = "UPDATE admnusers SET  status = 'Active' WHERE adm_no = '$Reg_NO'";

    if($db->query($activateUser) === true)
    {   
        header("Location: superadmin.php");
    }else
    { 
        $res = "Failed try again ";
        header("Location: error.php?error=$res");
    }


}

function RemoveUser()
{
    $db = new mysqli("localhost", "root", "","bank");
    if ($db->connect_error)
    {
        die("Connection failed: " .$db->connect_error );
    }

    $Reg_NO = $_POST["Reg_NO"];

    $removeUser =  "DELETE FROM admnusers WHERE adm_no = '$Reg_NO'";

    if($db->query($removeUser) === true)
    {   
        if (removdb($Reg_NO) === true)
        {
            header("Location: superadmin.php");
        }else
        {
            $res = "Failed again ";
            header("Location: error.php?error=$res");
        }
    }else
    {  
        $res = "Error3: " . $removeUser . "<br>" . $db->error;
        header("Location: error.php?error=$res");
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