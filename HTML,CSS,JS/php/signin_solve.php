<?php
include 'db.php';

$user = $_POST['username'];
$pwd = $_POST['password'];


if (empty($user)) {
    print("Username is required");
}
elseif (empty($pwd)) {
    print("Password is required");
}
else {

$user_check = "select * from DiaBeatIt.patients where DiaBeatIt.patients.username = '$user' and DiaBeatIt.patients.pwd = '$pwd'";
$result = mysqli_query($link, $user_check);
$row = mysqli_fetch_row($result);

if ($row['username' === $user]) {
    //$url = "nutrition_form.php";
    $url = "nutrition.html";
    header("location:".$url);
}
else {
    //print("Incorrect username or password");
    $url = "login.html";
    header("location:".$url);

     echo "<script type='text/JavaScript'>
                alert('JavaScript is awesome!');
            </script>";
}

}
?>
