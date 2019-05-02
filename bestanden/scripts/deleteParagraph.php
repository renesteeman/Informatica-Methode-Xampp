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

  $chapterID = mysqli_real_escape_string($conn, check_input($_POST['chapterID']));
	$paragraph_id = mysqli_real_escape_string($conn, check_input($_POST['paragraph_id']));

  $sql = "SELECT school, functie FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];

		if($functie=='docent'){
      //check if the theory is of the school and not Inforca
      $sql = "SELECT school FROM theorie_hoofdstukken WHERE hoofdstuk_id='$chapterID'";

      if (mysqli_query($conn, $sql)) {
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        $theory_school = $result['school'];

        //if the theory belong to the school itself and not to Inforca, than update the theory, else create a new row for the school
        if($school == $theory_school){
          //delete paragraph
          $sql = "DELETE FROM theorie_paragrafen WHERE paragraaf_id='$paragraph_id'";

          if (mysqli_query($conn, $sql)) {
            $msg .= "\nDeze paragraaf is succesvol verwijderd.";
          } else {
        		$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
        		$error = 1;
          }

          //check if the chapter is 'empty' and if so, delelte it
          $sql = "SELECT count(paragraaf_id) FROM theorie_paragrafen WHERE hoofdstuk_id='$chapterID'";

          if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($result);

            $amountOfParagraphs = $result['count(paragraaf_id)'];

            if($amountOfParagraphs == 0){
              //delete chapter
              //delete paragraph
              $sql = "DELETE FROM theorie_hoofdstukken WHERE hoofdstuk_id='$chapterID'";

              if (mysqli_query($conn, $sql)) {
                $msg .= "\nHet hoofdstuk is verwijderd aangezien het leeg is.";
              } else {
            		$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
            		$error = 1;
              }

              //delete associated quizes
              $sql = "DELETE FROM quiz_vragen WHERE hoofdstuk_id='$chapterID'";

              if (mysqli_query($conn, $sql)) {
                $msg .= "\nBijbehorende quiz vragen zijn verwijderd.";
              } else {
            		$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
            		$error = 1;
              }

              //delete associated quiz results
              $sql = "DELETE FROM quiz_results WHERE hoofdstuk_id='$chapterID'";

              if (mysqli_query($conn, $sql)) {
                $msg .= "\nBijbehorende quiz resultaten zijn verwijderd.";
              } else {
            		$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
            		$error = 1;
              }

              //delete associated docs
              $sql = "DELETE FROM theorie_documenten WHERE hoofdstuk_id='$chapterID'";

              if (mysqli_query($conn, $sql)) {
                $msg .= "\nBijbehorende documenten zijn verwijderd.";
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
          //can't be delete since it's not of the school itself
          $msg .= "\nDeze paragraaf is niet van uw school en kan dus niet worden verwijderd.";
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


  $toReturn = array('msg' => $msg, 'error' => $error, 'debug'=>$debug);
	$toReturn = json_encode($toReturn);

	echo $toReturn;
?>
