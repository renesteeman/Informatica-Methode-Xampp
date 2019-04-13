<?php
	include('DB_connect.php');
	session_save_path('../tmp');
	session_start();

	$id = $_SESSION["id"];
	$school = '';
  $error = 0;
  $msg = "";

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
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
			$sql = "SELECT DISTINCT hoofdstuk, hoofdstuk_naam FROM theorie WHERE school='$school' OR school='Inforca'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);

		    if (mysqli_num_rows($result) > 0) {
		      while($row = mysqli_fetch_assoc($result)) {
		        $hoofdstuk = $row["hoofdstuk"];
		        $hoofdstukNaam = $row["hoofdstuk_naam"];

		        $msg .= '
		          <option value="'.$hoofdstuk.'">'.$hoofdstukNaam.'</option>
		        ';

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
