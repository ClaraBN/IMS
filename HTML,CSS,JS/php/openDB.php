<?php
# connecting to my port
$hostname = "back.db1.course.it.uu.se:3306";
$username = "spring20_ims_1";
$password = "5LUrVPtV";
$dbname = "spring20_ims_1";
$link = mysqli_connect($hostname, $username, $password, $dbname);
if (!$link) {
echo "Error: Unable to connect to MySQL." . mysqli_connect_error() . PHP_EOL;
exit;
}
?>