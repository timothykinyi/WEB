
<?php
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

$sql = "SELECT * FROM agents WHERE email='$username_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = $row['account_no'];
        $agent_no = $row['agent_no'];
        $username = $row['email'];
        $passwrd = $row['password'];

    }
} else {
    $result = "Failed try again ! ";
    header("Location: error.php?error=$result");
}
$conns = new mysqli("localhost", "root", "", $data);

if ($conns->connect_error) {
    die("Connection failed: " . $conns->connect_error);
}
$sql0 = "SELECT balance FROM transactions WHERE transactions = 'start' ";
$result0 = $conns->query($sql0);

while ($row0 = $result0->fetch_assoc())
{
$bal = $row0['balance'];
}

if(($username === $username_email) && password_verify($password , $passwrd)) 
{
    
    $_SESSION['agent_no'] = $agent_no;
    $_SESSION['account_no'] = $data;
    $_SESSION['balance'] = $bal;
    $user_id = $data;
    $login_query = "INSERT INTO user_activity (user_id, activity_type) VALUES ('$user_id', 'login')";
    $res = $conn->query($login_query);
    if($res === true)
    {   
        setcookie("account_no", "$data", time() + 31536000, "/");
        setcookie("agentlogin", "$data", time() + 31536000, "/");
        header("Location: agentpage.php");
    }else
    { 
        $result = "Failed 2 <a href='agentlogin.php'>Try again</a>!  ";
        header("Location: error.php?error=$result");
    }

} else {
    $result = "Failed <a href='agentlogin.php'>Try again</a>!  ";
    header("Location: error.php?error=$result");
   
}

$conn->close();
?>

