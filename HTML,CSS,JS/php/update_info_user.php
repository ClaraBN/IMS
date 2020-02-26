<?php
session_start();
include 'db.php';


//Retrieve updated information
$f_name = prevent_injection($_POST['fname']);
$l_name = prevent_injection($_POST['lname']);
$ssn = $_POST['ssn'];
$user = prevent_injection($_POST['username']);
$pwd1 = prevent_injection($_POST['pw1']);
$pwd2 = prevent_injection($_POST['pw2']);
$e_mail = $_POST['email'];
$work_place = prevent_injection($_POST['workplace']);
$id = $_SESSION['id'];


function prevent_injection($data) {
  $data1 = str_replace(' ', '', $data); //remove white-spaces
  $data2 = stripslashes($data1); //remove back-slashes
  $data3 = preg_replace('/[^A-Za-z0-9\-]/', '', $data2); //remove special characters
  return $data3;
}


//Check if username exists
$check_user = "SELECT count(*) FROM $dbname.users WHERE $dbname.users.username = '$user' AND $dbname.users.id != '$id'";
$result = mysqli_query($link, $check_user);
$row = mysqli_fetch_row($result);

if ($row[0] > 0) {
    echo "<script type='text/JavaScript'>
         alert('Username already exists');
         document.location.href = '../php/Doctors_page_alter_info.php'; </script>";
}
elseif ($pwd1 == $pwd2) {
    $hash_pwd = password_hash($pwd1, PASSWORD_DEFAULT);

    //Check if username is unique
    //Prevent injections

    //Update information in database
    $update_user = "UPDATE $dbname.users SET $dbname.users.username = '$user', $dbname.users.email = '$e_mail', $dbname.users.workplace = '$work_place', $dbname.users.ssn = '$ssn', $dbname.users.fname = '$f_name', $dbname.users.lname = '$l_name', $dbname.users.pwd = '$hash_pwd' WHERE $dbname.users.id = '$id'";
    mysqli_query($link, $update_user);

    //Redirect into userpage
    $url = "../php/Doctors_page.php";
    header("location:".$url);
}
else {
    echo "<script type='text/JavaScript'>
         alert('Passwords do not match');
        document.location.href = '../php/Doctors_page_alter_info.php'; </script>";
}

?>
