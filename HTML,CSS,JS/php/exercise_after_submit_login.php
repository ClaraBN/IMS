<!DOCTYPE html>
<?php
session_start();
include 'db.php';
?>

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

<div>
<?php
$date = $_POST["date"];
$time = $_POST["time"];
$sex = $_POST["sex"];
$age = $_POST["age"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$ex_type = $_POST["extype"];
$ex_quant = $_POST["exquant"];

$insert = "INSERT INTO exercise(fdate,ftime,sex,age,height,weight,patient_id,ex_type,min_spent) VALUES('$date','$time','$sex', '$age', '$height', '$weight', ".$_SESSION['id'].",'$ex_type','$ex_quant')";
mysqli_query($link, $insert);


echo "<br>";
echo $date;
echo "<br>";
echo $time;
echo "<br>";
echo $sex;
echo "<br>";
echo $age;
echo "<br>";
echo $height;
echo "<br>";
echo $weight;
echo "<br>";
echo $ex_type;
echo "<br>";
echo $ex_quant;
echo "<br>";

if ($sex == "Female"){
   echo bmr_female($age,$height,$weight); 
} else {
    echo bmr_male($age,$height,$weight); 
}

echo "<br>";


function bmr_female($age,$height,$weight){
    return 655 + (9.6*$weight) + (1.8*$height) - (4.7*$age);
}

function bmr_male($age,$height,$weight){
    return 66 + (13.7*$weight) + (5*$height) - (6.8*$age);
}

?>

</div>
</body>
</html>