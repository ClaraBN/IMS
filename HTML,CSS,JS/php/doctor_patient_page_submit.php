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
		.content_information {
	width: 70%;
    margin: 0 auto;
}
	.wrapper {
  max-width: 800px;
  margin: 50px auto;
}
</style>

<link href="../css/educational.css" rel="stylesheet" type="text/css">

<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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
.content_information {
	width: 400px;
    margin: 0 auto;
}
 </style>

<?php 
include 'pie_chart_after_submit_doctor.php'; 
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
  <header class="header">
    <a href="Doctors_home_page.php"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
   <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <ul class="menu">
        <li><a href="Doctors_home_page.php">Home</a></li>
        <li><a href="Doctors_page.php">My page</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li style="color:yellow;font-weight: bold; background-color: #73716A; padding-top: 6px">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
      </ul>
  </header>

  <section class="content_information">
    <h1 class = "nutritional_h1">Personal information</h1><br>
    <p><em>Summary of your personal settings</em> <br><br>
    <?php
    include 'db.php';
    $doc_id = $_SESSION['id'];
    $Doctor_info = "SELECT * FROM $dbname.users WHERE $dbname.users.id = '$doc_id'";
    $result_doctor = mysqli_query($link, $Doctor_info);
    $row_doctor = mysqli_fetch_row($result_doctor);

    echo nl2br("<strong>First name: </strong>" . $row_doctor[7].PHP_EOL."");
    echo nl2br("<strong>Last name: </strong>" . $row_doctor[8].PHP_EOL."");
    echo nl2br("<strong>Workplace: </strong>" . $row_doctor[9].PHP_EOL."");
    echo nl2br("<strong>SSN: </strong>" . $row_doctor[4].PHP_EOL."");
    echo nl2br("<strong>Username: </strong>" . $row_doctor[1].PHP_EOL."");
    echo nl2br("<strong>Email: </strong>" . $row_doctor[2].PHP_EOL."");

    ?>
    <br><button type="button" onClick="window.location.href = '../php/doctors_page_alter_info.php';">Change personal settings</button>
    </p>
  </section>
<br>
  <section class="content_information">

    <h1 class = "nutritional_h1">Patients</h1>
    <p><em>Summary of your patients</em><br>

    <button type="button" onClick="window.location.href = '../php/doctors_page.php';">Go back</button>

    <form id='plot_data_id' action='line_chart_doctor.php' method='POST' >
		<select id='month' placeholder='Select month' name='month'>
		  <option value='January'>January</option>
		  <option value='February'>February</option>
		  <option value='March'>March</option>
		  <option value='April'>April</option>
		  <option value='May'>May</option>
		  <option value='June'>June</option>
		  <option value='July'>July</option>
		  <option value='August'>August</option>
		  <option value='September'>September</option>
		  <option value='October'>October</option>
		  <option value='November'>November</option>
		  <option value='December'>December</option>
		</select>
		<select id='year' name='year'>
			<option value='2020'>2020</option>
			<option value='2021'>2021</option>
			<option value='2022'>2022</option>
		</select>
		<select id='pat_id' placeholder='Select patient ID' name='pat_id'>
		  <?php include 'db.php';
		  $patient_id = $_POST['pat_id'];
		  echo "<option value='$patient_id'>Patient id: $patient_id</option>";
		  ?>
		</select>
		<input type='submit' value='Plot patient data'>;

		</form>

    
 </section>
