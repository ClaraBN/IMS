<?php
include 'db.php';

#input data from the test
$sex = $_POST['sex'];
$weight = $_POST['weight'];
$ex_date = $_POST['fdate'];
$ex_time = $_POST['ftime'];
$exercise_type = $_POST['ex_type'];

#Input data going into our database
mysqli_query($link,"INSERT INTO exercise(sex, weight, fdate,ftime,ex_type,) VALUES
 ('$sex','$weight','$ex_date','$ex_time', '$exercise_type')")
or die("Could not issue MySQL query");

include 'closeDB.php';
?>
