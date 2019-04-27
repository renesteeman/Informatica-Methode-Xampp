<?php
	include('DB_connect.php');
	session_save_path('../tmp');
	session_start();

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		return $data;
	}

	$id = check_input($_SESSION["id"]);
	$school = "";
  $functie = "";
  $error = 0;
  $msg = "";

	$chapterID = "";
	$paragraph_id = "";

	$paragraph = "";
	$chapter_name = "";
	$paragraph_name = "";
	$chapter = "";

  $main = "";
	$questions = "";
	$answers = "";

	$chapterID = mysqli_real_escape_string($conn, check_input($_POST['chapterID']));
	$paragraph_id = mysqli_real_escape_string($conn, check_input($_POST['paragraph_id']));
	$paragraph = mysqli_real_escape_string($conn, check_input(htmlentities($_POST['paragraph'], ENT_QUOTES)));
	$chapter_name = mysqli_real_escape_string($conn, check_input(htmlentities($_POST['chapter_name'], ENT_QUOTES)));
	$paragraph_name = mysqli_real_escape_string($conn, check_input(htmlentities($_POST['paragraph_name'], ENT_QUOTES)));
	$chapter = mysqli_real_escape_string($conn, check_input(htmlentities($_POST['chapter'], ENT_QUOTES)));

  $main = mysqli_real_escape_string($conn, check_input(htmlentities($_POST['main'], ENT_QUOTES)));
  $questions = mysqli_real_escape_string($conn, check_input(htmlentities($_POST['questions'], ENT_QUOTES)));
  $answers = mysqli_real_escape_string($conn, check_input(htmlentities($_POST['answers'], ENT_QUOTES)));

	$sql = "SELECT school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];

		if($functie=='docent'){
			$sql = "SELECT school FROM theorie_hoofdstukken WHERE hoofdstuk_id='$chapterID'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$theory_school = $result['school'];

				//if the theory belong to the school itself and not to Inforca, than update the theory, else create a new row for the school
				if($school == $theory_school){
					$sql = "UPDATE theorie_paragrafen SET main='$main', questions='$questions', answers='$answers' WHERE paragraaf_id='$paragraph_id'";

					if (mysqli_query($conn, $sql)) {
						$msg .= "\nSuccesvol opgeslagen";
					} else {
						$msg .= "\n1Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				    $error = 1;
					}
				} else {
					//create new chapter
					$sql = "INSERT INTO theorie_hoofdstukken(school, hoofdstuk, hoofdstuk_naam) VALUES ('$school', '$chapter', '$chapter_name')";

					if (mysqli_query($conn, $sql)) {
						$msg .= "\nEen nieuw hoofdtuk is aangemaakt.";
					} else {
						$msg .= "\n2Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				    $error = 1;
					}

					//get the new chapter_id
					$sql = "SELECT hoofdstuk_id FROM theorie_hoofdstukken WHERE school='$school' AND hoofdstuk='$chapter' AND hoofdstuk_naam='$chapter_name'";

					if (mysqli_query($conn, $sql)) {
						$result = mysqli_query($conn, $sql);
						$result = mysqli_fetch_assoc($result);

						$NewChapterID = $result['hoofdstuk_id'];
					} else {
						$msg .= "\n3Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				    $error = 1;
					}

					//duplicate 'old' chapter
					$sql = "SELECT paragraaf, paragraaf_naam, main, questions, answers FROM theorie_paragrafen WHERE hoofdstuk_id='$chapterID'";

					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							$Cparagraph = htmlentities($row["paragraaf"], ENT_QUOTES);
							$CparagraphName = htmlentities($row["paragraaf_naam"], ENT_QUOTES);
							$Cmain = htmlentities($row["main"], ENT_QUOTES);
							$Cquestions = htmlentities($row["questions"], ENT_QUOTES);
							$Canswers = htmlentities($row["answers"], ENT_QUOTES);

							$sql = "INSERT INTO theorie_paragrafen(hoofdstuk_id, paragraaf, paragraaf_naam, main, questions, answers) VALUES ('$NewChapterID', '$Cparagraph', '$CparagraphName', '$Cmain', '$Cquestions', '$Canswers')";

							if (mysqli_query($conn, $sql)) {
								$msg .= "\nEr is een duplicaat hoofdstuk aangemaakt voor uw school.";
							} else {
								$msg .= "\n4Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
						    $error = 1;
							}
						}
					}

					$sql = "UPDATE theorie_paragrafen SET paragraaf='$paragraph', paragraaf_naam='$paragraph_name', main='$main', questions='$questions', answers='$answers' WHERE paragraaf_id='$paragraph_id'";

					echo $sql;

					if (mysqli_query($conn, $sql)) {
						$msg .= "\nUw aangepaste paragraaf is succesvol opgeslagen";
					} else {
						$msg .= "\n5Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				    $error = 1;
					}
				}
			} else {
				$msg .= "\n6Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		    $error = 1;
			}

		} else {
			$msg.="\nU bent geen docent.";
			$error = 1;
		}

	} else {
		$msg .= "\n7Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		$error = 1;
	}

  $toReturn = array('msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;

?>
