<?php
	include('DB_connect.php');
	session_save_path('../tmp');
	session_start();

	$id = $_SESSION["id"];
	$school = "";
  $functie = "";
  $error = 0;
  $msg = "";

  $theory_id = "";
	$theory_chapter = "";
	$theory_paragraph = "";
	$theory_paragraph_name = "";
	$theory_chapter_name = "";

  $main = "";
	$questions = "";
	$answers = "";

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

  $theory_id = mysqli_real_escape_string($conn, check_input($_POST['theory_id']));
	$theory_chapter = mysqli_real_escape_string($conn, check_input($_POST['chapter']));
	$theory_paragraph = mysqli_real_escape_string($conn, check_input($_POST['paragraph']));
	$theory_paragraph_name = mysqli_real_escape_string($conn, check_input($_POST['paragraph_name']));
	$theory_chapter_name = mysqli_real_escape_string($conn, check_input($_POST['chapter_name']));

  $main = mysqli_real_escape_string($conn, check_input($_POST['main']));
  $questions = mysqli_real_escape_string($conn, check_input($_POST['questions']));
  $answers = mysqli_real_escape_string($conn, check_input($_POST['answers']));

	$sql = "SELECT school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];

		if($functie=='docent'){
			$sql = "SELECT school FROM theorie WHERE theory_id='$theory_id'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$theory_school = $result['school'];

				//if the theory belong to the school itself and not to Inforca, than update the theory, else create a new row for the school
				if($school == $theory_school){
					$sql = "UPDATE theorie SET main='$main', questions='$questions', answers='$answers' WHERE theory_id='$theory_id'";

					if (mysqli_query($conn, $sql)) {
						$msg .= "\nSuccesvol opgeslagen";
					} else {
						$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				    $error = 1;
					}
				} else {
					$sql = "INSERT INTO theorie(school, hoofdstuk, paragraaf, hoofdstuk_naam, paragraaf_naam, main, questions, answers) VALUES ('$school', '$theory_chapter', '$theory_paragraph', '$theory_chapter_name', '$theory_paragraph_name', '$main', '$questions', '$answers')";

					if (mysqli_query($conn, $sql)) {
						$msg .= "\nSuccesvol opgeslagen";
					} else {
						$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				    $error = 1;
					}
				}
			} else {
				$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		    $error = 1;
			}

		} else {
			$msg.="\nU bent geen docent.";
			$error = 1;
		}

	} else {
		$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		$error = 1;
	}

  $toReturn = array('msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;

?>
