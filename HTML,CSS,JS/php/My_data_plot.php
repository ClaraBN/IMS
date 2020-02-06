<?php
session_start();
#include 'My_status_after_submit.php';
include 'db.php';

$month = $_POST['month'];
$months = array("Start","January", "February","March","April","May","June","July","August","September","October","November","December");
$month_number = array_search($month, $months);
$data_name = $_POST['content_type'] ;
$year = $_POST['year'] ;
$userid = $_SESSION['userid'];

$sql_query = 'select f.'.$data_name.' from diet d,user u,food f where d.Pid = u.id and f.id = d.food_id and month(d.date) = '.$month_number.' and year(d.date) = '.$year.' and d.pid='.$userid;

$consumption_value = array();
$sql_values = mysqli_query($link,$sql_query);
while ($row = mysqli_fetch_row($sql_values)) {
    $consumption_value[] = $row[0];
}

// save the JSON encoded array
$jsonData = json_encode($consumption_value); 

?>
