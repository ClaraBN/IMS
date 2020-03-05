<?php
include "nutrition_after_submit.php";
include 'db.php';
$fat = 0;
$Carbohydrates = 0;
$Sugars = 0;
$Fiber= 0;
$Protein= 0;
$Alcohol = 0;
echo "<br>";
$quantities = $_POST['Quantity'];
$foods = $_POST['food_name'];

$i = 0;
foreach( $foods as  $food ) {
	$quantity = $link -> real_escape_string($quantities[$i]);
	$food = $link -> real_escape_string($food);
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
		echo "</section>";
                echo "</section>";
                /* echo '<h1 class="hero_header">
  <footer class="footer">
    <p style="margin-top: 0px;margin-bottom: 0px; text-align: center">Contact us! <br/>
    <a href="http://facebook.com"><img src="../images/facebook_icon.png" alt="facebook icon" height="30" width="30" /></a> &nbsp
    <a href="http://gmail.com"><img src="../images/gmail_icon.png" alt="gmail icon" height="30" width="30" /></a> &nbsp
    <a href="http://instagram.com"><img src="../images/instagram_icon.png" alt="instagram icon" height="30" width="30" /></a> &nbsp
    <a href="http://linkedin.com"><img src="../images/linkedin_icon.png" alt="linkedin icon" height="30" width="30" /></a> &nbsp
    <a href="http://twitter.com"><img src="../images/twitter_icon.png" alt="twitter icon" height="30" width="30" /></a> &nbsp
    </p>
  </footer>
  </h1> '; */
                echo "</div>";
                echo "</body>";
		echo "</html>";
?>
