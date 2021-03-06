<!doctype html>
<?php
session_start(); // Right at the top of your script
?>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Health</title>
<link href="../css/nutrition.css" rel="stylesheet" type="text/css">

<script>var __adobewebfontsappname__="dreamweaver"</script>
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
        <li><a href="../php/My_health.php">My health</a></li>
        <li><a href="../php/exercise_login.php">Exercise tracker</a></li>
	    <li><a href="../php/educational_page_login.php">Learn more</a></li>
	    <li><a href="../php/logout.php">Logout</a></li>
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

    <form action="../php/My_health_after_submit.php" method="POST">
	    <div id="container">
		    <input type="date" name="date" placeholder="Enter date" required />
		    <input type="time" name="time" placeholder="Enter time" required />
		    <input type="text"  id="search0" name="food_name[]" placeholder="Name of the food" class="autoc" required />
		    <input type="number" min="1" set="0.01" name="Quantity[]" placeholder="Quantity" required>
	    </div>
	        <div class="Add_more_button">
        <button id="btn" style="position:relative;left:0%">Add more</button>
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
	        <p style="font-weight: bold;color:black;">If you cannot find it in our database, enter the food item here and re-enter it above: </p>
	        <form id="python_form" action="../php/python_command_login.php" method="post">
	           <input type="text"  id="search" name="food_name" placeholder="Name of the food"/>
	           <input type="submit" name="python_search" value="search" form="python_form" />
	        </form>
	    </div>
	    <br>
	</section>







<section class="text_column">
	<h1 class = "nutritional_h1">Enter your BGL readings</h1>
	<form action="../php/BGL_entry.php" method="POST">
	<div id="container">
		<input type="date" name="date" placeholder="Enter date" required />
		<input type="time" name="time" placeholder="Enter time" required />
		<input type="text" name="bgl_level" placeholder="BGL value in mg/dL" required />
		<input type="submit" value="Submit and save">
		</div>
	</form>
</section>
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
