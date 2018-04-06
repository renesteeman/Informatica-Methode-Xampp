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

	print_r ($_SESSION);

?>
