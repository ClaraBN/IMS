<?php
session_start();
include 'db.php';

//Retrieving input from form
$user = $_POST['username'];
$pw = $_POST['password'];
$_SESSION['name'] = $_POST['username'];

//Connecting to database to see if username exists - it should be unique
$user_check = "select * from $dbname.users where $dbname.users.username = '$user'";
$result = mysqli_query($link, $user_check);
$row = mysqli_fetch_row($result);


if (empty($row)) {
    //If user doesn't exist, send out an alert and redirect to login-page
    echo "<script type='text/JavaScript'>
          alert('Incorrect username or password!');
           document.location.href = '../html/login.html'; </script>";
}
elseif (password_verify($pw, $row[3]) == TRUE AND $row[5] === 'patient') {
    //If existing user and correct password, redirecting into another page
    $_SESSION['username']=$row[1];
    $_SESSION['id']=$row[0];
    $url = "../php/Home_login.php";
    header("location:".$url);
}
elseif (password_verify($pw, $row[3]) == TRUE AND $row[5] === 'doctor') {
    //If existing user and correct password, redirecting into another page
    $_SESSION['username']=$row[1];
    $_SESSION['id']=$row[0];
    $url = "../php/Home_login.php";
    header("location:".$url);
}
else {
    //If existing user but incorrect password, send out an alert and redirect to login-page
    echo "<script type='text/JavaScript'>
         alert('Incorrect username or password');
         document.location.href = '../html/login.html'; </script>";
}
?>
