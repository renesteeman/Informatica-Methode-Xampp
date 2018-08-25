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

	$sql = "SELECT password, school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];
		$school = $result['school'];
		$functie = $result['functie'];
	}


	if($functie == 'docent'){
		$password = mysqli_real_escape_string($conn, check_input($_POST['password']));

		$count = count($_POST['namen']);
		for($i=0; $i<$count; $i++){
			$naam = mysqli_real_escape_string($conn, check_input($_POST['namen'][$i]));

			if(password_verify($password, $rightpsw)){
				$sql = "DELETE FROM users WHERE username='$naam' AND school='$school'";

				if (mysqli_query($conn, $sql)) {
					echo "Account van ".$naam." is verwijderd.";
				} else {
					echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				}
			} else {
				echo "Uw wachtwoord is incorrect.";
			}
		}
	}

?>
