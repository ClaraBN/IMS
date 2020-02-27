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
            		<li><a href="educational_page_login.php">Learn more</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <li style="color:yellow;font-weight:strong">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
                    <!--<li><a href="login.html">Sign In&nbsp;</a></li> -->
                </ul>
            </nav>
        </header>
        
        <section>
            <h1 class="hero_header heading_font">Exercise tracker</h1>
            <h1 class="hero_header">&nbsp;</h1>
        </section>

<?php        
$id = $_SESSION['id'];
$result = mysqli_query($link,"SELECT DISTINCT patient_id FROM exercise WHERE patient_id = '$id'");
$row = mysqli_fetch_assoc($result);
$patient_id = $row["patient_id"];

if ($patient_id == $id){
    ?>
    <div align="center">
    <section class="about" id="about">
        <form name="exercise_log" action="../php/exercise_after_submit_login.php" method="POST"><br><br>
            <fieldset>
                <legend>Exercise log</legend>
                    Date:<br>
                    <input type="date" name="date" placeholder="Enter date" required /><br><br>
                    Time:<br>
                    <input type="time" name="time" placeholder="Enter time" required /><br><br>
                        
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
                    <span>
                        <div class="Add_more_button">
                            <button id="btn">Add more exercise</button>
                            <br>
                        </div>
                    </span>
                                    

                        
                    <input type="submit" value="Save log">
                    </fieldset>
                    </form>
                
                
                        <script>
                            var count=1;
                              $("#btn").click(function(){
                              $("#container").append(addNewRow(count));
                                count++;
                                });
                        
                            function addNewRow(count){
                            return  '<scr' + 'ipt>'+
                            '$(function(){  '+
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
                
            </section>
            <?php
} else {
    ?> <div align="center">
    <section class="about" id="about">
        <form name="exercise_log" action="../php/exercise_after_submit_login.php" method="POST"><br><br>
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
                    <input type="number" min=0 max=120 name="age" placeholder="Age"
                               id="myInput1" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)" required><br><br>
                    Height (cm): <br>
                    <input type="number" min=100 max=200 name="height" placeholder="Height"
                               id="myInput2" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)" required><br><br>
                    Weight (kg): <br>
                    <input type="number" min=2 max=200 name="weight" placeholder="Weight"
                               id="myInput3" onfocus="focusFunction(this.id)" onblur="blurFunction(this.id)" required><br><br>
                        
                    What type of exercise did you do?<br>
                    For how long did you exercise?<br> 
                
                    <form action="../php/exercise_after_submit_login.php" method="POST">
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
                    <span>
                        <div class="Add_more_button">
                            <button id="btn">Add more exercise</button>
                            <br>
                        </div>
                    </span>
                                    

                        
                    <input type="submit" value="Save log">
                    </fieldset>
                    </form>
                
                
                        <script>
                            var count=1;
                              $("#btn").click(function(){
                              $("#container").append(addNewRow(count));
                                count++;
                                });
                        
                            function addNewRow(count){
                            return  '<scr' + 'ipt>'+
                            '$(function(){  '+
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
    <?php
}
?>

    </div>
    </div>
    
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