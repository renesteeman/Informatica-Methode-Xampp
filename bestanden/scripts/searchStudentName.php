<?php
	include('DB_connect.php');
	session_start();

  $id = $_SESSION["id"];
  $school = '';
  $input = '';
  $error = '';
  $searchResults = [];

  #get school and (part of a) name
  #search DB for possible (student) matches

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$input = mysqli_real_escape_string($conn, check_input($_POST['input']));

	$sql = "SELECT school FROM users WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];

    $sql = "SELECT naam FROM users WHERE school='$school' AND naam LIKE '$input%' AND functie='leerling'";

  	if (mysqli_query($conn, $sql)) {
  		$result = mysqli_query($conn, $sql);
      //add names to possible students
      while($row = mysqli_fetch_assoc($result)) {
    		$Cnaam = $row['naam'];
        $searchResults[] = $Cnaam;
      }

    } else {
      $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 1";
    }

  } else {
    $error .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt! 2";
  }

  //return data via json
  $toReturn = array('searchResults' => $searchResults, 'error' => $error);
	$toReturn = json_encode($toReturn, JSON_FORCE_OBJECT);
  echo $toReturn;

?>
