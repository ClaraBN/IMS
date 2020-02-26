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
  <header class="page_header"> 
    <a href="Home_login.php"><span></span><h4 class="logo">DiaBeatIt</h4></span></a>
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
  
  <section class="content_information">
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

  <section class="content_information">
    <h1 class = "nutritional_h1">Patients</h1>
    <p><em>Summary of your patients</em>
    <?php
    include 'db.php';
    $doctor_id = $_SESSION['id'];
    $fetch_patients = "SELECT * FROM $dbname.patients_doctors WHERE $dbname.patients_doctors.doctor_id = '$doctor_id' AND $dbname.patients_doctors.is_confirmed ='1'";
    $result = mysqli_query($link, $fetch_patients);

    while($row = mysqli_fetch_row($result)) {
        $fetch_info = "SELECT * FROM $dbname.users WHERE $dbname.users.id = '$row[0]'";
        $result2 = mysqli_query($link, $fetch_info);
        $row2 = mysqli_fetch_row($result2);
        echo nl2br("".PHP_EOL."");
        echo "<form name = 'fetch_info' action='../php/Doctors_patient_page.php' method='POST'><input type='submit' name = 'pat_id' value='$row2[0]'></form>";

    }
    ?>

    <br><br>

    <p><em>Add patient</em>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    	<input type="email" name="email" placeholder="Patient Email" required><br>
    	<input type="number" name="patientid" placeholder="Patient ID" min = "0" max = "10000000" required><br>
    	<input type="submit" value="Send request to patient">
	</form><br>

    <?php
    include 'db.php';
    use PHPMailer\PHPMailer\PHPMailer;
    $send_err = "";
    $doctor_id = $_SESSION['id'];
    $abort_request = "yes";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    		include 'db.php';
            $token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!$/()*';
            $token = str_shuffle($token);
            $token = substr($token, 0, 10);

            $patient_id = $_POST['patientid']; //gör nån sql query för att hämta patient
			
			//Check if patient before sending request
			$patient_check = "SELECT * FROM users WHERE users.id = '$patient_id'";
			$result = mysqli_query($link, $patient_check);
			$patient_exist = mysqli_fetch_row($result);
	

			//Checking if patient ID and email match before sending request
            $e_mail = $_POST['email'];
            $email_check = "SELECT * FROM users WHERE users.id = '$patient_id' AND users.email = '$e_mail'";
            $result2 = mysqli_query($link, $email_check);
			$email_exists = mysqli_fetch_row($result2);

			
			if (empty($patient_exist)) {
				$abort_request = "no";
				echo "You tried to add a non-existing patient";
			}
			elseif ($patient_exist[10] != '1') {
				$abort_request = "no";
				echo "You tried to add a non-existing patient!";
			} 
			elseif (empty($email_exists)) {
				$abort_request = "no";
				echo "Wrong patient-email";	
			}

			
            
            if ($abort_request == "yes") {
            	include 'db.php';
            	require_once "../email/PHPMailer/PHPMailer.php";
            	require_once "../email/PHPMailer/SMTP.php";
            	require_once "../email/PHPMailer/Exception.php";

            	$mail = new PHPMailer();

            	//SMTP Settings
            	$mail->isSMTP();
            	$mail->Host = "smtp.gmail.com";
            	$mail->SMTPAuth = true;
            	$mail->Username = "diabeatit.ims@gmail.com";
            	$mail->Password = 'ims_1234';
            	$mail->Port = 465; //587
            	$mail->SMTPSecure = "ssl"; //tls

            	//Email Settings
            	$mail->isHTML(true);
            	$mail->setFrom($e_mail, 'DiaBeatIt');
            	$mail->addAddress($e_mail);
           	 	$mail->Subject = "Please verify your doctor";
            	$mail->Body = "
                	<h1>Someone wants to add you as a patient!</h1><br>
                	Please click on the link below to confirm the doctor with id '$doctor_id':
                	<a href='http://localhost:8888/php/confirm_patient.php?email=$e_mail&token=$token&pid=$patient_id&did=$doctor_id'>Click Here</a>
                	";
            	if ($mail->send()) {
                	$status = "success";
                	$response = "Email is sent!";
                	$sql = "INSERT INTO patients_doctors(patient_id, doctor_id, is_confirmed, token) VALUES ('$patient_id', '$doctor_id', '0', '$token')";
                	$result = mysqli_query($link, $sql);
                	echo $response;

            	} else {
                	$send_err = "The email failed to send";
                	$status = "failed";
                	$response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
                	echo $send_err;
            	}
			}
    	}
    ?>



</div>
</body>
</html>
