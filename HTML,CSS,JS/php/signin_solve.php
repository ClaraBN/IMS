<?php
session_start();
include 'db.php';

//Retrieving input from form
$user = $_POST['username'];
$pw = $_POST['password'];
$_SESSION['name'] = $_POST['username'];

//Connecting to database to see if username and password
$user_check = "select * from $dbname.user where $dbname.user.username = '$user' and $dbname.user.password = '$pw'";
$result = mysqli_query($link, $user_check);
$row = mysqli_fetch_row($result);


if ($row['username' === $user] AND $row['pwd' === $pw]) {
    //if existing user, redirecting into another page
	$_SESSION['username']=$row[1];
	$_SESSION['userid']=$row[0] ;
    $url = "Home_login.php";
    header("location:".$url);
}
else {
    //if non-existing user, send out an alter and redirect to login-page
	
    echo "<script type='text/JavaScript'>
          alert('Incorrect username or password');
           document.location.href = '../html/login.html'; </script>";
}
?>
