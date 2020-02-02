<?php
$hostname = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname   = "ims_project_check";
$link = mysqli_connect($hostname, $username, $password,$dbname);
if (!$link) {
echo "Error: Unable to connect to MySQL." . mysqli_connect_error() . PHP_EOL;
exit; }
?>