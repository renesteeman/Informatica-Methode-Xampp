<?php
	include('DB_connect.php');
	session_save_path('../tmp');
	session_start();

	$id = $_SESSION["id"];
	$school = "";
  $functie = "";
  $error = 0;
  $msg = "";
	$chapter = "";

	$school_theory_ids = [];
	$school_theory_paragraphs = [];
	$inforca_theory_ids = [];
	$inforca_theory_paragraphs = [];

	$theory_ids = [];
	$theory_paragraphs = [];

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

  //TODO $chapter = mysqli_real_escape_string($conn, check_input($_POST['chapter']));
	$chapter = "H1";

	$sql = "SELECT school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];

		if($functie=='docent'){
			$sql = "SELECT theory_id, paragraaf FROM theorie WHERE school='$school' AND hoofdstuk='$chapter'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);

		    if (mysqli_num_rows($result) > 0) {
		      while($row = mysqli_fetch_assoc($result)) {
		        $theory_id = $row["theory_id"];
		        $paragraaf = $row["paragraaf"];

						$school_theory_ids[] = $theory_id;
						$school_theory_paragraphs[] = $paragraaf;
		      }
				}

				$sql = "SELECT theory_id, paragraaf FROM theorie WHERE school='Inforca' AND hoofdstuk='$chapter'";

				if (mysqli_query($conn, $sql)) {
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							$theory_id = $row["theory_id"];
							$paragraaf = $row["paragraaf"];

							$inforca_theory_ids[] = $theory_id;
							$inforca_theory_paragraphs[] = $paragraaf;
						}
					}

					$theory_ids = $inforca_theory_ids;
					$theory_paragraphs = $inforca_theory_paragraphs;

					for($i=0; $i<count($school_theory_paragraphs);$i++){
						$paragraphSchool = $school_theory_paragraphs[$i];
						$array_found_index = array_search($paragraphSchool, $inforca_theory_paragraphs);

						//check if a paragrpahs from the school is found and if so replace it by the school version
						if($array_found_index !== False){
							$theory_ids[$array_found_index] = $school_theory_ids[$i];
							$theory_paragraphs[$array_found_index] = $school_theory_paragraphs[$i];
						}
					}

					if(count($theory_ids) > 0){
						for($i=0; $i<count($theory_ids); $i++) {

							$theory_id = $theory_ids[$i];
							$paragraaf_name = $theory_paragraphs[$i];

							$msg .= '<option value="'.$theory_id.'">'.$paragraaf_name.'</option>';
						}
					}
					//TODO remove when create option is added
					else {
						$msg .= '<option value=""></option>';
					}

					/*
					$msg .= '<option value="Aanmaken">Aanmaken</option>';
					*/

				} else {
					$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					$error = 1;
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
