<?php
	include('DB_connect.php');
	session_start();

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		return $data;
	}

	$error = 0;
	$msg = "";
	//get and filter data
	$id = $_SESSION["id"];
	$CGnaam = check_input($_SESSION["groupname"]);
	$group_id = mysqli_real_escape_string($conn, check_input($_POST['group_id']));
	$NGnaam = mysqli_real_escape_string($conn, check_input($_POST['NGname']));
	$NGbeschrijving = mysqli_real_escape_string($conn, check_input($_POST['NGbeschrijving']));
	$NGlink = mysqli_real_escape_string($conn, check_input($_POST['NGlink']));

	if(isset($_POST['NGleden'])){
		$NGledenUnChecked = $_POST['NGleden'];

		//check array and stored filtered array
		$count = count($NGledenUnChecked);
		for($i=0;$i<$count;$i++){
			$lidChecked = mysqli_real_escape_string($conn, check_input($NGledenUnChecked[$i]));
			$NGledenchecked[] = $lidChecked;
		}
	} else {
		$NGledenchecked = [];
	}

	$sql = "SELECT school FROM users WHERE id='$id'";
	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];

		if($NGnaam!=""){
			//check if Gnaam is already in use
			$sql = mysqli_query($conn, "SELECT naam FROM groepen WHERE naam='$NGnaam' and school='$NGnaam$NGnaam'");

			if (mysqli_num_rows($sql) != 0) {
				$msg .= "\nGroepnaam is al in gebruik.";
				$Gnaam = "";
		   } else {
				$sql = "UPDATE groepen SET naam='$NGnaam' WHERE id='$group_id' AND school='$school'";

				if (mysqli_query($conn, $sql)) {
					$msg .= "\nNieuwe groepnaam is succesvol ingesteld";
					$_SESSION["groupname"] = $NGnaam;
					$CGnaam = $_SESSION["groupname"];
				} else {
					$msg .= "\n1Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					$error = 1;
				}
		   }
		}

		if($NGbeschrijving!=""){
			$sql = "UPDATE groepen SET beschrijving='$NGbeschrijving' WHERE id='$group_id' AND school='$school'";
			$msg .= $school;

			if (mysqli_query($conn, $sql)) {
				$msg .= "\nNieuwe groepsbeschrijving is succesvol ingesteld";
			} else {
				$msg .= "\n2Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				$error = 1;
			}
		}

		if($NGlink!=""){
			$sql = "UPDATE groepen SET link='$NGlink' WHERE id='$group_id' AND school='$school'";

			if (mysqli_query($conn, $sql)) {
				$msg .= "\nNieuwe groepslink is succesvol ingesteld";
			} else {
				$msg .= "\n3Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				$error = 1;
			}
		}

		if($NGledenchecked!=""){

			//delete group_name of current members
			$sql = "UPDATE users SET group_id=Null WHERE group_id='$group_id' AND school='$school'";

			if (mysqli_query($conn, $sql)) {
				$msg .= "\nOude leden succesvol verwijderd";
			} else {
				$msg .= "\n4Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				$error = 1;
			}

			//set group_name for new members
			$count2 = count($NGledenchecked);
			for($i=0; $i<$count2; $i++){
				$lid = $NGledenchecked[$i];

				$sql = mysqli_query($conn, "SELECT naam FROM users WHERE naam='$lid' AND school='$school'");

				if (mysqli_num_rows($sql) != 0){
					$sql = "UPDATE users SET group_id='$group_id' WHERE naam='$lid' AND school='$school'";

					if (mysqli_query($conn, $sql)) {
						$msg .= "\n".$lid." is nu lid van de groep";
					} else {
						$msg .= "\n5Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
						$error = 1;
					}
				} else {
					$msg .= "\n".$lid." bestaat niet";
				}
			}
		}

	} else {
		$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
	}

	$toReturn = array('msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;

	$conn->close();

?>
