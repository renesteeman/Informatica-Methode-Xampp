<?php
	include('DB_connect.php');
	session_save_path('../tmp');
	session_start();

	$id = check_input($_SESSION["id"]);
	$school = "";
  $functie = "";
  $error = 0;
  $msg = "";

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		return $data;
	}

	$sql = "SELECT school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];

		if($functie=='docent'){
			$sql = "SELECT DISTINCT hoofdstuk_id, hoofdstuk, hoofdstuk_naam, school FROM theorie_hoofdstukken WHERE school='$school' OR school='Inforca' ORDER BY hoofdstuk";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);

		    if (mysqli_num_rows($result) > 0) {
		      while($row = mysqli_fetch_assoc($result)) {
						$hoofdstukID = $row['hoofdstuk_id'];
		        $hoofdstuk = $row["hoofdstuk"];
		        $hoofdstukNaam = $row["hoofdstuk_naam"];
						$hoofdstukSchool = $row["school"];

						if($hoofdstukSchool == 'Inforca'){
							$msg .= '
			          <option value="'.$hoofdstukID.'">'.$hoofdstuk.' '.$hoofdstukNaam.'</option>
			        ';
						} else {
							$msg .= '
			          <option value="'.$hoofdstukID.'">'.$hoofdstuk.' '.$hoofdstukNaam.'*</option>
			        ';
						}

		      }
		    } else {
		      $msg .= '
		        <option value=""></option>
		      ';
		    }

		    $msg .= '
		      <option value="Aanmaken">Aanmaken</option>
		    ';

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

  $toReturn = array('msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;

?>
