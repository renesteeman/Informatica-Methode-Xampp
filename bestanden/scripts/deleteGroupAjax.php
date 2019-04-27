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

	$id = check_input($_SESSION["id"]);
	$Gnaam = check_input($_SESSION["groupname"]);
	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));
	$group_id = mysqli_real_escape_string($conn, check_input($_POST['group_id']));

	//get password for user
	$sql = "SELECT password, school FROM users WHERE id='$id'";
	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];
		$school = $result['school'];

		//check psw
		if(password_verify($password, $rightpsw)){

			$sql = "DELETE FROM groepen WHERE id='$group_id' AND school='$school'";

			if (mysqli_query($conn, $sql)) {
				echo $Gnaam." deleted";
			} else {
				echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}

			//delete group_name of current members
			$sql = "UPDATE users SET group_id=NULL WHERE group_id='$group_id' AND school='$school'";

			if (mysqli_query($conn, $sql)) {
				echo "\nLeden succesvol verwijderd";
			} else {
				echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}

		} else {
			echo "\nVerkeerd wachtwoord";
		}
	} else {
		echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
	}

?>
