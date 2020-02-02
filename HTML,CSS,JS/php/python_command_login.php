<?php
include "nutrition_after_submit_login.php";
$food = $_POST['food_name'] ;
echo '<div class="pop_up_for_adding"><br>Added '.$food.' to the database' ;
echo '<br>Thank you</div>';
$output = shell_exec('C:/Users/"Akshai P S"/AppData/Local/Programs/Python/Python36-32/python.exe ../python/fetch_food_data.py '.$food.' 2>&1');
?>