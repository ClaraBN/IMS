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
<style>
    a { text-decoration: none; }
	.wrapper {
  max-width: 800px;
  margin: 50px auto;
}
</style>

<link href="../css/educational.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->	
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/0.5.7/chartjs-plugin-annotation.js"></script>
<style>
.nutritional_h1 {
	color: #FF00FF;
	font-weight: bold;
	font-size: 30px;
	width: 100%;
	float: left;
}

.heading2 {
	color: #000000;
	font-weight: bold;
	font-size: 10px;
	width: 100%;
	float: left;
}
.graphs {
    position: center;
	right: 50%;
}
.graphs_title {
    position: center;
	right: 50%;
}

.graph_session_h1 {
	color: #FF00FF;
	font-weight: bold;
	font-size: 30px;
	position: relative;
	left: 70%;
}
.container_this {
	width: 90%;
	margin-left: auto;
	margin-right: auto;
	background-color: #FFFFFF;
}
.page_header{
	height: 50px;
	background-color: #73716A;
}
.pie_chart {
	vertical-align: middle;
}
</style>
<?php 
include 'pie_chart_after_submit.php'; 
?>

<script>
window.onload = function() {
	
var Carbohydrate= "<?php echo $carbohydrate ?>";
var Sugar= "<?php echo $sugar ?>";
var Protein= "<?php echo $protein ?>";
var Fiber= "<?php echo $fiber ?>";
var Alcohol= "<?php echo $alcohol ?>";
var Fat= "<?php echo $fat ?>";
var Month = "<?php echo $month ?>";
	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Intake for this "+Month+" in grams"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: Carbohydrate, label: "Carbohydrate"},
			{y: Sugar, label: "Sugar"},
			{y: Protein, label: "Protein"},
			{y: Fiber, label: "Fiber"},
			{y: Alcohol, label: "Alcohol"},
			{y: Fat, label: "Fat"}
		]
	}]
});
chart.render();

}
</script>
<?php
if(!isset($_SESSION['username'])){
    header('location:../html/login.html');
}
?>
</head>
<body>
<!-- Main Container -->
<div class="container_this"> 
  <!-- Navigation -->
  <header class="page_header"> 
    <a href="Home_login.php"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>
  </a>
    <nav>
      <ul>
        <li><a href="Home_login.php">Home</a></li>
        <li><a href="My_health.php">My health</a></li>
		 <li><a href="educational_page_login.php">Learn more</a></li>
		 <li><a href="logout.php">Logout</a></li>
		 <li style="color:yellow;font-weight:strong">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
        <!--<li> <a href="login.html">Sign In&nbsp;</a></li>-->
      </ul>
    </nav>
  </header>
  <!-- Hero Section -->
  <section class="hero" id="hero">
  <h1 class = "nutritional_h1">Track your health</h1>
	  </p><form id="plot_data_id" action="line_chart.php" method="POST" >
		<select id="month" placeholder="Select month" name="month">
		  <option value="January">January</option>
		  <option value="February">February</option>
		  <option value="March">March</option>
		  <option value="April">April</option>
		  <option value="May">May</option>
		  <option value="June">June</option>
		  <option value="July">July</option>
		  <option value="August">August</option>
		  <option value="September">September</option>
		  <option value="October">October</option>
		  <option value="November">November</option>
		  <option value="December">December</option>
		</select>
		<select id="year" name="year">
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
		</select>
		<input type="submit" value="Plot my data">
		</form>
  </section>