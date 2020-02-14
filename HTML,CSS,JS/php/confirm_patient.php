<?php
	function redirect() {
		header('Location: ../html/Home.html');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token']) || !isset($_GET['pid']) || !isset($_GET['did'])) {
		redirect();
	} else {
		include 'db.php';

		$email = $_GET['email'];
		$token = $_GET['token'];
		$patient_id = $_GET['pid'];
		$doctor_id = $_GET['did'];
		
		//should be
		// $email = real_escape_string($_GET['email']);
		// $token = real_escape_string($_GET['token']);

		$sql =  mysqli_query($link, "SELECT * FROM patients_doctors WHERE doctor_id = '$doctor_id' AND patient_id = '$patient_id' AND token='$token' AND is_confirmed='0'");
		$row = mysqli_fetch_row($sql);
		if (!empty($row)) {
			mysqli_query($link, "UPDATE patients_doctors SET is_confirmed='1', token='null' WHERE doctor_id = '$doctor_id' AND patient_id = '$patient_id'");
			header('Location: ../html/login.html');
		} else {
			redirect();
			}
	}