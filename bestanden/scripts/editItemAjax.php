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

	$error = 0;
	//get and filter data
	$id = $_SESSION["id"];
	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));
	$NInaam = mysqli_real_escape_string($conn, check_input($_POST['NInaam']));
	$NIomschrijving = mysqli_real_escape_string($conn, check_input($_POST['NIomschrijving']));
	$NIklas = mysqli_real_escape_string($conn, check_input($_POST['NIklas']));
	$NIdatum = mysqli_real_escape_string($conn, check_input($_POST['NIdatum']));
	$NIdatum = date("Y-m-d", strtotime($NIdatum));

	$CInaam = $_SESSION["itemname"];
	$CIid = $_SESSION["itemID"];
	$CIklas = $_SESSION["itemklas"];
	$CIdatum = $_SESSION["itemdatum"];
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
				echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 1";
			}

			if($NInaam!=""){
				$sql = "UPDATE planner SET titel='$NInaam' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe naam voor opdracht is succesvol ingesteld";
					$_SESSION["itemnaam"] = $NInaam;
					$CInaam = $_SESSION["itemnaam"];

				} else {
					echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 2";
					$error = 1;
				}
			}

			if($NIomschrijving!=""){
				$sql = "UPDATE planner SET beschrijving='$NIomschrijving' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe beschrijving voor opdracht is succesvol ingesteld";
				} else {
					echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 3";
					$error = 1;
				}
			}

			if($NIklas!=""){
				$sql = "UPDATE planner SET klas='$NIklas' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe klas voor opdracht is succesvol ingesteld";
					$_SESSION["itemklas"] = $NIklas;
					$CIklas = $_SESSION["itemklas"];
				} else {
					echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 4";
					$error = 1;
				}
			}

			if($NIdatum!=""){
				$sql = "UPDATE planner SET datum='$NIdatum' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe datum voor opdracht is succesvol ingesteld";
					$_SESSION["itemdatum"] = $NIdatum;
					$CIdatum = $_SESSION["itemdatum"];
				} else {
					echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 5";
					$error = 1;
				}
			}

			if($NIprogressie!=""){
				$chapters = "";
				$count2 = count($NIprogressie);
				for($i=0; $i<$count2;$i++){
					$chapters .= $NIprogressie[$i].', ';
				}
				$sql = "UPDATE planner SET progressie='$chapters' WHERE school='$school' AND id='$CIid'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe hoofdstuk(ken) voor opdracht is succesvol ingesteld";

				} else {
					echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 6";
					$error = 1;
				}

			}
		} else {
			echo "Verkeerd wachtwoord";
			$error = 1;
		}

	} else {
		echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 7";
	}

	if($error==1){
		die(header("HTTP/1.0 404 Not Found"));
	}

	$conn->close();

?>
