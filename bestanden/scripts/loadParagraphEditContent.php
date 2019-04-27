<?php
	include('DB_connect.php');
	session_save_path('../tmp');
	session_start();

	$id = $_SESSION["id"];
	$school = "";
  $functie = "";
  $error = 0;
	$msg = "";

	$paragraph_id = "";

  $main = "";
	$questions = "";
	$answers = "";

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		return $data;
	}

  $paragraph_id = mysqli_real_escape_string($conn, check_input($_POST['paragraph_id']));

	$sql = "SELECT school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];

		if($functie=='docent'){
			$sql = "SELECT main, questions, answers FROM theorie_paragrafen WHERE paragraaf_id='$paragraph_id'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);

        $main = $result["main"];
        $questions = $result["questions"];
				$answers = $result["answers"];

			} else {
				$msg .= "\n1Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		    $error = 1;
			}
		} else {
			$msg.="\nU bent geen docent.";
			$error = 1;
		}

	} else {
		$msg .= "\n2Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		$error = 1;
	}

  $toReturn = array('main'=> $main, 'questions'=>$questions, 'answers'=>$answers, 'msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;
?>
