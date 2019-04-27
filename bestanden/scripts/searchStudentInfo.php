<?php
	include('DB_connect.php');
	session_start();

  $id = check_input($_SESSION["id"]);
  $school = '';
  $input = '';
  $error = '';
  $info = [];

	$studentID = "";
	$studentName = "";
	$studentClass = "";
	$studentGroupId = "";
	$studentGroupName = "";
	$studentGroupRole = "";
	$studentMail = "";
	$studentLactivity = "";
	$studentQuizResults = [];
	$studentProgression = [];
	$studentGroepsgenoten = [];

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		return $data;
	}

	$input = mysqli_real_escape_string($conn, check_input($_POST['input']));

	$sql = "SELECT school FROM users WHERE id='$id'";
	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];

    //check if there's a student with the given name and if so start to gather info
    $sql = "SELECT id, naam, klas, group_id, group_role, email, LActivity FROM users WHERE school='$school' AND naam='$input' AND functie='leerling'";

    if (mysqli_query($conn, $sql)) {
      $result = mysqli_query($conn, $sql);
      $result = mysqli_fetch_assoc($result);

			$studentID = $result['id'];
			$studentName = $result['naam'];
			$studentClass = $result['klas'];
			$studentGroupId = $result['group_id'];
			$studentGroupRole = $result['group_role'];
			$studentMail = $result['email'];
			$studentLactivity = $result['LActivity'];

			//get groupname
			//get test results
      $sql = "SELECT naam FROM groepen WHERE id='$studentGroupId'";

    	if (mysqli_query($conn, $sql)) {
        $result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);

				$studentGroupName = $result['naam'];
			} else {
				$error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}

      //get test results
      $sql = "SELECT hoofdstuk_id, cijfer FROM quiz_results WHERE userid='$studentID'";

    	if (mysqli_query($conn, $sql)) {
        $result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) > 0) {
	        //add each name to the array of group_members
	        while($row = mysqli_fetch_assoc($result)) {
	          $CchapterID = $row['hoofdstuk_id'];
						$Cgrade = $row['cijfer'];

						$sql2 = "SELECT hoofdstuk, hoofdstuk_naam FROM theorie_hoofdstukken WHERE hoofdstuk_id='$CchapterID'";

						if (mysqli_query($conn, $sql2)) {
							$result2 = mysqli_query($conn, $sql2);
							$result2 = mysqli_fetch_assoc($result2);

							$Cchapter = $result2['hoofdstuk'];
							$CchapterName = $result2['hoofdstuk_naam'];
						} else {
			        $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			      }

	          $add = [$Cchapter." ".$CchapterName => $Cgrade];
	          $studentQuizResults[] = $add;
	        }
				}

      } else {
        $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 2";
      }

      //get progression
      $sql = "SELECT chapter_id, progress FROM progressie WHERE userid='$studentID'";

    	if (mysqli_query($conn, $sql)) {
        $result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						$CchapterID = $row['chapter_id'];
						$CchapterProgress = $row['progress'];

						$sql3 = "SELECT hoofdstuk, hoofdstuk_naam FROM theorie_hoofdstukken WHERE hoofdstuk_id='$CchapterID'";

						if (mysqli_query($conn, $sql3)) {
							$result3 = mysqli_query($conn, $sql3);
							$result3 = mysqli_fetch_assoc($result3);

							$Cchapter = $result3['hoofdstuk'];
							$CchapterName = $result3['hoofdstuk_naam'];

							$studentProgression[$Cchapter." ".$CchapterName] = $CchapterProgress;
						} else {
							$error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
						}
					}
				}

      } else {
        $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 3";
      }

			//get progression
      $sql = "SELECT naam, klas, group_role FROM users WHERE group_id='$studentGroupId'";

    	if (mysqli_query($conn, $sql)) {
        $result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						$Cnaam = $row['naam'];
						$Cklas = $row['klas'];
						$Crol = $row['group_role'];

						$studentGroepsgenoten[] = [$Cnaam, $Cklas, $Crol];
					}
				}

      } else {
        $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 3";
      }
    } else {
      $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 4";
    }
  } else {
    $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 5";
  }

	//clean null values
  if(is_null($studentClass)){
    $studentClass = '';
  }
	if(is_null($studentGroupName)){
    $studentGroupName = '';
  }
	if(is_null($studentGroupRole)){
    $studentGroupRole = '';
  }
	if(is_null($studentMail)){
    $studentMail = '';
  }
	if(is_null($studentLactivity)){
    $studentLactivity = '';
  }

	$info = ['naam'=>$studentName,'klas'=>$studentClass, 'groepnaam'=>$studentGroupName, 'groep_rol'=>$studentGroupRole, 'mail'=>$studentMail, 'Lactiviteit'=>$studentLactivity, 'groepsgenoten'=>$studentGroepsgenoten, 'quizresultaten'=>$studentQuizResults, 'progressie'=>$studentProgression];

  //return data via json
  $toReturn = array('info' => $info, 'error' => $error);
	$toReturn = json_encode($toReturn, JSON_FORCE_OBJECT);
  echo $toReturn;

?>
