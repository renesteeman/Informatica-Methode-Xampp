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

	if($hoofdstuk == 3){
		$juisteAntwoorden = ['Niet waar', 'Niet waar', 'Waar', 'Niet waar', "Je krijgt ‘koffie’.", "0,40", 'if !Tesla & Koffie != 0', '22'];
		$uitleg = ['Des de dichter de taal bij het metaal ‘zit’, des te lager de taal is. Oftewel des te eenvoudiger de instructies, des te lager de taal.', 'De te lager de taal, des te minder overbodige instructies er zijn.', 'Python is een hoge taal, het ligt namelijk dicht bij het Engels en ver van machine taal af.', 'Python bepaald zelf wat voor een soort variabele je hebt gedeclareerd. ', ' Het tellen begint bij 0, dus 0 -> 1 -> 2 -> 3 -> 4 oftewel 0 -> 2 -> 5 -> ‘tesla’ -> ‘koffie’.', 'Als je 2,8 zo vaak mogelijk geheel in 20 stopt blijft er 0,4 over. 7 * 2.8 = 19,6 en 20 – 19,6 = 0,4', 'Tesla is niet gelijk aan 1 oftewel niet ‘waar’ en koffie is 1, dus niet gelijk aan 0. (donaties om dit te veranderen naar Tesla = 1 & Koffie = 1 zijn altijd welkom)', 'i word steeds met 2 vergroot en zal als voorlaatste stap 20 zijn en dus nog voldoen aan de eis om gelijk te zijn of kleiner dan 20. Het wordt dan dus nog een keer met 2 vergroot en wordt dus 22.'];
	}

	if($hoofdstuk == 4){
		$juisteAntwoorden = ['6 ohm', '2 ohm', 'niet waar', 'niet waar', '0-255', 'met digitalWrite(pinNummer, HIGH)', 'Dat ligt aan het arduino model.'];
		$uitleg = ['R = U/I, 12/2 = 6', '1/Rt = 1/R1 + 1/R2 -> 1/Rt = ¼ + ¼ = ½ -> Rt = 2/1 = 2', 'De weerstand van een LDR neemt af als er meer licht op schijnt.', 'De arduino heeft geen OS en alle code die het kan uitvoeren wordt direct op de chip geïnstalleerd, dit heet firmware.', 'Het signaal kan 0-255 als waarde hebben, ook al wordt het door arduino uno eigenlijk gezien als een hoeveelheid 1’en en 0’en per seconde.', 'Om een pin op 5V te zetten hoeft het alleen maar op ‘aan’ te staan, oftewel HIGH.', 'Een PWM/~ pin kan naast een digitaal signaal ook een signaal van 0-255 als waarde doorsturen in plaats van alleen een 1 of 0 op sommige arduino’s. Het is echter zo dat veel arduino’s (zoals de uno) een signaal aanmaken dat uit 1’en en 0’en bestaat, maar toch als analoog wordt gezien, ook al is het dat eigenlijk niet.'];
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
