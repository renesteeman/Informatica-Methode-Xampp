<?php
	include('DB_connect.php');
	session_start();

	$error = false;
	$msg = "";

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		return $data;
	}

	$id = $_SESSION["id"];
	$Inaam = check_input($_SESSION["itemname"]);
	$Iklas = check_input($_SESSION["itemklas"]);
	$Idatum = check_input($_SESSION["itemdatum"]);
	$Idatum = date("Y-m-d", strtotime($Idatum));

	$sql = "SELECT school FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];

		$sql = "DELETE FROM planner WHERE titel='$Inaam' AND school='$school' AND datum='$Idatum' AND klas='$Iklas'";

		if (mysqli_query($conn, $sql)) {
			$msg .= $Inaam." is verwijderd";
		} else {
			$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			$error = 1;
		}

	} else {
		$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		$error = 1;
	}

	$toReturn = array('msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;

	mysqli_close($conn);

?>
