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
	$correct = [];
	$incorrect = [];
	$error = 0;

	for($i=0; $i<count($antwoorden); $i++){
		if($antwoorden[$i] == $juisteAntwoorden[$i]){
			$punten++;
			$correct[] = $i;
		} else {
			$incorrect[] = $i;
		}
	}

	$cijfer = ((($punten * 10) / count($antwoorden)) * 9 + 10)/10;

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

				} else {
					$error = 1;
				}
			} else {
				$result = mysqli_fetch_assoc($result);
				$Ccijfer = $result['cijfer'];

				if($cijfer > $Ccijfer){
					$sql = "UPDATE quiz SET cijfer=$cijfer WHERE userid=$userid AND hoofdstuk=$hoofdstuk";
					if (mysqli_query($conn, $sql)) {

					} else {
						$error = 1;
					}
				} elseif ($cijfer == $Ccijfer){

				} else {

				}
			}

		} else {
			$error = 1;
		}

	} else {
		$error = 1;
	}

	$result = 'Je hebt een '.$cijfer.' gehaald';
	if($error){
		$msg3 = 'SQL error, contact admin';
	} else {
		$msg3 = '';
	}

	$verbeteringen = [];
	for($i=0; $i<sizeof($incorrect); $i++){
		$number = $incorrect[$i];
		$verbeteringen[] = $juisteAntwoorden[$number];
	}

	$return = array('result'=>$result, 'right'=>$correct, 'wrong'=>$incorrect, 'corrections'=>$verbeteringen, 'error'=>$error);
	$return = json_encode($return, JSON_FORCE_OBJECT);

	echo $return;

?>
