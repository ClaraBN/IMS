<!DOCTYPE html>
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
</head>

<body style="font-family: source-sans-pro;">
<div class="container" align="center">
    <header class="page_header">
        <a href="Home.html"><span></span><h4 class="logo">DiaBeatIt</h4></a>
            <nav>
                <ul>
                    <li><a href="../html/Home.html">Home</a></li>
                    <li><a href="../html/nutrition.html">Nutrition checker</a></li>
					<li><a href="../html/exercise.html">Exercise tracker</a></li>
            		<li><a href="../html/educational_page.html">Learn more</a></li>
                    <li><a href="../html/login.html">Log In&nbsp;</a></li>
                </ul>
            </nav>
        </header>
        
        <section>
            <h1 class="hero_header" style="width: 250px; margin: 0 auto;">Exercise tracker</h1>
        </section>
        
    <div style="width: 500px;  height:500px; margin: 0 auto;">
    <form name="exercise_log" action="../php/exercise_after_submit.php" method="POST"><br><br>
        <fieldset>
            <legend>Exercise log</legend>
            	Biological sex:<br>
            	<input list="sex" name="sex" placeholder="Insert biological sex" required>
                	<datalist id="sex">
                    	<option value="Female">
                    	<option value="Male">
                </datalist><br><br>
                Age: <br>
                <input type="number" min=10 max=120 name="age" placeholder="Age" required><br><br>
            	Height (cm): <br>
            	<input type="number" min=100 max=200 name="height" placeholder="Height" required><br><br>
                Weight (kg): <br>
                <input type="number" min=20 max=200 name="weight" placeholder="Weight" required><br><br>
            			
            	What type of exercise did you do?<br>
            	For how long did you exercise?<br> 
                    <div id="container">
                    <input list="extype" name="extype" placeholder="Insert intensity" required>
                        <datalist id="extype">
                            <option value="Low intensity">
                            <option value="Medium intensity">
                            <option value="High intensity">
                        </datalist>
                        <input list="exquant" name="exquant" placeholder="Insert time" required>
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
<?php
$sex = $_POST['sex'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$ex_type = $_POST['extype'];
$ex_quant = $_POST['exquant'];

if ($sex == "Female"){
   $bmr = bmr_female($age,$height,$weight,$ex_type,$ex_quant); 
} else {
   $bmr = bmr_male($age,$height,$weight,$ex_type,$ex_quant); 
}

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
                        	'<input list="extype" name="extype" placeholder="Insert intensity" required>' +
                            '<datalist id="extype">' +
                            '<option value="Low intensity">' +
                            '<option value="Medium intensity">' +
                            '<option value="High intensity">' +
                            '</datalist>' +
                            '<input list="exquant" name="exquant" placeholder="Insert time" required>' +
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

