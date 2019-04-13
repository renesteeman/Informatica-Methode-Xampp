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

  $chapter = mysqli_real_escape_string($conn, check_input($_POST['chapter']));
	$paragraph = mysqli_real_escape_string($conn, check_input($_POST['paragraph']));

	$sql = "SELECT school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];

		if($functie=='docent'){
			$sql = "SELECT main, questions, answers FROM theorie WHERE (school='$school' OR school='Inforca') AND hoofdstuk='$chapter' AND paragraaf='$paragraph'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);

		    if (mysqli_num_rows($result) > 0) {
		      while($row = mysqli_fetch_assoc($result)) {
		        $main = $row["main"];
		        $questions = $row["questions"];
						$answers = $row["answers"];
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

  $toReturn = array('main'=> $main, 'questions'=>$questions, 'answers'=>$answers, 'msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;

?>
