<?php
include "nutrition_after_submit.php";
$food = $_POST['food_name'] ;
echo '<div class="pop_up_for_adding"><br>Added '.$food.' to the database' ;
echo '<br>Thank you</div>';
$output = exec('C:/Users/clara/AppData/Local/Programs/Python/Python37-32/python.exe ../python/fetch_food_data.py '.$food.' 2>&1');
echo $output;
?>