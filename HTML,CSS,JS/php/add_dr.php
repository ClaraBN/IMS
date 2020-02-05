<?php
include 'openDB.php';

# put the recived data into the database
$username = $_POST['Uname'];
$e_mail = $_POST["email"];
$pswd= $_POST["password1"];

// put the received data into the database
# Trying to INSERT into "doctors"
mysqli_query($link,"INSERT INTO doctors(username, email, pwd) VALUES
 ('$username','$e_mail', '$pswd')")
or die("Could not issue MySQL query");

include 'closeDB.php';
?>