<?php
	session_save_path('../tmp');
	session_start();
	include('DB_connect.php');

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlentities($data, ENT_QUOTES);
		return $data;
	}

	//get and filter data
	if(isset($_SESSION["id"])){
		$id = check_input($_SESSION["id"]);

		$chapter_id = mysqli_real_escape_string($conn, check_input($_POST['chapter_id']));
		$paragraph = mysqli_real_escape_string($conn, check_input($_POST['paragraph']));
		$Nparagraphs = mysqli_real_escape_string($conn, check_input($_POST['Nparagraphs']));

		//look for current values
		$sql = "SELECT progress_id, progress FROM progressie WHERE userid='$id' AND chapter_id='$chapter_id'";

		if (mysqli_query($conn, $sql)) {
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) == 0){
				//if user has no progression at all
				//insert progress
				$progressionContent = str_repeat("0", $paragraph-1).'1';
				$progression = $progressionContent;

				$i = strlen($progression);

				while($i<($Nparagraphs)){
					$progression .= '0';
					$i++;
				}

				$sql = "INSERT INTO `progressie` (`userid`, `chapter_id`, `progress`) VALUES ($id, $chapter_id, '$progression')";

				if (!mysqli_query($conn, $sql)) {
					echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				}

			} else {
				$result = mysqli_fetch_assoc($result);
				$Cprogression = $result['progress'];
				$progress_id = $result['progress_id'];

				if(is_null($Cprogression)){
					//if user has no progression for this chapter
					//insert progress
					$progressionContent = str_repeat("0", $paragraph-1).'1';

					$progression = $progressionContent;

					$i = strlen($progression);

					while($i<($Nparagraphs+1)){
						$progression .= '0';
						$i++;
					}

					$sql = "UPDATE progressie SET progress = '$progression' WHERE progress_id=$progress_id";

					if (!mysqli_query($conn, $sql)) {
						echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					}

				} else {
					//if progress is found
					//update progress
					$progression = $Cprogression;
					$progression[$paragraph-1] = '1';

					$sql = "UPDATE progressie SET progress = '$progression' WHERE progress_id=$progress_id";

					if (!mysqli_query($conn, $sql)) {
						echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					}
				}
			}
		} else {
			echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}

	} else {
		echo "U bent niet meer ingelogd en uw progressie kan daarom niet bijgewerkt worden.";
	}

?>
