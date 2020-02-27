<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercise tracker</title>
    <link href="../css/register.css" rel="stylesheet" type="text/css">
    <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page.
    We recommend that you do not modify it.-->
        <script>var __adobewebfontsappname__="dreamweaver"</script>
        <script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<style>
/* Container */
.container {
    width: 90%;
    margin-left: auto;
    margin-right: auto;
    height: 1000px;
    background-color: #FFFFFF;
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
  text-align: left;
}
tr:nth-child(even) {background-color: #f2f2f2;}
th {
  background-color: #73713b;
  color: white;
}
.pop_up_for_adding{
    color: black;
    font-weight: bold;
}
</style>
</head>

<body style="font-family: source-sans-pro;">

    <div class="container" align="center">
        <header class="page_header">
            <a href="../html/Home.html"><span></span><h4 class="logo">DiaBeatIt</h4></a>
            <nav>
                <ul>
                    <li><a href="../html/Home.html">Home</a></li>
                    <li><a href="../html/nutrition.html">Nutrition checker</a></li>
                    <li><a href="../html/educational_page.html">Learn more</a></li>
                    <li><a href="../html/login.html">Sign In&nbsp;</a></li>
                </ul>
            </nav>
        </header>

<div>
<?php

$sex = $_POST['sex'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$ex_type = $_POST['extype'];
$ex_quant = $_POST['exquant'];

echo "<div class='info text'>";
echo "<h1>Calory intake</h1>";
echo "<p>Depending on certain biological factors such as age, weight, height or sex, the maximum amount of calories you can ingest while maintaining your current weight will vary.</php>";
echo "<p>In the following table, you will find this information as your Basal Metabolic Rate.</p>";
echo "<br>";
echo "<p>According to the information you specified:</p>";
echo "<br>";
echo "</div>";
echo "<table border='1'>"; //define an html table
//<th> Defines a header cell in a table
//<tr> Defines a row in a table
//<td> Defines a cell in a table
echo "<tr><th>Sex</th><th>Age</th><th>Height</th><th>Weight</th><th>Exercise type</th><th>Amount of exercise</th><th>Basal metabolic rate</th></tr>";
echo "<tr><td>";
echo $sex;
echo "</td><td>";
echo $age;
echo "</td><td>";
echo $height;
echo "</td><td>";
echo $weight;
echo "</td><td>";
echo $ex_type;
echo "</td><td>";
echo $ex_quant;
echo "</td><td>";
if ($sex == "Female"){
   echo $bmr = bmr_female($age,$height,$weight,$ex_type); 
} else {
    echo $bmr = bmr_male($age,$height,$weight,$ex_type); 
}
echo "</td></tr>";
echo "</table>";

function bmr_female($age,$height,$weight,$ex_type){
    if ($ex_type == "Low intensity"){
      $bmr = (655 + (9.6*$weight) + (1.8*$height) - (4.7*$age))*1.5;
    } elseif ($ex_type == "Medium intensity"){
      $bmr = (655 + (9.6*$weight) + (1.8*$height) - (4.7*$age))*1.6;
    } else {
      $bmr = (655 + (9.6*$weight) + (1.8*$height) - (4.7*$age))*2;
    }
    return $bmr;
    
}

function bmr_male($age,$height,$weight,$ex_type){
    if ($ex_type == "Low intensity"){
      return (66 + (13.7*$weight) + (5*$height) - (6.8*$age))*1.5;
    } elseif ($ex_type == "Medium intensity"){
      return (66 + (13.7*$weight) + (5*$height) - (6.8*$age))*1.7;
    } else {
      return (66 + (13.7*$weight) + (5*$height) - (6.8*$age))*2;
    }
}
?>
</div>
</body>

</html>