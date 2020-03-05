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
		.content_information {
	width: 70%;
    margin: 0 auto;
}
</style>

<link href="../css/educational.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
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
        <li><a href="My_health.php">My health</a></li>
        <li><a href="exercise_login.php">Exercise tracker</a></li>
		<li><a href="educational_page_login.php">Learn more</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li style="color:yellow;font-weight: bold;
            background-color: #73716A; padding-top: 6px">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
      </ul>  
  </header>
  <!-- Hero Section -->
  <section class="hero" id="hero">
	  <p class="general_info">Diabetes mellitus is a cluster of illnesses defined by high levels of blood glucose. Nowadays, it affects more than 400 million people in the world. There are three main types of diabetes (although they're not the only ones) and it's linked to many other health issues. In this page, you'll be able to learn more about this disease. For that purpose, we've compiled information from several official sources. Ready to learn more?</p>
  </section>
	<section class="about" id="about">
    <h2 class="hidden">About</h2>
    <span><p class="text_column"><span class="information_head">Global scale of diabetes <br></span>
    <a href="https://www.who.int/news-room/fact-sheets/detail/diabetes" target="_blank">Key facts (WHO)</a><br>
    <a href="https://www.who.int/diabetes/country-profiles/en/" target="_blank">Country profiles (WHO)</a><br>
    <a href="https://www.who.int/diabetes/global-report/en/" target="_blank">Global report on diabetes, 2016 (WHO)</a><br>
    <a href="https://www.who.int/features/qa/65/en/" target="_blank">Risks of diabetes in children (WHO)</a></p>

    <p class="text_column"><span class="information_head">Recently diagnosed? <br></span>
    <a href="https://www.diabetes.org/diabetes/type-1/type-1-self-care-manual" target="_blank">Type I diabetes self-care manual</a><br>
    <a href="https://www.diabetes.org/diabetes/gestational-diabetes/how-to-treat-gestational-diabetes" target="_blank">Treatment of gestational diabetes</a><br>
    <a href="https://www.diabetes.org/diabetes/device-technology" target="_blank">Possible devices</a><br>
    <a href="https://www.diabetes.org/nutrition/food-and-blood-sugar" target="_blank">Food and blood sugar</a></p>

    <p class="text_column"><span class="information_head">Think you may be affected? <br></span>
    <a href="https://www.diabetes.org/diabetes/type-1/symptoms" target="_blank">Symptoms of type I diabetes</a><br>
    <a href="https://www.diabetes.org/diabetes/type-2/symptoms" target="_blank">Symptoms of type II diabetes</a><br>
    <a href="https://www.diabetes.org/risk-test" target="_blank">Diabetes risk test</a><br>
    <a href="https://www.diabetes.org/diabetes/genetics-diabetes" target="_blank">The genetics of diabetes</a></p>
    </span>
 </section>
</div>
</body>
</html>

