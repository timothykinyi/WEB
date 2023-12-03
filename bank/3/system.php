<?php
function generateAuthCode() {
    $bytes = random_bytes(31); // 8 bytes = 64 bits
    return bin2hex($bytes);
}

// Example usage
$authCode = generateAuthCode();
$hashedauthCode = password_hash($authCode, PASSWORD_DEFAULT);
echo "Generated Authentication Code: $authCode";
echo "<br> Generated hashedauthCode Code: $hashedauthCode";
?>
