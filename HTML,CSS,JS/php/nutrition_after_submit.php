<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Light Theme</title>
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
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Navigation -->
  <header class="page_header"> 
    <a href="../html/Home.html"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>
  </a>
    <nav>
      <ul>
        <li><a href="../html/Home.html">Home</a></li>
        <li><a href="../html/nutrition.html">Nutrition checker</a></li>
		<li><a href="../html/exercise.html">Calorie burn</a></li>
		<li><a href="../html/educational_page.html">Learn more</a></li>
        <li> <a href="../html/login.html">Sign In&nbsp;</a></li>
      </ul>
    </nav>
  </header>
	
  
  <section class="text_column">
	<h1 class = "nutritional_h1">Nutritional information</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
	</p>
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

