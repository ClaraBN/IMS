<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercise tracker</title>
    <link href="../css/exercise.css" rel="stylesheet" type="text/css">
    <script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
.bmr_output {
	font-size: 25px;
	font-weight: bold;
}
</style>
<?php
if(!isset($_SESSION['username'])){
    header('location:../html/login.html');
}
?>
</head>

<body style="font-family: source-sans-pro;">

    <div class="container" align="center">
        <header class="page_header">
            <a href="Home_login.php"><span></span><h4 class="logo">DiaBeatIt</h4></a>
            <nav>
                <ul>
                    <li><a href="Home_login.php">Home</a></li>
                    <li><a href="nutrition_login.php">Nutrition checker</a></li>
                    <li><a href="../html/exercise.html">Exercise tracker</a></li>
                    <li><a href="educational_page_login.php">Learn more</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li style="color:yellow;font-weight:strong">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
                </ul>
            </nav>
        </header>
 <section>
        <h1 class="hero_header" style="font-size: 25px; width: 350px; margin: auto;">Exercise tracker</h1>
    </section>

    <div style="width: 500px;  height:500px; margin: 0 auto;">
        <form name="exercise_log" action="../php/exercise_db_entry.php" method="POST"><br><br>
            <fieldset>
                <legend>Exercise log</legend>
            		Date:<br>
            		<input type="date" name="date" placeholder="Enter date" required /><br><br>
                    Time:<br>
                    <input type="time" name="time" placeholder="Enter time" required /><br><br>
            		Biological sex:<br>
            		<input list="sex" name="sex" placeholder="Insert biological sex" required>
                		<datalist id="sex">
                    		<option value="Female">
                    		<option value="Male">
                		</datalist><br><br>
                    Age: <br>
                    <input type="number" min=10 max=120 name="age" placeholder="Age"
                               id="myInput1" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)" required><br><br>
            		Height (cm): <br>
            		<input type="number" min=50 max=200 name="height" placeholder="Height"
                               id="myInput2" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)" required><br><br>
                    Weight (kg): <br>
                    <input type="number" min=20 max=200 name="weight" placeholder="Weight"
                               id="myInput3" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)" required><br><br>

            		What type of exercise did you do?<br>
            		For how long did you exercise?<br>

                    <form action="../php/exercise_after_submit_login.php" method="POST">
                        <div id="container">
                            <input list="extype" name="extype[]" placeholder="Insert intensity" required>
                            <datalist id="extype">
                                <option value="Low intensity">
                                <option value="Medium intensity">
                                <option value="High intensity">
                            </datalist>
                            <input list="exquant" name="exquant[]" placeholder="Insert time" required>
                            <datalist id="exquant">
                                <option value="+10 min">
                                <option value="+20 min">
                                <option value="+30 min">
                                <option value="+40 min">
                                <option value="+50 min">
                                <option value="+60 min">
                                <option value="+70 min">
                                <option value="+80 min">
                                <option value="+90 min">
                            </datalist>
                        </div>
                    <br>
                    <span><button class="Add_more_button" type="submit" id="btn">Add more exercise</button>
                    <input type="submit" value="Calculate">
                    </span>
				</fieldset>
            </form>
        </div>
	
<?php
include 'db.php';
$date = $link -> real_escape_string($_POST['date']);
$time = $link -> real_escape_string($_POST['time']);
$sex = $link -> real_escape_string($_POST["sex"]);
$age = $link -> real_escape_string($_POST["age"]);
$height = $link -> real_escape_string($_POST["height"]);
$weight = $link -> real_escape_string($_POST["weight"]);
$ex_types = $_POST["extype"];
$ex_quants = $_POST["exquant"];

if ($sex == "Female"){
   $bmr = bmr_female($age,$height,$weight,$ex_type,$ex_quant); 
} else {
   $bmr = bmr_male($age,$height,$weigh,$ex_type,$ex_quant); 
}

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br><br><div class=\"bmr_output\">";

function bmr_female($age,$height,$weight,$ex_type,$ex_quant){
    if($ex_type=="High intensity"){
      $bmr = (655 + (9.6*$weight) + (1.8*$height) - (4.7*$age))*1.8;
    } elseif ($ex_type=="Medium intensity" && $ex_quant>=60) {
      $bmr = (655 + (9.6*$weight) + (1.8*$height) - (4.7*$age))*1.8;
    } elseif ($ex_type=="Medium intensity" && $ex_quant<60) {
      $bmr = (655 + (9.6*$weight) + (1.8*$height) - (4.7*$age))*1.6;
    } else {
      $bmr = (655 + (9.6*$weight) + (1.8*$height) - (4.7*$age))*1.5;
    }
    return $bmr;
}

function bmr_male($age,$height,$weight,$ex_type,$ex_quant){
    if($ex_type=="High intensity"){
      $bmr = (66 + (13.7*$weight) + (5*$height) - (6.8*$age))*1.9;
    } elseif ($ex_type=="Medium intensity" && $ex_quant>=60) {
      $bmr = (655 + (9.6*$weight) + (1.8*$height) - (4.7*$age))*1.9;
    } elseif ($ex_type=="Medium intensity" && $ex_quant<60) {
      $bmr = (66 + (13.7*$weight) + (5*$height) - (6.8*$age))*1.8;
    } else {
      $bmr = (66 + (13.7*$weight) + (5*$height) - (6.8*$age))*1.6;
    }
    return $bmr;
}

echo "Basal metabolic rate = ",$bmr;
echo "</div>";

#Input data going into our database
$i = 0;
foreach( $ex_types as  $ex_type ) {
	$ex_quant = $link -> real_escape_string($ex_quants[$i]);
	$ex_type = $link -> real_escape_string($ex_type);
	$insert = "INSERT INTO exercise(date,time,sex,age,height,weight,patient_id,ex_type,min_spent,bmr) VALUES('$date','$time','$sex', '$age', '$height', '$weight', ".$_SESSION['id'].",'$ex_type','$ex_quant','$bmr')";
	mysqli_query($link, $insert);
	$i++;
}
?>
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
                            '});'+
                            '</scr' + 'ipt>' +
                            '<div class="row">' +
                            '<div class="col-md-4">' +
                        	'<input list="extype" name="extype[]" placeholder="Insert intensity" required>' +
                            '<datalist id="extype">' +
                            '<option value="Low intensity">' +
                            '<option value="Medium intensity">' +
                            '<option value="High intensity">' +
                            '</datalist>' +
                            '<input list="exquant" name="exquant[]" placeholder="Insert time" required>' +
                            '<datalist id="exquant">' +
                            '<option value="+10 min">' +
                            '<option value="+20 min">' +
                            '<option value="+30 min">' +
                            '<option value="+40 min">' +
                            '<option value="+50 min">' +
                            '<option value="+60 min">' +
                            '<option value="+70 min">' +
                            '<option value="+80 min">' +
                            '<option value="+90 min">' +
                            '</datalist>' +
                            '</div>'+
                            '</div>'
                            }
	</script>
 <section></section>
    <script>
        // Focus = Changes the background color of input to SkyBlue
        function focusFunction(x) {
            document.getElementById(x).style.background = "#e6f9ff";
        }
        // No focus = Changes the background color of input to white
        function blurFunction(x) {
            document.getElementById(x).style.background = "white";
        }
    </script>
</body>
</html>