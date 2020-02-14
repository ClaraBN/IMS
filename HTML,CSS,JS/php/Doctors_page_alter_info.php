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
 </style>
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

  <?php
    include 'db.php';
    $doc_id = $_SESSION['id'];
    $Doctor_info = "SELECT * FROM $dbname.users WHERE $dbname.users.id = '$doc_id'";
    $result_doctor = mysqli_query($link, $Doctor_info);
    $row_doctor = mysqli_fetch_row($result_doctor);
  ?>

  <section class="text_column">
    <h1 class = "nutritional_h1">Personal information</h1><br><br>
    <p><em>Update personal settings</em></p>
    <form name = "update_user" action="../php/update_info_user.php" method="POST">
    	<strong>First name:</strong> <input type="text" name="fname" value='<?php echo $row_doctor[7];?>' required><br>
    	<strong>Last name: </strong><input type="text" name="lname" value='<?php echo $row_doctor[8];?>' required><br>
    	<strong>Workplace: </strong><input type="text" name="workplace" value='<?php echo $row_doctor[9];?>' required><br>
    	<strong>SSN: </strong><input type="text" name="ssn" value='<?php echo $row_doctor[4];?>' required><br>
    	<strong>Username: </strong><input type="text" name="username" value='<?php echo $row_doctor[1];?>' required><br>
    	<strong>Email: </strong><input type="text" name="email" value='<?php echo $row_doctor[2];?>' required><br>
    	<strong>Password: </strong><input type="text" name="pw1" placeholder="Enter password" required><br>
    	<strong>Confirm password: </strong><input type="text" name="pw2" placeholder="Enter password" required><br>
    	<input type="submit" value="Save">
    	<button type="button" onClick="window.location.href = '../php/doctors_page.php';">Go back</button>
	</form>
  </section>


  <section class="text_column">
    <h1 class = "nutritional_h1">Patients</h1>
    <p><em>Summary of your patients</em>
    <?php
    include 'db.php';
    $doctor_id = $_SESSION['id'];
    $fetch_patients = "SELECT * FROM $dbname.patients_doctors WHERE $dbname.patients_doctors.doctor_id = '$doctor_id'";
    $result = mysqli_query($link, $fetch_patients);

    while($row = mysqli_fetch_row($result)) {
        $fetch_info = "SELECT * FROM $dbname.users WHERE $dbname.users.id = '$row[0]'";
        $result2 = mysqli_query($link, $fetch_info);
        $row2 = mysqli_fetch_row($result2);
        echo nl2br("".PHP_EOL."");
        echo '<button id="btn'.$row[0].'" style="position:relative;left:5%">'.$row[0].'</button>';
    }

    ?>

    <script>
    var url = window.location.href;
    $('#btn'.$row[0]).click(function($row[0]){
        window.location.href="https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(window.location.href)+"&t="+document.title;
    //$("#text_column").append(patient_page(count));
    });
    $('#btn2').attr("onclick", "patient_page(2)");
    function patient_page(id) {
       window.location.href="https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(window.location.href)+"&t="+document.title;
    }


    </script>

</div>
</body>
</html>
