<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solarium";

$con = mysqli_connect ($servername , $username , $password , $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>