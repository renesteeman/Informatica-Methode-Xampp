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

	$id = $_SESSION["id"];
	$Inaam = $_SESSION["itemname"];
	$Iklas = $_SESSION["itemklas"];
	$Idatum = $_SESSION["itemdatum"];
	$Idatum = date("Y-m-d", strtotime($Idatum));

	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));

	//get password for user
	$sql = "SELECT password FROM users WHERE id='$id'";
	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];

		//check psw
		if(password_verify($password, $rightpsw)){
			$sql = "SELECT school FROM users WHERE id='$id'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$school = $result['school'];

				$sql = "DELETE FROM planner WHERE titel='$Inaam' AND school='$school' AND datum='$Idatum' AND klas='$Iklas'";

				if (mysqli_query($conn, $sql)) {
					echo $Inaam." is verwijderd";
				} else {
					echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				}

			} else {
				echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}
		} else {
			echo "Wrong password";
		}
	} else {
		echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
	}

?>
