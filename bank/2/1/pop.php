<?php
$response = ['status' => 'success', 'message' => 'Transaction completed successfully'];
header('Content-Type: application/json');
echo json_encode($response);
?>
