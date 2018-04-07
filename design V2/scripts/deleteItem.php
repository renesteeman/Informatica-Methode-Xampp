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

	$user = $_SESSION["username"];
	$Inaam = $_SESSION["itemname"];
	$Iklas = $_SESSION["itemklas"];
	$Idatum = $_SESSION["itemdatum"];
	$Idatum = date("Y-m-d", strtotime($Idatum));

	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));

	//get password for $user
	$sql = "SELECT password FROM users WHERE username='$user'";
	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];

		//check psw
		if(password_verify($password, $rightpsw)){
			$sql = "SELECT school FROM users WHERE username='$user'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$school = $result['school'];

				$sql = "DELETE FROM planner WHERE titel='$Inaam' AND school='$school' AND datum='$Idatum' AND klas='$Iklas'";

				if (mysqli_query($conn, $sql)) {
					echo $Inaam." is verwijderd";
				} else {
					echo "Error with sql execution, please report to admin (Delete group)";
				}

			} else {
				echo "Error with sql execution, please report to admin";
			}
		} else {
			echo "Wrong password";
		}
	} else {
		echo "Error with sql execution, please report to admin";
	}

?>
