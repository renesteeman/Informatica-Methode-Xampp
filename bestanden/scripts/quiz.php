<?php
	include('DB_connect.php');
	session_save_path('../tmp');
	session_start();

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//get and filter data
	$id = check_input($_SESSION["id"]);
	$hoofdstuk_id = $_POST['chapter_id'];
	$antwoorden = $_POST['antwoorden'];

	$punten = 0;
	$cijfer = 0;
	$correct = [];
	$incorrect = [];
	$uitleg = [];
	$error = '';

	$juisteAntwoorden = [];

	$sql = "SELECT antwoord, uitleg FROM quiz_vragen WHERE hoofdstuk_id='$hoofdstuk_id'";
	if (mysqli_query($conn, $sql)) {
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$Cantwoord = $row['antwoord'];
				$Cuitleg = $row['uitleg'];

				$juisteAntwoorden[] = $Cantwoord;
				$uitleg[] = $Cuitleg;
			}
		}
	}

	for($i=0; $i<count($antwoorden); $i++){
		if($antwoorden[$i] == $juisteAntwoorden[$i]){
			$punten++;
			$correct[] = $i;
		} else {
			$incorrect[] = $i;
		}
	}

	$cijfer = ((($punten * 10) / count($antwoorden)) * 9 + 10)/10;
	$cijfer = number_format(round(floatval($cijfer)), 1);

	//check if user already has a score for the quiz
	$sql = "SELECT cijfer FROM quiz_results WHERE userid=$id AND hoofdstuk_id='$hoofdstuk_id'";

	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		//if no result is found than insert result
		if (mysqli_num_rows($result) == 0){
			$sql = "INSERT INTO quiz_results (userid, hoofdstuk_id, cijfer) VALUES ($id, '$hoofdstuk_id', $cijfer)";
			if (mysqli_query($conn, $sql)) {

			} else {
				$error = "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}
		} else {
			$result = mysqli_fetch_assoc($result);
			$Ccijfer = $result['cijfer'];

			if($cijfer > $Ccijfer){
				$sql = "UPDATE quiz_results SET cijfer=$cijfer WHERE userid=$id AND hoofdstuk_id='$hoofdstuk_id'";
				if (mysqli_query($conn, $sql)) {

				} else {
					$error = "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				}
			}
		}

	} else {
		$error = "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
	}

	$result = 'Je hebt een '.$cijfer.' gehaald';

	$verbeteringen = [];
	for($i=0; $i<sizeof($incorrect); $i++){
		$number = $incorrect[$i];
		$verbeteringen[] = $juisteAntwoorden[$number];
	}

	$return = array('result'=>$result, 'right'=>$correct, 'wrong'=>$incorrect, 'corrections'=>$verbeteringen, 'uitleg' => $uitleg, 'error'=>$error);
	$return = json_encode($return, JSON_FORCE_OBJECT);

	echo $return;

?>
