<?php

$server_name="localhost";
$user_name="root";
$password="";
$db_name="account_system";


$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

if ($conn === false) {
    die("ERROR: Could not connect," . mysqli_connect_error());
}else{
    //echo "Connection success!!!";
}
?>