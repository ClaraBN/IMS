<?php
include 'openDB.php';

# put the recived data into the database
$first_name = $_POST['fname'];
$sur_name = $_POST["surname"];
$SSN = $_POST["ssn"];
$e_mail = $_POST["email"];
$pswd= $_POST["password1"];
$d_type = $_POST["type"];

// put the received data into the database
# Trying to INSERT into "patients"
mysqli_query($link,"INSERT INTO patients(username, surname, email, pwd, diabetes,ssn) VALUES
 ('$first_name','$sur_name', '$e_mail', '$pswd', '$d_type', $SSN)")
or die("Could not issue MySQL query");

include 'closeDB.php';
?>