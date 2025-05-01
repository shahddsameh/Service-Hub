<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "team1";

$connect = mysqli_connect($localhost , $username , $password , $database);
session_start();
error_reporting(E_ALL & ~E_WARNING);

// if($connect){
//     echo"done";
// }
?>