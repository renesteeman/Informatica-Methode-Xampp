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
	$_SESSION['itemID'] =  mysqli_real_escape_string($conn, check_input($_POST['itemID']));
	$_SESSION['itemklas'] =  mysqli_real_escape_string($conn, check_input($_POST['itemklas']));
	$_SESSION['itembeschrijving'] =  mysqli_real_escape_string($conn, check_input($_POST['itembeschrijving']));

	$date = mysqli_real_escape_string($conn, check_input($_POST['itemdatum']));
	$_SESSION['itemdatum'] = $date;
	echo $date;

?>
