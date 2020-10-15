<?php
/* Database connection start */
$hostname_Portal = "localhost";
$username_Portal = "root";
//$username_Portal = "id15120535_nehomar";
$password_Portal = "";
//$password_Portal = "a(c90CE*4%{9wO5&";
$database_Portal = "parking";
//$database_Portal = "id15120535_parking";

$Portal = mysqli_connect($hostname_Portal, $username_Portal, $password_Portal, $database_Portal) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>