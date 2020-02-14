<!doctype html>
<?php
session_start(); // Right at the top of your script
?>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Light Theme</title>
<link href="../css/home_page.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Navigation -->
  <header class="page_header"> 
    <a href="Doctors_home_page.php"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>
  </a>
    <nav>
      <ul>
        <li><a href="Doctors_home_page.php">Home</a></li>
        <li><a href="Doctors_page.php">My page</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li style="color:yellow;font-weight:strong">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
        <!--<li> <a href="login.html">Sign In&nbsp;</a></li> -->
      </ul>
    </nav>
  </header>
  <!-- Hero Section -->
  <h1  class="hero_header"><section class="header_text">Welcome to</section></h1>
  <h1  class="hero_header">&nbsp;</section>
  <section class="hero" id="hero">
	  
  </section>
	<section class="about" id="about">
    <h2 class="hidden">About</h2>
	<p class="text_column"><span class="information_head">Nutritional Checker </span> Our Nutritional Checker tool will help you make a first step towards a healthier life! Thanks to our extensive, documented database, you will learn a lot about the composition of the food you eat every day. Have you been recently diagnosed with diabetes? Keeping track of your carbohydrates ingest will make everything much easier. Were you diagnosed a long time ago? You can still keep track of what you are eating and improve your diet! </p>
    <p class="text_column"><span class="information_head">Users </span>Diabetes experiences are as diverse as people are. We classify our users according to the three main diabetes types (1, 2 and gestational). That way, we are able to provide you with specific information. You will be able to learn more about your nutritional needs, health risks, mental health concerns... Being informed is the first step to prevention. </p>
    <p class="text_column"><span class="information_head">Doctors </span>Are you the doctor of one of our users? Then, this website is also for you! You will be able to use it to help them understand the importance of a healthy diet. In addition, you will be able to keep track of their diet logs. This way, you would notice areas of improvement much faster and will be able to give them more specific recommendations. </p>
  </section>
</div>
</body>
</html>