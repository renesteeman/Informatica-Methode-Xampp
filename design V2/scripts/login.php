<?php
	include('DB_connect.php');

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//get given login data
	$username = mysqli_real_escape_string($conn, check_input($_POST['username']));
	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));

	//get password for $username
	$sql = "SELECT password FROM users WHERE username='$username";

	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];

	} else {
		echo "Error with sql execution, please report to admin </br>";
	}

	//check psw
	if(password_verify($password, $rightpsw)){
		echo "Logged in <br />";

		//start session with username
		session_start();
		$_SESSION["username"] = $username;

		header("Location: ../pages/index.php");

		echo "Error redirecting";
	   exit;

	} else {
		echo "False login <br />";
	}

?>
