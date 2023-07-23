<?php

$sitename="2FA AUTHENTICATION USING QR CODE AND OTP ON REVENUE COMPUTATION SYSTEM";
$conn = mysqli_connect("localhost", "root", "", "revenue");
if (!$conn) {
    die(mysqli_error($conn) . "Error connecting Database!");
}
?>