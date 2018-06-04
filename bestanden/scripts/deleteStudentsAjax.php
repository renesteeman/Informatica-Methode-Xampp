<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];
	$school = '';
	$functie = '';

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	for($i=0; $i<count($_POST['namen']); $i++){
		$naam = mysqli_real_escape_string($conn, check_input($_POST['namen'][$i]));

		$sql = "DELETE FROM users WHERE username='$naam'";

		if (mysqli_query($conn, $sql)) {
			echo "Account van ".$naam." is verwijderd.";
		} else {
			echo "SQL error, report to admin";
		}
	};

?>
