<?php
	include('DB_connect.php');
	session_start();

	//get and filter data
	$username = $_SESSION["username"];
	$hoofdstuk = $_POST['hoofdstuk'];
	$antwoorden = $_POST['antwoorden'];

	$punten = 0;
	$cijfer = 0;
	$correct = [];
	$incorrect = [];
	$uitleg = [];
	$error = 0;

	//controleer antwoorden (per hoofdstuk)
	if($hoofdstuk == 1){
		$juisteAntwoorden = [39, 54, 'De GPU kan complexere berekeningen uitvoeren', 'De prijs', 'Het vertalen van code naar machinetaal', 1];
		$uitleg = ['1+2+4+0+0+32 = 39, per getal dat je van rechts naar links gaat wordt de waarde twee maal zo groot', '1 * 0110 + 0 * 01100 + 0 * 011000 + 1 * 0110000 = 2 + 4 + 16 + 32 = 54, per digit dat je naar rechts gaat voor het linker getal zet je 0 achter de uitkomst voor dat digit.', 'De GPU is goed met parallellisatie en heeft veel meer opslag dan de CPU zelf, maar is minder flexibiel en kan sommige berekeningen dus niet uitvoeren.', 'Een SSD is over het algemeen 2.5 inch, terwijl een HDD standard 3.5 inch groot is. Een SSD is ook nog in kleinere formaten beschikbaar, terwijl bij een HDD het niet kleiner wordt dan 2.5 inch voor een laptop variant. Een SSD heeft als grootste voordeel zijn snelheid. De betrouwbaar van een SSD is ook beter, aangezien de data die erop staat meestal leesbaar blijft ook als er niet meer op geschreven kan worden en een SSD heeft geen bewegende delen.', 'Het vertalen van code naar machinetaal wordt gedaan door aparte software.', 'Bij de OR-gate is de uitkomst 1 en samen met de 1 die van onder komt krijgt de AND-gate ook 1,1 binnen en geeft dus weer 1 door. '];
	}

	if($hoofdstuk == 2){
		$juisteAntwoorden = ['S (schoon) ∩ bus = 1', 'M ∪ G', 7];
		$uitleg = ['Alle schonen voertuigen en de bus samen vormen alle voertuigen en dus 1 (alles in de set).', 'Het moet zowel modulus = 0 opleveren als groter zijn dan 20. Het kan dus niet altijd een van de getallen zijn die voldoet aan modulus = 0 of groter is dan 20.', 'Het patroon is X, X, 5, Y, Y, 5. Als er dus iets achter de 5 komt wordt het daarna meteen herhaald.'];
	}

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

	$return = array('result'=>$result, 'right'=>$correct, 'wrong'=>$incorrect, 'corrections'=>$verbeteringen, 'uitleg' => $uitleg, 'error'=>$error);
	$return = json_encode($return, JSON_FORCE_OBJECT);

	echo $return;

?>
