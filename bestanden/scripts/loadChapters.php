<?php
	include('DB_connect.php');
	session_start();

	$id = $_SESSION["id"];
  //TODO CHANGE TO ACTUAL SCHOOL
	$school = 'Inforca';

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$sql = "SELECT DISTINCT hoofdstuk, hoofdstuk_naam FROM theorie WHERE school='$school'";

	if (mysqli_query($conn, $sql)) {
		$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $hoofdstuk = $row["hoofdstuk"];
        $hoofdstukNaam = $row["hoofdstuk_naam"];

        echo '
          <option value="'.$hoofdstuk.'">'.$hoofdstukNaam.'</option>
        ';

      }
    } else {
      echo '
        <option value=""></option>
      ';
    }

    echo '
      <option value="Aanmaken">Aanmaken</option>
    ';





	} else {
		echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
	}

?>
