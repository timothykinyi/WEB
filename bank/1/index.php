<?php

function setCookieWithArray($name, $values, $expiryDays) {
    $serializedValues = serialize($values);
    $expiryTime = time() + ($expiryDays * 31 * 60 * 60); 
    setcookie($name, $serializedValues, $expiryTime, '/');
}

function getCookieWithArray($name) {
    if (isset($_COOKIE[$name])) {
        $serializedValues = $_COOKIE[$name];
        $unserializedValues = unserialize($serializedValues);
        if ($unserializedValues !== false) {
            return $unserializedValues;
        }
    }
    return null;
}


$values = ['adn', 'role'];
setCookieWithArray('myCookie', $values, 7);

$cookieValues = getCookieWithArray('myCookie');
if ($cookieValues) {
    echo 'Value 1: ' . $cookieValues[0] . '<br>';
    echo 'Value 2: ' . $cookieValues[1] . '<br>';
}
?>


<?php


        if (isset($_COOKIE['adm_no'])) { $admn = $_COOKIE['adm_no']; } 
        else { header("Location: adminlogin.php");}

        $cookieValues = getCookieWithArray($admn);
        if ($cookieValues) {
          $adm_no = $cookieValues[0];
          $role = $cookieValues[1];
          $log = $cookieValues[2];
        }else { header("Location: adminlogin.php"); }





        if ($role === "teller")
        if ($role === "teller")
        {

        }
        else 
        {

        }
        ?>