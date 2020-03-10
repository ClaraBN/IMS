<!doctype html>
<?php
session_start(); // Right at the top of your script
?>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My health</title>
<link href="../css/nutrition.css" rel="stylesheet" type="text/css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
.example_e {
border: none;
background: #404040;
color: #ffffff !important;
font-weight: 100;
padding: 20px;
text-transform: uppercase;
border-radius: 6px;
display: inline-block;
transition: all 0.3s ease 0s;
}
.example_e:hover {
color: #404040 !important;
font-weight: 700 !important;
letter-spacing: 3px;
background: none;
-webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
-moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
transition: all 0.3s ease 0s;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  width: 60%;
  text-align: left;
}
td {
  vertical-align: bottom;
  color: black;
  font-size:110%;
  font-weight:bold;
}
th, td {
  padding: 15px;
  text-align: center;
}
tr:nth-child(even) {background-color: #ffffff;}
th {
  background-color: #a6e4ff;
  color: black;
  text-align: center;
}
.pop_up_for_adding{
	color: black;
	font-weight: bold;
}
 </style>
<?php
if(!isset($_SESSION['username'])){
    header('location:../html/login.html');
}
?>
</head>
<body>
<!-- Main Container -->
<div class="container">
  <!-- Navigation -->
  <header class="header"> 
    <a href="Home_login.php"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>
 
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <ul class="menu">
        <li><a href="Home_login.php">Home</a></li>
        <li><a href="My_health.php">My health</a></li>
        <li><a href="exercise_login.php">Exercise tracker</a></li>
	    <li><a href="educational_page_login.php">Learn more</a></li>
	    <li><a href="logout.php">Logout</a></li>
	    <li style="color:yellow;font-weight: bold;
            background-color: #73716A; padding-top: 6px">
            Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
        <!--<li> <a href="login.html">Sign In&nbsp;</a></li> -->
      </ul>
    
  </header>

  <section class="about" id="about" style="padding-top: 50px; padding-bottom: 450px;">
  <section class="text_column">
    <h1 class = "nutritional_h1">My status</h1>
    <div class="button_cont" style="padding-top: 50px; padding-bottom: 25px;"><a class="example_e" href="My_status.php" rel="nofollow noopener">Check my status</a></div>
	<h1 class = "nutritional_h1">Let us know what you ate</h1>
	<div class="python_search_form">
	<p style="font-weight: bold;color:black;">Enter the food item here, if you cannot find in our database</p>
	<form id="python_form" action="../php/python_command_login.php" method="post">
	<input type="text"  id="search" name="food_name" placeholder="Name of the food"/>
	<input type="submit" name="python_search" value="search" form="python_form" />
	</form>
	</div>
	<br>
	</section>
	<section class="text_column">
<script>
	$(function(){
    $('#search0').autocomplete({
        source: "../php/autocomplete_search.php",
		select: function( event, ui ) {

            $(".items").val(ui.item.id);
        }
    });
});
</script>
<div class="Add_more_button">
<button id="btn" style="position:relative;left:5%">Add more</button>
</div>
<form action="../php/nutrition_table_print_login.php" method="POST">
	<div id="container">
		<input type="date" name="date" placeholder="Enter date" required />
		<input type="time" name="time" placeholder="Enter time" required />
		<input type="text"  id="search0" name="food_name[]" placeholder="Name of the food" class="autoc" required />
		<input type="number" min="1" set="0.01" name="Quantity[]" placeholder="Quantity" required>
	</div>

<script>
var count=1;
  $("#btn").click(function(){

  $("#container").append(addNewRow(count));
  count++;
});

function addNewRow(count){
  return  '<scr' + 'ipt>'+
	'$(function(){	'+
    '$("#search'+count+'").autocomplete({'+
       ' source: "../php/autocomplete_search.php",'+
		'select: function( event, ui ) {'+

            '$(".items").val(ui.item.id);'+
        '}'+
    '});'+
'});'+
'</scr' + 'ipt>'+
  '<div class="row">'+
    '<div class="col-md-4">'+
        '<input type="text"  id="search'+count+'" name="food_name[]" placeholder="Name of the food" class="autoc" required />' +
		'<input type="number" min="1" set=0.01 name="Quantity[]" placeholder="Quantity" required>' +
    '</div>'+
'</div>'
}
</script>
<input type="submit" value="Submit and save">
</form>
</section>
<section class="text_column">
	<h1 class = "nutritional_h1">Enter your BGL readings</h1>
	<form action="../php/BGL_entry.php" method="POST">
	<div id="container">
		<input type="date" name="date" placeholder="Enter date" required />
		<input type="time" name="time" placeholder="Enter time" required />
		<input type="text" name="bgl_level" placeholder="BGL value" required />
		<input type="submit" value="Submit and save">
		</div>
	</form>
<br>
<br>
<?php
//session_start // Right at the top of your script
include 'db.php';
$fat = 0;
$Carbohydrates = 0;
$Sugars = 0;
$Fiber= 0;
$Protein= 0;
$Alcohol = 0;
echo "<br>";
$date = $link -> real_escape_string($_POST['date']);
$time = $link -> real_escape_string($_POST['time']);
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
		echo "</table>";
		echo "<br>";
?>
</section>
  </section>
  <section> 
  <h1 class="hero_header">
  <footer class="footer">
    <p style="margin-top: 0px;margin-bottom: 0px; text-align: center">Contact us! <br/>
    <a href="http://facebook.com"><img src="../images/facebook_icon.png" alt="facebook icon" height="30" width="30" /></a> &nbsp
    <a href="http://gmail.com"><img src="../images/gmail_icon.png" alt="gmail icon" height="30" width="30" /></a> &nbsp
    <a href="http://instagram.com"><img src="../images/instagram_icon.png" alt="instagram icon" height="30" width="30" /></a> &nbsp
    <a href="http://linkedin.com"><img src="../images/linkedin_icon.png" alt="linkedin icon" height="30" width="30" /></a> &nbsp
    <a href="http://twitter.com"><img src="../images/twitter_icon.png" alt="twitter icon" height="30" width="30" /></a> &nbsp
    </p>
  </footer>
  </h1> 
  </section> 
</div>
</body>
</html> 
