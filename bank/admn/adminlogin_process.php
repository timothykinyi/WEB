<?php
if (isset($_POST['login'])) {
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
        die("Connection failed: " . $conn->connect_error);
    }



    $username_email = $_POST["email"];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admnusers WHERE email='$username_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $email = $row['email'];
            $adm_no = $row['adm_no'];
            $passwrd = $row['password'];
            $status = $row['status'];
            $role = $row['role'];

        }
    } else {
        echo "No data found.";
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
                $values = [$adm_no, $role , 'logedin'];
                setCookieWithArray($adm_no, $values, 30);
                setcookie("adm_no", "$adm_no", time() + 31536000, "/");
                header("Location: superadmin.php");
            
        }else
        { 
            echo(" failed " .$login_query. "<br>" .$conn->error );
        }
    } else {
        echo "Login failed . ".$username_email." " .$email." ".$password." new ".$password." <a href='agentlogin.php'>Try again</a>";
    }
}

function setCookieWithArray($name, $values, $expiryDays) {
    $serializedValues = serialize($values);
    $expiryTime = time() + ($expiryDays * 24 * 60 * 60); 
    setcookie($name, $serializedValues, $expiryTime, '/');
}


$conn->close();
?>

