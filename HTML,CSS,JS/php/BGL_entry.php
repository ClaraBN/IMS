<?php
include 'My_health.php';
include 'db.php';
$date = $_POST['date'] ;
$time = $_POST['time'] ;
$bgl_level = $_POST['bgl_level'];
$insert = "INSERT INTO readings VALUES('$time','$date','$bgl_level','".$_SESSION['id']."')";
mysqli_query($link, $insert);
?>
