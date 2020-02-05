<?php

include "My_status_after_submit.php";
include 'db.php';
echo "<br>";
echo "<h1>Check</h1>";
$data_name = $_POST['content_type'] ;
$year = $_POST['year'] ;
$month = $_POST['month'];

echo $data_name;
echo $year;
echo $month;
echo "</section>";
echo "</div>";
echo "</body>";
echo "</html>";


?>
