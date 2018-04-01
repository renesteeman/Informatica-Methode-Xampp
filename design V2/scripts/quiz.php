<?php
	include('DB_connect.php');
	session_start();

	//get and filter data
	$user = $_SESSION["username"];
	$hoofdstuk = $_POST['hoofdstuk'];
	$antwoorden = $_POST['antwoorden'];

	//controleer antwoorden (per hoofdstuk)
	if($hoofdstuk == 1){
		$juisteAntwoorden = [71, 113];
		$punten = 0;
		$cijfer = 0;

		for($i=0; $i<count($antwoorden); $i++){
			if($antwoorden[$i] == $juisteAntwoorden[$i]){
				$punten++;
			}
		}

		$cijfer = ((($punten * 10) / count($antwoorden)) * 9 + 10)/10;

		echo 'Je hebt een '.$cijfer.' gehaald';
	}



?>
