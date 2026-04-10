<?php
$host = "localhost:3308";
$user = "root";
$pass = "";
$db   = "ppl_voice";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
?>