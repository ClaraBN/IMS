<?php
	function redirect() {
		header('Location: register_user.php');
		//make a page that says "oops something went wrong, please try again from the beginning"
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		redirect();
	} else {
		include 'openDB.php';

		//$email = $_GET['email'];
		//$token = $_GET['token'];
		//should be
		$email =  $link -> real_escape_string($_GET['email']);
		$token = $link -> real_escape_string($_GET['token']);

		$sql =  mysqli_query($link, "SELECT id FROM temp_users WHERE email='$email' AND token='$token' AND isEmailConfirmed=0");
		if ($sql->num_rows > 0) {
			mysqli_query($link, "UPDATE temp_users SET isEmailConfirmed=1, token='' WHERE email='$email'");
			include "../html/login.html";
		} else
			redirect();
	}