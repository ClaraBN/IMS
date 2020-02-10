<?php
session_start(); // Right at the top of your script
include "My_health_after_submit.php";
include 'db.php';
$fat = 0;
$Carbohydrates = 0;
$Sugars = 0;
$Fiber= 0;
$Protein= 0;
$Alcohol = 0;
echo "<br>";
$date = $_POST['date'] ;
$time = $_POST['time'] ;
$quantities = $_POST['Quantity'];
$foods = $_POST['food_name'];

$i = 0;
foreach( $foods as  $food ) {
	$quantity = $quantities[$i];
	$i++;
	
	$food = preg_replace( "/, $/", "", $food ); 
	$sql = "SELECT * FROM food WHERE name = '$food'";
	$result_query = mysqli_query($link, $sql);

	if (mysqli_num_rows($result_query) == 0) {
		print("No such item in database<br>\n");
	}
	else {
		print("<p style='color:black; font-weight: bold;'>Contents consumed from  '$food'  in grams</p>");
		echo "<table border='1'>"; //define an html table
		//<th> Defines a header cell in a table //<tr> Defines a row in a table
		//<td> Defines a cell in a table
		echo "<tr><th>Name</th><th>Fat</th><th>Carbohydrates</th><th>Sugars</th><th>Fiber</th><th>Protein</th><th>Alcohol</th></tr>";
		while($row = mysqli_fetch_row($result_query)){
		$foodid = $row[0];
		echo "<tr><td>";
		echo $row[1];
		echo "</td><td>";
		echo $row[2] * $quantity;
		echo "</td><td>";
		echo $row[3] * $quantity;
		echo "</td><td>";
		echo $row[4] * $quantity;
		echo "</td><td>";
		echo $row[5] * $quantity;
		echo "</td><td>";
		echo $row[6] * $quantity;
		echo "</td><td>";
		echo $row[7] * $quantity;
		echo "</td></tr>";
		$fat = $fat + ($row[2] * $quantity);
		$Carbohydrates = $Carbohydrates + ($row[3] * $quantity);
		$Sugars = $Sugars + ($row[4] * $quantity);
		$Fiber= $Fiber + ($row[5] * $quantity);
		$Protein= $Protein + ($row[6] * $quantity);
		$Alcohol = $Alcohol + ($row[7] * $quantity);
	}
		echo "</table>";
		echo "<br>";
	}

	$insert = "INSERT INTO diet VALUES('$date','$time','$foodid','".$_SESSION['id']."','$quantity')";
	mysqli_query($link, $insert) ;
}
		echo ("<p style='color:black; font-weight: bold;'>Total amount of contents consumed in grams</p>");
		echo "<table border='1'>"; //define an html table
		//<th> Defines a header cell in a table //<tr> Defines a row in a table
		//<td> Defines a cell in a table
		echo "<tr><th>Name</th><th>Fat</th><th>Carbohydrates</th><th>Sugars</th><th>Fiber</th><th>Protein</th><th>Alcohol</th></tr>";
		echo "<tr><td>";
		echo "Total content";
		echo "</td><td>";
		echo $fat;
		echo "</td><td>";
		echo $Carbohydrates;
		echo "</td><td>";
		echo $Sugars;
		echo "</td><td>";
		echo $Fiber;
		echo "</td><td>";
		echo $Protein;
		echo "</td><td>";
		echo $Alcohol;
		echo "</td></tr>";
		echo "</body>";
		echo "</html>";
		echo "</section>";
		echo "</div>";
?>
