<!doctype html>
<?php
session_start(); // Right at the top of your script
?>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Educational page</title>
<style>
    a { text-decoration: none; }
</style>

<link href="../css/educational.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<style>
.nutritional_h1 {
	color: #FF00FF;
	font-weight: bold;
	font-size: 30px;
	width: 100%;
	float: left;
}
</style>
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Navigation -->
  <header class="page_header"> 
    <a href="Home_login.php"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>
  </a>
    <nav>
      <ul>
        <li><a href="Home_login.php">Home</a></li>
        <li><a href="My_health.php">My health</a></li>
		 <li><a href="educational_page_login.php">Learn more</a></li>
		 <li><a href="logout.php">Logout</a></li>
		 <li style="color:yellow;font-weight:strong">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
        <!--<li> <a href="login.html">Sign In&nbsp;</a></li>-->
      </ul>
    </nav>
  </header>
  <!-- Hero Section -->
  <section class="hero" id="hero">
  <h1 class = "nutritional_h1">Track your health</h1>
	  </p><form action="My_data_plot.php" method="POST">
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
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
		</select>
		<select id="content_type" name="content_type">
			<option value="carbohydrate">Carbohydrate</option>
			<option value="sugar">Sugar</option>
			<option value="fat">Fat</option>
			<option value="protein">Protein</option>
			<option value="alcohol">Alcohol</option>
		</select>
		<input type="submit" value="Plot my data">
		</form>
  </section>
  
	<section class="about" id="about">
 </section>
  <!--
	<section class="about" id="about">
    <h2 class="hidden">About</h2>
	<p class="text_column"><span class="information_head">Nutritional Checker </span> sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
    <p class="text_column"><span class="information_head">Users </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
    <p class="text_column"><span class="information_head">Doctors </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
  </section>
  -->
</div>
</body>
</html>

