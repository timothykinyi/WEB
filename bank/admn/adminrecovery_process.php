<?php
if (isset($_POST['Recover'])) {
    login();
}

function login()
{
    session_start();

    // Database configuration
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "bank";

    $conn = new mysqli($server, $username, $password, $database);

    if ($conn->connect_error) {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed Try again ";
        header("Location: adminlogin.php?error=$nres");
    }



    $username_email = $_POST["email"];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admnusers WHERE email='$username_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $adm_no = $row['adm_no'];
            $passwrd = $row['authcode'];
            $status = $row['status'];
            $role = $row['role'];
            $log = $row['log'];

        }
    } else {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>check email and try again";
        header("Location: adminrecovery.php?error=$nres");
    }

    if(($email === $username_email) && password_verify($password , $passwrd)) {
        
        $_SESSION['adm_no'] = $adm_no;
        $_SESSION['role'] = $role;
        $_SESSION['status'] = $status;
        $user_id = $adm_no;
        $login_query = "INSERT INTO user_activity (user_id, activity_type) VALUES ('$user_id', 'login')";
        $res = $conn->query($login_query);
        if($res === true)
        {
            if ($status === "Active")
            {
                $values = [$adm_no, $role , 'logedin'];
                setCookieWithArray($adm_no, $values, 30);
                setcookie("adm_no", "$adm_no", time() + 31536000, "/");
                if ($log === '1')
                {
                    $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed log in using you admin given password";
                    header("Location: adminlogin.php?error=$nres");
                }else 
                {
                    header("Location: adminpassrec.php");
                }
            }else
            {
                header("Location: frz.php");
            }

            
        }else
        { 
            $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Wrong Auth Code used ";
            header("Location: adminrecovery.php?error=$nres");
        }
    } else {
        $nres = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Wrong Auth Code used ";
        header("Location: adminrecovery.php?error=$nres");
    }
}

function setCookieWithArray($name, $values, $expiryDays) {
    $serializedValues = serialize($values);
    $expiryTime = time() + ($expiryDays * 24 * 60 * 60); 
    setcookie($name, $serializedValues, $expiryTime, '/');
}


$conn->close();
?>

