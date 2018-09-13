<?php

  include('DB_connect.php');
  session_start();

  //function to check and clean input
  function check_input($data) {
    $data = trim($data, " ");
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  //update activity
  if(isset($_SESSION['id'])){
    $now = date('Y-m-d H:i:s');
    $id = mysqli_real_escape_string($conn, check_input($_SESSION['id']));

		//save failed logins
		$sql = "UPDATE users SET LFailedLogin='$now' WHERE id='$id'";

		if(!mysqli_query($conn, $sql)) {
			echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}
  }


?>
