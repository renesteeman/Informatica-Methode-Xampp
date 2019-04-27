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

	$error = 0;
	$msg = "";

	//get and filter data
	$id = $_SESSION["id"];
	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));
	$NInaam = mysqli_real_escape_string($conn, check_input($_POST['NInaam']));
	$NIomschrijving = mysqli_real_escape_string($conn, check_input($_POST['NIomschrijving']));
	$NIklas = mysqli_real_escape_string($conn, check_input($_POST['NIklas']));
	$NIdatum = mysqli_real_escape_string($conn, check_input($_POST['NIdatum']));
	$NIdatum = date("Y-m-d", strtotime($NIdatum));

	$CInaam = check_input($_SESSION["itemname"]);
	$CIid = check_input($_SESSION["itemID"]);
	$CIklas = check_input($_SESSION["itemklas"]);
	$CIdatum = check_input($_SESSION["itemdatum"]);
	$CIdatum = date("Y-m-d", $CIdatum);

	$NIprogressie = [];

	if(isset($_POST['NIprogressie'])){
		$NIprogressieUnchecked = $_POST['NIprogressie'];

		//check array and stored filtered array
		$count = count($NIprogressieUnchecked);
		for($i=0;$i<$count;$i++){
			$progressieChecked = mysqli_real_escape_string($conn, check_input($NIprogressieUnchecked[$i]));
			$NIprogressie[] = $progressieChecked;
		}
	} else {
		$NIprogressie = [];
	}

	//get password for id
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

			} else {
				$msg .=  "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 1";
			}

			if($NInaam!=""){
				$sql = "UPDATE planner SET titel='$NInaam' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					$msg .=  "\nNieuwe naam voor opdracht is succesvol ingesteld";
					$_SESSION["itemnaam"] = $NInaam;
					$CInaam = $_SESSION["itemnaam"];

				} else {
					$msg .=  "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 2";
					$error = 1;
				}
			}

			if($NIomschrijving!=""){
				$sql = "UPDATE planner SET beschrijving='$NIomschrijving' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					$msg .=  "\nNieuwe beschrijving voor opdracht is succesvol ingesteld";
				} else {
					$msg .=  "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 3";
					$error = 1;
				}
			}

			if($NIklas!=""){
				$sql = "UPDATE planner SET klas='$NIklas' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					$msg .=  "\nNieuwe klas voor opdracht is succesvol ingesteld";
					$_SESSION["itemklas"] = $NIklas;
					$CIklas = $_SESSION["itemklas"];
				} else {
					$msg .=  "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 4";
					$error = 1;
				}
			}

			if($NIdatum!=""){
				$sql = "UPDATE planner SET datum='$NIdatum' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					$msg .=  "\nNieuwe datum voor opdracht is succesvol ingesteld";
					$_SESSION["itemdatum"] = $NIdatum;
					$CIdatum = $_SESSION["itemdatum"];
				} else {
					$msg .=  "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 5";
					$error = 1;
				}
			}

			if($NIprogressie!=""){
				$chapters = [];

				$chaptersString = "";

				$count2 = count($NIprogressie);
				for($i=0; $i<$count2;$i++){
					$chapter = $NIprogressie[$i];
					$chapters[] = $chapter;
				}

				sort($chapters);

				for($i=0; $i<$count; $i++){
					$chaptersString .= $chapters[$i].', ';
				};

				$sql = "UPDATE planner SET progressie='$chaptersString' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					$msg .=  "\nNieuwe hoofdstuk(ken) voor opdracht is succesvol ingesteld";

				} else {
					$msg .=  "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 6";
					$error = 1;
				}

			}
		} else {
			$msg .=  "\nVerkeerd wachtwoord";
			$error = 1;
		}

	} else {
		$msg .=  "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 7";
	}

	$toReturn = array('msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;

	$conn->close();
?>
