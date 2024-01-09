<?php
    if (isset($_GET["error"])) {
        $result = $_GET["error"];
        echo "<form><p class =  'note' > <button onclick ='out();'>x</button>$result</p></form>";
    }
    function out()
    {
        $result="";
        header("Location: error.php?error=$result");
    }
?>

<?php
    if (isset($_COOKIE['userlogin'])) {
        $login = $_COOKIE['userlogin'];
        if (isset($_COOKIE['account_no'])) {
            $account_no = $_COOKIE['account_no'];
            if ($login === $account_no) {
                setcookie("account_no", $account_no, time() + 31536000, "/");
                setcookie("userlogin", "$login", time() + 31536000, "/");
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
?>

<?php
if (isset($_COOKIE['agentlogin'])) {
    $login = $_COOKIE['agentlogin'];
    if (isset($_COOKIE['agent_no'])) {
        $account_no = $_COOKIE['agent_no'];
        if ($login === $account_no) {
            setcookie("agent_no", "$account_no", time() + 31536000, "/");
            setcookie("agentlogin", "$login", time() + 31536000, "/");
        } else {
            
            header("Location: agentlogin.php");
        }
    } else {
        header("Location: agentlogin.php");
    }
} else {
    header("Location: agentlogin.php");
}
?>