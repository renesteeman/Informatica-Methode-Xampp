<?php
	include('DB_connect.php');
	session_start();

	$id = check_input($_SESSION["id"]);
	$Gnaam = "";
	$Gomschrijving = "";
	$Glink = "";
	$Gschool = "";
	$group_id = "";

	$error = false;
	$return_msg = "";

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		return $data;
	}

	//get given login data if set
	if(isset($_POST)){
		//get school from teacher
		$sql = "SELECT school FROM users WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$Gschool = $result['school'];

		} else {
			$return_msg .= "\n1Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			$error = 1;
		}

		//get info
		if(isset($_POST['Gnaam'])){
			if($_POST['Gnaam'] != ""){
				$Gnaam = mysqli_real_escape_string($conn, check_input($_POST['Gnaam']));

				//check if Gnaam is already in use
				$sql = mysqli_query($conn, "SELECT naam FROM groepen WHERE naam='$Gnaam' and school='$Gschool'");

				if (mysqli_num_rows($sql) != 0) {
					$return_msg .= "\nGroepnaam is al in gebruik.";
	 			   $Gnaam = "";
				};
			}
		};

		if(isset($_POST['Gomschrijving'])){
			if($_POST['Gomschrijving'] != ""){
				$Gomschrijving = mysqli_real_escape_string($conn, check_input($_POST['Gomschrijving']));
			}
		};

		if(isset($_POST['Glink'])){
			if($_POST['Glink'] != ""){
				$Glink = mysqli_real_escape_string($conn, check_input($_POST['Glink']));
			}
		};

		if(isset($_POST['Gleden'])){
			if($_POST['Gleden'] != ""){
				$Gleden = [];

				$count = count($_POST['Gleden']);
				for($i=0; $i<$count; $i++){
					$lid = mysqli_real_escape_string($conn, check_input($_POST['Gleden'][$i]));
					array_push($Gleden, $lid);
				};
			}
		} else {
			$Gleden = [];
		}

		if($Gnaam != "" & $Gomschrijving != "" & $Gschool != "" & $Gleden !=""){
			//create group
			$sql = "INSERT INTO groepen (naam, beschrijving, link, school) VALUES ('$Gnaam', '$Gomschrijving', '$Glink', '$Gschool')";

			if (mysqli_query($conn, $sql)) {
				$return_msg .= "\nGroep succesvol toegevoegd";
			} else {
				$return_msg .= "\n3Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				$error = 1;
			}

			$sql = "SELECT id FROM groepen WHERE naam='$Gnaam' AND beschrijving='$Gomschrijving' AND link='$Glink' AND school='$Gschool'";

			if (mysqli_query($conn, $sql)) {
				//find teacher info
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$group_id = $result['id'];
			} else {
				echo "\n4Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}

			//link students to group
			$count2 = count($Gleden);
			for($i=0; $i < $count2; $i++){
				//select student
				$studentName = $Gleden[$i];

				$sql = mysqli_query($conn, "SELECT naam FROM users WHERE naam='$studentName' AND school='$Gschool'");

				if (mysqli_num_rows($sql) != 0){
					$sql = "UPDATE users SET group_id='$group_id' WHERE naam='$studentName' and school='$Gschool'";

					if (mysqli_query($conn, $sql)) {
						$return_msg .= "\n".$studentName." succesvol toegevoegd aan groep";
					} else {
						$return_msg .= "\n5Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
						$error = 1;
					}
				} else {
					$return_msg .= "\n".$studentName." bestaat niet. De groep wordt niet aangemaakt, zodat u dit kunt aanpassen.";
					$error = 1;
				}
			}

		} else {
			$return_msg .= "\nNiet alle informatie is ontvangen of de informatie is niet correct";
			$error = 1;
		}

	}

	$toReturn = array('msg' => $return_msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	#return data to ajax
	echo $toReturn;

	$conn->close();

?>
