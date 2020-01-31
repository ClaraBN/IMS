<?php
$hostname = "130.243.236.106:8889";
$username = "root";
$password = "root";
$dbname   = "DiaBeatIt";
$link = mysqli_connect($hostname, $username, $password,
  $dbname);
if (!$link) {
echo "Error: Unable to connect to MySQL." . mysqli_connect_error() . PHP_EOL;
exit; }

?>

