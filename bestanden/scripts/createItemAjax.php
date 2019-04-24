<?php
	include('DB_connect.php');
	session_start();

	$id = check_input($_SESSION["id"]);
	$Inaam = "";
	$Iomschrijving = "";
	$Ischool = "";
	$Iklas = "";
	$Idatum = "";
	$Iprogressie = "";

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//get given login data if set
	if(isset($_POST)){
		//get school from teacher
		$sql = "SELECT school FROM users WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$Ischool = $result['school'];

		} else {
			echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}

		//get info
		if(isset($_POST['Inaam'])){
			if($_POST['Inaam'] != ""){
				$Inaam = mysqli_real_escape_string($conn, check_input($_POST['Inaam']));
			}
		};

		if(isset($_POST['Iomschrijving'])){
			if($_POST['Iomschrijving'] != ""){
				$Iomschrijving = mysqli_real_escape_string($conn, check_input($_POST['Iomschrijving']));
			}
		};

		if(isset($_POST['Iklas'])){
			if($_POST['Iklas'] != ""){
				$Iklas = mysqli_real_escape_string($conn, check_input($_POST['Iklas']));
			}
		};

		if(isset($_POST['Idatum'])){
			if($_POST['Idatum'] != ""){
				$Idatum = mysqli_real_escape_string($conn, check_input($_POST['Idatum']));
				//TODO fix y2k38 bug (wait for new php version or 64-bit server?)
				$Idatum = date("Y-m-d", strtotime($Idatum));
			}
		};

		if(isset($_POST['Iprogressie'])){
			if($_POST['Iprogressie'] != ""){
				$chapters = [];

				$count = count($_POST['Iprogressie']);
				for($i=0; $i<$count; $i++){
					$chapter = mysqli_real_escape_string($conn, check_input($_POST['Iprogressie'][$i]));
					$chapters[] = $chapter;
				};

				//sort chapters before 'saving' them
				sort($chapters);

				for($i=0; $i<$count; $i++){
					$Iprogressie .= $chapters[$i].', ';
				};

			}
		};

		if(isset($_POST['password'])){
			if($_POST['password'] != ""){
				$password = mysqli_real_escape_string($conn, check_input($_POST['password']));
			}
		};

		//get password for user
		$sql = "SELECT password FROM users WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$rightpsw = $result['password'];

			//check psw
			if(password_verify($password, $rightpsw)){
				if($Inaam != "" & $Iomschrijving != "" & $Iklas != "" & $Idatum != ""){

					//check if data is unique
					$sql = mysqli_query($conn, "SELECT * FROM planner WHERE titel='$Inaam' AND klas='$Iklas' AND datum='$Idatum'");

					if(mysqli_num_rows($sql) != 0){
						echo "\nDeze opdracht bestaat al. Verander de naam, klas of datum";
					} else {
						//create group
						$sql = "INSERT INTO planner (titel, beschrijving, progressie, school, klas, datum) VALUES ('$Inaam', '$Iomschrijving', '$Iprogressie', '$Ischool', '$Iklas', '$Idatum')";

						if (mysqli_query($conn, $sql)) {
							echo "Opdracht succesvol toegevoegd";
						} else {
							echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
						}
					}

				} else {
					echo "\nNiet alle informatie is ontvangen of de informatie is niet correct";
				}

			} else {
				echo "\nVerkeerd wachtwoord";
			}

		} else {
			echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}

	}


?>
