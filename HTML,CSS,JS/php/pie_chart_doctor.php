<?php
include 'db.php';
$months = array("Start","January", "February","March","April","May","June","July","August","September","October","November","December");
$month = $months[(int)date('m')];
$monthd = date('m');
$userid = $_POST'pat_id'];

$sql_values = mysqli_query($link,"select sum(f.carbohydrate*d.quantity),sum(f.sugars*d.quantity),sum(f.protein*d.quantity), sum(f.fiber*d.quantity),sum(f.alcohol*d.quantity),sum(f.fat*d.quantity) from food_intake d,users u,food f where d.patient_id = u.id and f.id = d.food_id and month(d.date) = $monthd and d.patient_id=$userid");
while ($row = mysqli_fetch_row($sql_values)) {
    $carbohydrate = $row[0];
	$sugar = $row[1];
	$protein = $row[2];
	$fiber = $row[3];
	$alcohol = $row[4];
	$fat = $row[5];
}
?>