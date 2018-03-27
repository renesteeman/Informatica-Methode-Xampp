<?php

	session_start();

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$_SESSION['groupname'] = check_input($_POST['groupname']);

	print_r ($_SESSION);

?>
