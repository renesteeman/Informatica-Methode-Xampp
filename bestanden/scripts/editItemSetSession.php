<?php
	include('DB_connect.php');
	session_start();

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		return $data;
	}

	$_SESSION['itemname'] =  mysqli_real_escape_string($conn, check_input($_POST['itemname']));
	$_SESSION['itemID'] =  mysqli_real_escape_string($conn, check_input($_POST['itemID']));
	$_SESSION['itemklas'] =  mysqli_real_escape_string($conn, check_input($_POST['itemklas']));
	$_SESSION['itembeschrijving'] =  mysqli_real_escape_string($conn, check_input($_POST['itembeschrijving']));
	$_SESSION['itemdatum'] = mysqli_real_escape_string($conn, check_input($_POST['itemdatum']));
?>
