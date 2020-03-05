<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nutrition checker</title>
<link href="../css/nutrition.css" rel="stylesheet" type="text/css">

<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>

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
</head>
<body>
<!-- Main Container -->
<div class="container">
  <!-- Navigation -->
  <header class="header">
    <a href="Home.html"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>

    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <ul class="menu">
        <li><a href="../html/Home.html">Home</a></li>
        <li><a href="../html/nutrition.html">Nutrition checker</a></li>
		<li><a href="../html/exercise.html">Exercise tracker</a></li>
	    <li><a href="../html/educational_page.html">Learn more</a></li>
        <li> <a href="../html/login.html">Log In&nbsp;</a></li>
      </ul>
  </header>

  <section class="hero" id="hero">
      <h1 class = "nutritional_h1">Nutritional information</h1>
        <p style="font-weight: bold;">In this page, you'll be able to keep track of your diet! Add food to your log to check what nutrients it contains.
	</p>
  </section>
  <section class="about" id="about">
  <section class="text_column">
	
	<div class="python_search_form">
	<p style="font-weight: bold;color:black;">Enter the food item here, if you cannot find in our database</p>
	<form id="python_form" action="../php/python_command.php" method="post">
	<input type="text"  id="search" name="food_name" placeholder="Name of the food"/>
	<input type="submit" name="python_search" value="search" form="python_form" />
	</form>
	</div>
        <br>
        <span><span><div class="Add_more_button">
	<button id="btn">Add more</button>
    </div></span>
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

<form action="nutrition_table_print.php" method="POST">
	<div id="container">
		<input type="text"  id="search0" name="food_name[]" placeholder="Name of the food" class="autoc" required />
		<input type="number" min="1" set="0.01" name="Quantity[]" placeholder="Quantity" required>
	</div>
</span>
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
        '<input type="text"  id="search'+count+'" name="food_name[]" placeholder="Name of the food" class="autoc"/>' +
		'<input type="number" min="1" set=0.01 name="Quantity[]" placeholder="Quantity">' +
    '</div>'+
'</div>'
}
</script>
<input type="submit" value="Submit">
</form>
<br>
<br>
<!--
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
</html> -->

