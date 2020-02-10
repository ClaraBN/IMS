<?php
session_start();
#include 'My_status_after_submit.php';
include 'db.php';

$month = $_POST['month'];
$months = array("Start","January", "February","March","April","May","June","July","August","September","October","November","December");
$month_number = array_search($month, $months);
$year = $_POST['year'] ;
$userid = $_SESSION['id'];

$sql_query = 'select carbohydrate,sugars,fat,protein,alcohol,fiber from food_intake d,user u,food f where d.patient_id = u.id and f.id = d.food_id and month(d.date) = '.$month_number.' and year(d.date) = '.$year.' and d.patient_id='.$userid.' group by day(d.date);

$consumption_value = array();
$carbohydrate = array();
$sugars = array();
$fat = array();
$protein = array();
$alcohol = array();
$fiber = array();
$sql_values = mysqli_query($link,$sql_query);
while ($row = mysqli_fetch_row($sql_values)) {
	$carbohydrate = $row[0];
	$sugars = $row[1];
	$fat = $row[2];
	$protein = $row[3];
	$alcohol = $row[4];
	$fiber = $row[5];
}

// save the JSON encoded array
$jsonData = json_encode($consumption_value); 

?>
