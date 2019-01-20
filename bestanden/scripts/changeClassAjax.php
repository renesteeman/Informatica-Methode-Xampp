<?php
	include('DB_connect.php');
	session_start();

	$id = $_SESSION["id"];
	$school = '';
	$functie = '';

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$Nklas = mysqli_real_escape_string($conn, check_input($_POST['Nklas']));
	$namen = [];

	if(isset($_POST['namen'])){
		$count = count($_POST['namen']);
		for($i=0; $i<$count; $i++){
			$naam = mysqli_real_escape_string($conn, check_input($_POST['namen'][$i]));
			array_push($namen, $naam);
		}
	} else {
		echo "U heeft geen leerlingen opgegeven.";
	}

	$sql = "SELECT school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];
	}

	if($functie == 'docent'){
		$count = count($namen);
		for($i=0; $i<$count; $i++){
			$naam = $namen[$i];
			$sql = "UPDATE users SET klas='$Nklas' WHERE naam='$naam' AND school='$school'";

			if (mysqli_query($conn, $sql)) {
				echo "\nDe klas is voor ".$naam." succesvol aangepast";

			} else {
				echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}
		}
	} else {
		echo "U bent geen docent!".
	}

?>
