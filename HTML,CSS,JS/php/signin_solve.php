<?php
include 'db.php';

//Retrieving input from form
$user = $_POST['username'];
$pw = $_POST['password'];


//Connecting to database to see if username and password
$user_check = "select * from DiaBeatIt.patients where DiaBeatIt.patients.username = '$user' and DiaBeatIt.patients.pwd = '$pw'";
$result = mysqli_query($link, $user_check);
$row = mysqli_fetch_row($result);

if ($row['username' === $user] AND $row['pwd' === $pw]) {
    //if existing user, redirecting into another page
    $url = "nutrition.html";
    header("location:".$url);
}
else {
    //if non-existing user, send out an alter and redirect to login-page
    echo "<script type='text/JavaScript'>
          alert('Incorrect username or password');
           document.location.href = 'login.html'; </script>";
}
?>
