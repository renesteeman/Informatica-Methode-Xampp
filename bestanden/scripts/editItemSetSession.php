<?php
	include('DB_connect.php');
	session_start();

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$_SESSION['itemname'] =  mysqli_real_escape_string($conn, check_input($_POST['itemname']));
	$_SESSION['itemklas'] =  mysqli_real_escape_string($conn, check_input($_POST['itemklas']));
	$_SESSION['itembeschrijving'] =  mysqli_real_escape_string($conn, check_input($_POST['itembeschrijving']));

	$gegevendatum = mysqli_real_escape_string($conn, check_input($_POST['itemdatum']));
	$year = date("Y");
	$date = $year.'-'.substr($gegevendatum, -2, 2).'-'.substr($gegevendatum, 0, 2);
	$_SESSION['itemdatum'] = $date;

?>
