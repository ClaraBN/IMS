<?php
session_start();
include "My_health_after_submit.php";
$food = $_POST['food_name'] ;
$output = shell_exec('C:/Users/clara/AppData/Local/Programs/Python/Python37-32/python.exe ../python/fetch_food_data.py '.$food.' ');
echo "<br>";
echo $output;
echo '<br>Thank you</div>';
?>