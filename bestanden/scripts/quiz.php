<?php
	include('DB_connect.php');
	session_start();

	//get and filter data
	$username = $_SESSION["username"];
	$hoofdstuk = $_POST['hoofdstuk'];
	$antwoorden = $_POST['antwoorden'];

	//controleer antwoorden (per hoofdstuk)
	if($hoofdstuk == 1){
		$juisteAntwoorden = [71, 113];
	}

	$punten = 0;
	$cijfer = 0;

	for($i=0; $i<count($antwoorden); $i++){
		if($antwoorden[$i] == $juisteAntwoorden[$i]){
			$punten++;
		}
	}

	$cijfer = ((($punten * 10) / count($antwoorden)) * 9 + 10)/10;

	echo 'Je hebt een '.$cijfer.' gehaald';

	//get id for $username
	$sql = "SELECT id FROM users WHERE username='$username'";

	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$userid = $result['id'];

		//check if user already has a score for the quiz
		$sql = "SELECT cijfer FROM quiz WHERE userid=$userid";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			//if no result is found than insert result
			if (mysqli_num_rows($result) == 0){
				$sql = "INSERT INTO quiz (userid, hoofdstuk, cijfer) VALUES ($userid, $hoofdstuk, $cijfer)";
				if (mysqli_query($conn, $sql)) {
					echo "\nHet cijfer is opgeslagen";
				} else {
					echo "SQL error report to admin";
				}
			} else {
				$result = mysqli_fetch_assoc($result);
				$Ccijfer = $result['cijfer'];

				if($cijfer > $Ccijfer){
					$sql = "UPDATE quiz SET cijfer=$cijfer WHERE userid=$userid AND hoofdstuk=$hoofdstuk";
					if (mysqli_query($conn, $sql)) {
						echo "\nJe hebt een nieuwe highscore!";
					} else {
						echo "SQL error report to admin";
					}
				} elseif ($cijfer == $Ccijfer){
					echo "\nJe hebt jouw highscore herhaald";
				} else {
					echo "\nDit is niet jouw hoogste score, dat was een ".$Ccijfer.". Dit zal niet worden opgeslagen";
				}
			}

		} else {
			echo "SQL error report to admin";
		}

	} else {
		echo "SQL error report to admin";
	}

?>
