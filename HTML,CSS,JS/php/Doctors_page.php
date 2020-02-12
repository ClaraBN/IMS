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
    <a href="Home_login.php"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>
  </a>
    <nav>
      <ul>
        <li><a href="Home_login.php">Home</a></li>
        <li><a href="Doctors_page.php">My page</a></li>
		<li><a href="educational_page_login.php">Learn more</a></li>
		<li><a href="logout.php">Logout</a></li>
        <li style="color:yellow;font-weight:strong">Welcome, &nbsp;<br><?php echo $_SESSION['username']; ?></li>
        <!--<li> <a href="login.html">Sign In&nbsp;</a></li> -->
      </ul>
    </nav>
  </header>
  
  <section class="text_column">
    <h1 class = "nutritional_h1">Personal information</h1><br>
    <p><em>Summary of your personal settings</em> <br><br>
    <?php
    include 'db.php';
    $doc_id = $_SESSION['id'];
    $Doctor_info = "SELECT * FROM $dbname.users WHERE $dbname.users.id = '$doc_id'";
    $result_doctor = mysqli_query($link, $Doctor_info);
    $row_doctor = mysqli_fetch_row($result_doctor);

    echo nl2br("<strong>First name: </strong>" . $row_doctor[7].PHP_EOL."");
    echo nl2br("<strong>Last name: </strong>" . $row_doctor[8].PHP_EOL."");
    echo nl2br("<strong>Workplace: </strong>" . $row_doctor[9].PHP_EOL."");
    echo nl2br("<strong>SSN: </strong>" . $row_doctor[4].PHP_EOL."");
    echo nl2br("<strong>Username: </strong>" . $row_doctor[1].PHP_EOL."");
    echo nl2br("<strong>Email: </strong>" . $row_doctor[2].PHP_EOL."");

    ?>
    <br><button type="button" onClick="window.location.href = '../php/doctors_page_alter_info.php';">Change personal settings</button>
    </p>
  </section>

  <section class="text_column">
    <h1 class = "nutritional_h1">Patients</h1>
    <p><em>Summary of your patients</em><br>
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
        //echo '<button id="btn'.$row[0].'" style="position:relative;left:5%">'.$row2[1].'</button>';
        //echo '<button type="button" onClick="window.location.href = /php/doctors_page_alter_info.php;">'.$row2[1].'</button>';
        //var id = '$row2[0]';
        //echo "<button type='button' id ='btn' onClick='fetch_patient_info.php'>".$row2[1].'</button>';
        echo "<form name = 'fetch_info' action='../php/Doctors_patient_page.php' method='POST'><input type='submit' name = 'pat_id' value='$row2[0]'></form>";
    }
    ?>




</div>
</body>
</html>
