<?php
include "nutrition_after_submit.php";
$food = $_POST['food_name'] ;
$output = exec('C:/Users/clara/AppData/Local/Programs/Python/Python37-32/python.exe ../python/fetch_food_data.py '.$food.' 2>&1');
echo "<br>";
echo $output;
echo '<br>Thank you</div>';
?>