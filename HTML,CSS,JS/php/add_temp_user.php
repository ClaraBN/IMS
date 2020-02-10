

<?php
# put the recived data into the database
# $country = mysql_real_escape_string($country) this is to remove injections in SQL
$first_name = $_POST['fname'];
$sur_name = $_POST["lname"];
$SSN = $_POST["ssn"];
$user_name = $_POST["username"];
$e_mail = $_POST["email"];
$pswd= $_POST["password1"];
$pswd2= $_POST["password2"];
$d_type =$_POST["diabetes"];

if ($pswd == $pswd2){
include 'openDB.php';
mysqli_query($link,"INSERT INTO temp_users(fname, lname, email, pwd, diabetes, ssn, username, user_type) VALUES
 ('$first_name','$sur_name', '$e_mail', '$pswd', '$d_type', '$SSN', '$user_name', 'patient')")
or die("Could not issue MySQL query");
include 'closeDB.php';
include "../html/login.html";
}else{
include "../html/register_user.html";
}

// put the received data into the database
# Trying to INSERT into "patients"

?>