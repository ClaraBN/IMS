<!doctype html>
<?php
session_start(); // Right at the top of your script
?>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My status</title>
<style>
    a { text-decoration: none; }
		.content_information {
	width: 70%;
    margin: 0 auto;
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
	font-size: 20px;
	width: 100%;
	float: left;
}
.graphs {
	position: relative;
	left: 30%;
}
.graphs_title {
	width: 70%;
	margin: 0 auto;
	padding-top: 20px;
}
.pie_chart {
	position: relative;
	left: 40%;
}
.graph_session_h1 {
	color: #FF00FF;
	font-weight: bold;
	font-size: 30px;
	width: 250px;
	margin: 0 auto;
	padding-top: 0px;
}
.content_information {
	width: 400px;
    margin: 0 auto;
}
</style>
<?php 
include 'pie_chart.php'; 
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
            background-color: #73716A; padding-top: 6px">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
      </ul>  
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

	<section class="about" id="about">
	<h1 class="graph_session_h1 graphs_title">Know your health</h1>

<div id="chartContainer" class="content_information" style="height: 500px; width: 700px;"></div>
 </section>
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
</div>
</body>
</html>