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
	$debug = "";

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
	$paragraph = mysqli_real_escape_string($conn, check_input($_POST['paragraph']));
	$chapter_name = mysqli_real_escape_string($conn, check_input($_POST['chapter_name']));
	$paragraph_name = mysqli_real_escape_string($conn, check_input($_POST['paragraph_name']));
	$chapter = mysqli_real_escape_string($conn, check_input($_POST['chapter']));

  $main = mysqli_real_escape_string($conn, check_input($_POST['main']));
  $questions = mysqli_real_escape_string($conn, check_input($_POST['questions']));
  $answers = mysqli_real_escape_string($conn, check_input($_POST['answers']));

	$Nchapter_Name = mysqli_real_escape_string($conn, check_input($_POST['Nchapter_Name']));
	$Nparagraph_Name = mysqli_real_escape_string($conn, check_input($_POST['Nparagraph_Name']));

	//DEBUG
	/*
	$chapterID = 1;
	$paragraph_id = "Aanmaken";
	$paragraph = 1;
	$chapter_name = 'Werking computer';
	$paragraph_name = '';
	$chapter = 'H1';

  $main = 'test';
  $questions = 'test';
  $answers = 'test';

	$Nchapter_Name = "edited chapter 3";
	$Nparagraph_Name = "";
	*/

	if(is_null($Nchapter_Name) OR $Nchapter_Name == ""){
		$Nchapter_Name = $chapter_name;
	}

	if(is_null($Nparagraph_Name) OR $Nparagraph_Name == ""){
		$Nparagraph_Name = $paragraph_name;
	}

	function createChapter($school, $chapter, $name){
		global $conn;

		$sql = "INSERT INTO theorie_hoofdstukken(school, hoofdstuk, hoofdstuk_naam) VALUES ('$school', '$chapter', '$name')";

		if (mysqli_query($conn, $sql)) {
			$msg .= "\nEen nieuw hoofdtuk is aangemaakt.";

			return True;
		} else {
			$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			$error = 1;
			return False;
		}
	}

	function getChapterId($school, $chapter, $name){
		global $conn;
		global $msg;
		global $error;

		//get the new chapter_id
		$sql = "SELECT hoofdstuk_id FROM theorie_hoofdstukken WHERE school='$school' AND hoofdstuk='$chapter' AND hoofdstuk_naam='$name'";

		if (mysqli_query($conn, $sql)) {
			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);

			$id = $result['hoofdstuk_id'];

			return $id;
		} else {
			$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			$error = 1;
			return False;
		}
	}

	function createParagraph($chapterID, $paragraph, $name, $main, $questions, $answers){
		global $conn;
		global $msg;
		global $error;

		$sql = "INSERT INTO theorie_paragrafen(hoofdstuk_id, paragraaf, paragraaf_naam, main, questions, answers) VALUES ('$chapterID', '$paragraph', '$name', '$main', '$questions', '$answers')";

		if (mysqli_query($conn, $sql)) {
			$msg .= "\nEr is een paragraaf aangemaakt.";
		} else {
			$msg .= "\n1Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			$error = 1;
		}
	}

	function updateChapterName($name, $id){
		global $conn;
		global $msg;
		global $error;

		$sql = "UPDATE theorie_hoofdstukken SET hoofdstuk_naam='$name' WHERE hoofdstuk_id='$id'";
		if (mysqli_query($conn, $sql)){
			$msg .= "\nSuccesvol opgeslagen";
		} else {
			$msg .= "\n2Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			$error = 1;
		}
	}

	$sql = "SELECT school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];

		if($functie=='docent'){
			//check wheter a chapter is created or is edited
			if($chapterID == "Aanmaken"){
				//create a new blank chapter
				$Nchapter = mysqli_real_escape_string($conn, check_input($_POST['Nchapter']));

				//create new chapter if the chapter code is valid
				if($Nchapter[0] == 'H' OR $Nchapter[0] == 'B' OR $Nchapter[0] == 'V'){
					//controleer of dit hoofdstuk al bestaat
					$sql = "SELECT hoofdstuk_id FROM theorie_hoofdstukken WHERE hoofdstuk='$Nchapter' AND school='$school'";

					if(mysqli_query($conn, $sql)) {
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							$msg .= "Dit hoofdstuk bestaat al voor uw school.";
							$error = 1;
						} else {
							if(createChapter($school, $Nchapter, $Nchapter_Name)){
								$NewChapterID = getChapterId($school, $Nchapter, $Nchapter_Name);
								if($NewChapterID != False){
									createParagraph($NewChapterID, '1', $Nparagraph_Name, $main, $questions, $answers);
								}
							}
						}
					} else {
						$msg .= "\n3Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
						$error = 1;
					}
				} else {
					$msg .= "\nDe hoofdstuk code is niet correct, gebruik hiervoor de volgende notatie: Hx, Vx of Bx.";
					$error = 1;
				}

			} else {
				//edit an existing chapter or duplicate one
				//get theory school
				$sql = "SELECT school FROM theorie_hoofdstukken WHERE hoofdstuk_id='$chapterID'";

				if (mysqli_query($conn, $sql)) {
					$result = mysqli_query($conn, $sql);
					$result = mysqli_fetch_assoc($result);
					$theory_school = $result['school'];

					//if the theory belong to the school itself and not to Inforca, than update the theory, else create a new row for the school
					if($school == $theory_school){
						if($paragraph_id == "Aanmaken"){
							//find out what paragraph would come next in the chapter
							$sql = "SELECT MAX(paragraaf) FROM theorie_paragrafen WHERE hoofdstuk_id='$chapterID'";

							$result = mysqli_query($conn, $sql);
							$result = mysqli_fetch_assoc($result);
							$Nparagraph = $result['MAX(paragraaf)'] + 1;

							//create new paragraph
							createParagraph($chapterID, $Nparagraph, $Nparagraph_Name, $main, $questions, $answers);

						} else {
							//edit paragraph
							//update the paragraph
							$sql = "UPDATE theorie_paragrafen SET main='$main', questions='$questions', answers='$answers', paragraaf_naam='$Nparagraph_Name' WHERE paragraaf_id='$paragraph_id'";

							if (mysqli_query($conn, $sql)) {
								if($Nchapter_Name != $chapter_name){
									//update the chapter's name if it's changed
									updateChapterName($Nchapter_Name, $chapterID);
								} else {
									$msg .= "\nSuccesvol opgeslagen";
								}

							} else {
								$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
						    $error = 1;
							}
						}

					} else {
						//the theory belongs to inforca
						//check if the school already has an edited version of this chapter
						$sql = "SELECT school FROM theorie_hoofdstukken WHERE hoofdstuk='$chapter' AND school='$school'";

						if(mysqli_query($conn, $sql)) {
							$result = mysqli_query($conn, $sql);
							//if it does not
							if(mysqli_num_rows($result) == 0){
								//create new chapter
								$sql = "INSERT INTO theorie_hoofdstukken(school, hoofdstuk, hoofdstuk_naam) VALUES ('$school', '$chapter', '$Nchapter_Name')";

								if (mysqli_query($conn, $sql)) {
									$msg .= "\nEen nieuw hoofdtuk is aangemaakt.";
								} else {
									$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							    $error = 1;
								}

								//get the new chapter_id
								$NewChapterID = getChapterId($school, $chapter, $Nchapter_Name);

								//duplicate 'old' chapter
								//paragraphs
								$sql = "SELECT paragraaf, paragraaf_naam, main, questions, answers FROM theorie_paragrafen WHERE hoofdstuk_id='$chapterID'";

								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										$Cparagraph = check_input($row["paragraaf"]);
										$CparagraphName = check_input($row["paragraaf_naam"]);
										$Cmain = check_input($row["main"]);
										$Cquestions = check_input($row["questions"]);
										$Canswers = check_input($row["answers"]);
										$sql = "INSERT INTO theorie_paragrafen(hoofdstuk_id, paragraaf, paragraaf_naam, main, questions, answers) VALUES ('$NewChapterID', '$Cparagraph', '$CparagraphName', '$Cmain', '$Cquestions', '$Canswers')";

										if (mysqli_query($conn, $sql)) {
											$msg .= "\nEr is een duplicaate paragraaf aangemaakt van dit hoofdstuk voor uw school.";
										} else {
											$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
									    $error = 1;
										}
									}
								} else {
									$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							    $error = 1;
								}

								//duplicate docs
								$sql = "SELECT document_title, document_subtitle, document_content FROM theorie_documenten WHERE hoofdstuk_id='$chapterID'";

								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										$Cdocument_title = check_input($row["document_title"]);
										$Cdocument_subtitle = check_input($row["document_subtitle"]);
										$Cdocument_content = check_input($row["document_content"]);
										$sql = "INSERT INTO theorie_documenten(hoofdstuk_id, document_title, document_subtitle, document_content) VALUES ('$NewChapterID', '$Cdocument_title', '$Cdocument_subtitle', '$Cdocument_content')";

										if (mysqli_query($conn, $sql)) {
											$msg .= "\nEr is een duplicaat document aangemaakt van dit hoofdstuk voor uw school.";
										} else {
											$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
									    $error = 1;
										}
									}
								}

								//duplicate quiz
								$sql = "SELECT vraag, optie1, optie2, optie3, optie4, antwoord, uitleg FROM quiz_vragen WHERE hoofdstuk_id='$chapterID'";

								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										$Cvraag = check_input($row["vraag"]);
										$Coptie1 = check_input($row["optie1"]);
										$Coptie2 = check_input($row["optie2"]);
										$Coptie3 = check_input($row["optie3"]);
										$Coptie4 = check_input($row["optie4"]);
										$Cantwoord = check_input($row["antwoord"]);
										$Cuitleg = check_input($row["uitleg"]);
										$sql = "INSERT INTO quiz_vragen(hoofdstuk_id, vraag, optie1, optie2, optie3, optie4, antwoord, uitleg) VALUES ('$NewChapterID', '$Cvraag', '$Coptie1', '$Coptie2', '$Coptie3', '$Coptie4', '$Cantwoord', '$Cuitleg')";

										if (mysqli_query($conn, $sql)) {
											$msg .= "\nEr is een duplicaate quiz aangemaakt van dit hoofdstuk voor uw school.";
										} else {
											$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
									    $error = 1;
										}
									}
								} else {
									$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							    $error = 1;
								}

								//duplicate quiz results
								$sql = "SELECT userid, cijfer FROM quiz_results WHERE hoofdstuk_id='$chapterID'";

								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										$Cuserid = check_input($row["userid"]);
										$Ccijfer = check_input($row["cijfer"]);
										$sql = "INSERT INTO quiz_results(userid, hoofdstuk_id, cijfer) VALUES ('$Cuserid', '$NewChapterID', '$Ccijfer')";

										if (mysqli_query($conn, $sql)) {
											$msg .= "\nEr is een quiz resultaat gedupliceerd van dit hoofdstuk voor uw versie van dit hoofdstuk.";
										} else {
											$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
									    $error = 1;
										}
									}
								} else {
									$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							    $error = 1;
								}

								//add chapter
								if($paragraph_id == "Aanmaken"){
									//find out what paragraph would come next in the chapter
									$sql = "SELECT MAX(paragraaf) FROM theorie_paragrafen WHERE hoofdstuk_id='$chapterID'";

									$result = mysqli_query($conn, $sql);
									$result = mysqli_fetch_assoc($result);
									$Nparagraph = $result['MAX(paragraaf)'] + 1;

									//create new paragraph
									createParagraph($NewChapterID, $Nparagraph, $Nparagraph_Name, $main, $questions, $answers);

								} else {
									//save the changes made to the previously duplicated paragraph
									$sql = "UPDATE theorie_paragrafen SET paragraaf='$paragraph', paragraaf_naam='$Nparagraph_Name', main='$main', questions='$questions', answers='$answers' WHERE hoofdstuk_id='$NewChapterID' AND paragraaf='$paragraph'";

									if (mysqli_query($conn, $sql)) {
										$msg .= "\nUw aangepaste paragraaf is succesvol opgeslagen";
									} else {
										$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
								    $error = 1;
									}
								}
							} else {
								$msg .= "\nDit hoofdstuk bestaat al voor uw school.";
								$error = 1;
							}
						} else {
							$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					    $error = 1;
						}
					}
				} else {
					$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			    $error = 1;
				}
			}

		} else {
			$msg.="\nU bent geen docent.";
			$error = 1;
		}

	} else {
		$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		$error = 1;
	}

  $toReturn = array('msg' => $msg, 'error' => $error, 'debug'=>$debug);
	$toReturn = json_encode($toReturn);

	echo $toReturn;
?>
