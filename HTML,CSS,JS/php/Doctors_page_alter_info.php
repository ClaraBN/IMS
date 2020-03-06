<!doctype html>
<?php
session_start(); // Right at the top of your script
?>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Change information</title>
<link href="../css/doctor.css" rel="stylesheet" type="text/css">

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
.content_information {
	width: 400px;
    margin: 0 auto;
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
    <a href="Doctors_home_page.php"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>
  <input class="menu-btn" type="checkbox" id="menu-btn" />
   <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <ul class="menu">
        <li><a href="Doctors_home_page.php">Home</a></li>
        <li><a href="Doctors_page.php">My page</a></li>
		<li><a href="logout.php">Logout</a></li>
		<li style="color:yellow;font-weight: bold; background-color: #73716A; padding-top: 6px">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
      </ul>
  </header>

  <?php
    include 'db.php';
    $doc_id = $_SESSION['id'];
    $Doctor_info = "SELECT * FROM $dbname.users WHERE $dbname.users.id = '$doc_id'";
    $result_doctor = mysqli_query($link, $Doctor_info);
    $row_doctor = mysqli_fetch_row($result_doctor);
  ?>

  <section class="about" id="about">
  <section class="content_information">
    <h1 class = "nutritional_h1">Personal information</h1><br><br>
    <p><em>Update personal settings</em></p>
    <form name = "update_user" action="../php/update_info_user.php" method="POST">
    	<strong>First name:</strong> <input type="text" name="fname" value='<?php echo $row_doctor[7];?>' required><br>
    	<strong>Last name: </strong><input type="text" name="lname" value='<?php echo $row_doctor[8];?>' required><br>
    	<strong>Workplace: </strong><input type="text" name="workplace" value='<?php echo $row_doctor[9];?>' required><br>
    	<strong>SSN: </strong><input type="tel" pattern="[0-9]{6}-[0-9]{4}" name="ssn" value='<?php echo $row_doctor[4];?>' required><br>
    	<strong>Username: </strong><input type="text" maxlength = "16" name="username" value='<?php echo $row_doctor[1];?>' required><br>
    	<strong>Email: </strong><input type="email" name="email" value='<?php echo $row_doctor[2];?>' required><br>
    	<strong>Password: </strong><input type="password" maxlength = "50"  name="pw1" placeholder="Enter password" required><br>
    	<strong>Confirm password: </strong><input type="password" maxlength = "50" name="pw2" placeholder="Confirm password" required><br>
    	<input type="submit" value="Save">
    	<button type="button" onClick="window.location.href = '../php/Doctors_page.php';">Go back</button>
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
