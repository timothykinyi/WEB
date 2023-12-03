
<?php
session_start();

// Database configuration
$server = "localhost";
$username = "root";
$password = "";
$database = "bank";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: agentlogin.php?error=$result");
}



$username_email = $_POST["email"];
$password = $_POST['password'];

$sql = "SELECT * FROM agents WHERE email='$username_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = $row['account_no'];
        $agent_no = $row['agent_no'];
        $username = $row['email'];
        $passwrd = $row['password'];
        $status = $row['status'];

    }
} else {
    $res = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'><strong>Login failed </strong><br>Check your user name and try again <br>If you don't have an account <a href='option.php'>register</a>";
    header("Location: agentlogin.php?error=$res");
}
$conns = new mysqli("localhost", "root", "", $data);

if ($conns->connect_error) {
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed try again";
    header("Location: agentlogin.php?error=$result");
}
$sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
$result0 = $conns->query($sql0);

while ($row0 = $result0->fetch_assoc())
{
$bal = $row0['balance'];
}

if(($username === $username_email) && password_verify($password , $passwrd)) 
{
    
    $_SESSION['agent_n'] = $agent_no;
    $_SESSION['agaccount_no'] = $data;
    $_SESSION['agbalance'] = $bal;
    $_SESSION['agstatus'] = $status;
    $user_id = $data;
    $login_query = "INSERT INTO user_activity (user_id, activity_type) VALUES ('$user_id', 'login')";
    $res = $conn->query($login_query);
    if($res === true)
    {   
        setcookie("agent_no", "$data", time() + 31536000, "/");
        setcookie("agentlogin", "$data", time() + 31536000, "/");
        if ($status === "Active")
        {
            header("Location: agentpage.php");
        }else
        {
            header("Location: frz.php");
        }
        
    }else
    { 
        $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed <a href='agentlogin.php'>Try again</a>";
        header("Location: agentlogin.php?error=$result");
    }

} else {
    $result = "<img class ='more' src='tmg/sad.png' alt='company logo' height='100px'>Failed <a href='agentlogin.php'>Try again</a>";
    header("Location: agentlogin.php?error=$result");
   
}

$conn->close();
?>

