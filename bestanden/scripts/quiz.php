<?php
	include('DB_connect.php');
	session_save_path('../tmp');
	session_start();

	//get and filter data
	$id = $_SESSION["id"];
	$hoofdstuk = $_POST['hoofdstuk'];
	$antwoorden = $_POST['antwoorden'];

	$punten = 0;
	$cijfer = 0;
	$correct = [];
	$incorrect = [];
	$uitleg = [];
	$error = '';

	//controleer antwoorden (per hoofdstuk)
	if($hoofdstuk == "H1"){
		$juisteAntwoorden = [39, 54, 'De GPU kan complexere berekeningen uitvoeren.', 'de prijs', 'Het vertalen van code naar machinetaal.', 1 , 'Als een reeks RGB-waardes'];
		$uitleg = ['1+2+4+0+0+32 = 39, per getal dat je van rechts naar links gaat wordt de waarde twee maal zo groot', '1 * 0110 + 0 * 01100 + 0 * 011000 + 1 * 0110000 = 2 + 4 + 16 + 32 = 54, per digit dat je naar rechts gaat voor het linker getal zet je 0 achter de uitkomst voor dat digit.', 'De GPU is goed met parallellisatie en heeft veel meer opslag dan de CPU zelf, maar is minder flexibiel en kan sommige berekeningen dus niet uitvoeren.', 'Een SSD is over het algemeen 2.5 inch, terwijl een HDD standaard 3.5 inch groot is. Een SSD is ook nog in kleinere formaten beschikbaar, terwijl bij een HDD het niet kleiner wordt dan 2.5 inch voor een laptop variant. Een SSD heeft als grootste voordeel zijn snelheid. De betrouwbaar van een SSD is ook beter, aangezien de data die erop staat meestal leesbaar blijft ook als er niet meer op geschreven kan worden en een SSD heeft geen bewegende delen.', 'Het vertalen van code naar machinetaal wordt gedaan door aparte software.', 'Bij de OR-gate is de uitkomst 1 en samen met de 1 die van onder komt krijgt de AND-gate ook 1, 1 binnen en geeft dus weer 1 door.', 'Een video wordt gezien als een reeks frames/afbeeldingen, die weer worden gezien als een reeks pixels, die weer worden gezien als RGB-waardes.'];
	}

	if($hoofdstuk == "H2"){
		$juisteAntwoorden = ['S (schoon) ∩ bus = 1', 'M ∪ G', 7, 'Een systeem waarmee processen worden vastgelegd.', 'Een structuur waaraan een geschreven iets moet voldoen om geldig te zijn.'];
		$uitleg = ['Alle schonen voertuigen en de bus samen vormen alle voertuigen en dus 1 (alles in de set).', 'Het moet zowel modulus = 0 opleveren als groter zijn dan 20. Het kan dus niet altijd een van de getallen zijn die voldoet aan modulus = 0 of groter is dan 20.', 'Het patroon is X, X, 5, Y, Y, 5. Als er dus iets achter de 5 komt wordt het daarna meteen herhaald.', 'Zie paragraaf 5 voor de uitleg.', 'Grammatica is een groep regels die zowel de volgorde van tekens als de toegestaande tekens bepaald.'];
	}

	if($hoofdstuk == "H3"){
		$juisteAntwoorden = ['niet waar', 'niet waar', 'waar', 'niet waar', "Je krijgt 'koffie'.", "0,40", 'if !Tesla & Koffie != 0', '22'];
		$uitleg = ['Des de dichter de taal bij het metaal 'zit', des te lager de taal is. Oftewel des te eenvoudiger de instructies, des te lager de taal.', 'De te lager de taal, des te minder overbodige instructies er zijn.', 'Python is een hoge taal, het ligt namelijk dicht bij het Engels en ver van machine taal af.', 'Python bepaald zelf wat voor een soort variabele je hebt gedeclareerd. ', ' Het tellen begint bij 0, dus 0 -> 1 -> 2 -> 3 -> 4 oftewel 0 -> 2 -> 5 -> 'tesla' -> 'koffie'.', 'Als je 2,8 zo vaak mogelijk geheel in 20 stopt blijft er 0,4 over. 7 * 2.8 = 19,6 en 20 – 19,6 = 0,4', 'Tesla is niet gelijk aan 1 oftewel niet 'waar' en koffie is 1, dus niet gelijk aan 0. (donaties om dit te veranderen naar Tesla = 1 & Koffie = 1 zijn altijd welkom)', 'i word steeds met 2 vergroot en zal als voorlaatste stap 20 zijn en dus nog voldoen aan de eis om gelijk te zijn of kleiner dan 20. Het wordt dan dus nog een keer met 2 vergroot en wordt dus 22.'];
	}

	if($hoofdstuk == "H4"){
		$juisteAntwoorden = ['6 ohm', '2 ohm', 'niet waar', 'niet waar', '0-255', 'met digitalWrite(pinNummer, HIGH)', 'Dat ligt aan het arduino model.'];
		$uitleg = ['R = U/I, 12/2 = 6', '1/Rt = 1/R1 + 1/R2 -> 1/Rt = ¼ + ¼ = ½ -> Rt = 2/1 = 2', 'De weerstand van een LDR neemt af als er meer licht op schijnt.', 'De arduino heeft geen OS en alle code die het kan uitvoeren wordt direct op de chip geïnstalleerd, dit heet firmware.', 'Het signaal kan 0-255 als waarde hebben, ook al wordt het door arduino uno eigenlijk gezien als een hoeveelheid 1'en en 0'en per seconde.', 'Om een pin op 5V te zetten hoeft het alleen maar op 'aan' te staan, oftewel HIGH.', 'Een PWM/~ pin kan naast een digitaal signaal ook een signaal van 0-255 als waarde doorsturen in plaats van alleen een 1 of 0 op sommige arduino's. Het is echter zo dat veel arduino's (zoals de uno) een signaal aanmaken dat uit 1'en en 0'en bestaat, maar toch als analoog wordt gezien, ook al is het dat eigenlijk niet.'];
	}

	if($hoofdstuk == "H5"){
		$juisteAntwoorden = ['Om de specificaties van een project op te stellen.', 'Er wordt gecontroleerd of alles werkt.', 'Het project documenteren.', 'kosten besparen', 'features', 'een overzicht van hoeveel werk nog over is'];
		$uitleg = ['Het wordt gebruikt om de specificaties van een project op te stellen en het plannen voor te bereiden.', 'De controle van het product vind plaats op het eind van de ontwikkelfase, voordat de klant het product ontvangt.', 'De documentatie wordt door de administrateur geregeld.', 'Agile gaat om beter werken en een beter product maken, het is vaak goedkoper of winstgevender, maar dit is niet het doel van Agile.', 'User stories zijn de functies van het product, deze hoeven nog niet af te zijn.', 'Een burn-down chart geeft weer hoeveel werk (in uren) er nog over is en hoe dit (is) veranderd over een bepaalde tijd. Het is mogelijk dat dit als hulpmiddel om af te vallen werkt als de grafiek niet daalt.'];
	}

	if($hoofdstuk == "H6"){
		$juisteAntwoorden = ['een overzicht te houden bij een project', 'Een push zet de bestanden online.', 'een filmpje', 'onderzoeken hoe een CPU werkt'];
		$uitleg = ['Met Trello kun je lijsten maken van wat gedaan moet worden en je kunt er ook eventueel mee plannen, maar het is er niet voor bedoeld. Het kan ook gebruikt worden om anderen te informeren over de status van het project.', 'Een push zet de bestanden van de commits online.', 'De visie is optioneel, al is het wel aan te bevelen, eventueel als onderdeel van de inleiding.', 'Bij het onderzoeken van de werking van de CPU is er geen eindproduct en de omvang van het project is al snel of erg klein of het wordt te complex om goed uit te leggen wat je hebt geleerd. Het is wel een goed project om voor jezelf uit te voeren.'];
	}

	if($hoofdstuk == "V1"){
		$juisteAntwoorden = ['Zelfbewust zijn', 'Ja', 'Ja', 'Het berekenen van statisch relevante informatie.', 'Een verzameling van bekende gegevens', 'Y = 100x + 1*10^5'];
		$uitleg = ['Zodra een AI zelfbewust wordt is het een strong AI en geen weak AI.', 'Deep learning valt onder machine learning.', 'Een neural network valt onder deep learning en dus ook onder machine learning.', 'Het berekenen van statisch relevante informatie kan ook goed zonder AI. Een AI zal hier geen toegevoegde waarde hebben.', 'Een dataset is een verzameling van bekende gegevens', 'Y=ax+b, met a als richtingscoëfficiënt en b als startpunt. Const is hier b en size is hier a'];
	}

	if($hoofdstuk == "V2"){
		$juisteAntwoorden = ['Een tekstbestand op een apparaat dat via een website aangemaakt en opgehaald kan worden.', 'Ze nemen veel ruimte in beslag', 'Het blokkeren van reclame'];
		$uitleg = ['Een cookie is een tekstbestandje dat op een apparaat kan worden opgeslagen en gelezen door websites.', 'Een cookie is een heel klein bestand, zo klein zelfs dat de grote ervan verwaarloosbaar is.', 'Zelfs als reclame geblokkeerd wordt houdt dit het afstaan van informatie over jou en jouw apparaat niet tegen.'];
	}

	if($hoofdstuk == "V3"){
		$juisteAntwoorden = ['Een database waar delen informatie wiskundig aan elkaar gekoppeld zijn', 'Het heeft geen waarde', 'Wat is niet geschikt om als primairy key te gebruiken in een database?', 'Nee', 'Ja'];
		$uitleg = ['Een blockchain is een database die bestaat uit aan wiskundig elkaar gekoppelde blokken van informatie.', 'Het is blanco, dus heeft geen waarde.', 'De naam van een persoon is niet gegarandeerd uniek.', 'Om iets te verwijderen met behulp van SQL wordt de syntax DELETE FROM tabel WHERE voorwaarde', 'Het is geldig, want de SQL keywords zijn niet hoofdlettergevoelig.'];
	}

	if($hoofdstuk == "V4"){
		$juisteAntwoorden = ['Niet waar', 'Niet waar', 'Niet waar', 'Encryptie', 'Een systeem voor het omzetten vaan een IP-adres in een MAC-adres', 'De controle over het systeem'];
		$uitleg = ['Het heeft er 7.', 'Elk apparaat is met elkaar verbonden via een centrale verbinding, maar dus niet direct.', 'Bij een lagere laag wordt er meer data bij het originele bericht toegevoegd om het te kunnen verzenden.', 'Encryptie zorgt ervoor dat een verbinding beveiligd is door het onleesbaar maken van de data die erover vervoerd wordt voor iedereen die het niet kan terugvertalen.', 'DHCP zorgt voor het omzetten van IP- naar MAC-adressen en andersom', 'Bij het gebruik van de cloud heb je geen volledige controle over de hardware en soms ook niet over de software.'];
	}

	if($hoofdstuk == "V5"){
		$juisteAntwoorden = ['Het is kleurrijk', 'Een overzicht van de lay-out van de elementen op een pagina', 'Het behandelt een afbeelding als vormen', 'De UI moet volledig uniek zijn', 'Het product zo mooi mogelijk maken'];
		$uitleg = ['Een UI moet ervoor zorgen dat informatie goed overgebracht wordt naar de gebruiker. Het is niet nodig om kleurrijk te zijn om dat doel te bereiken.', 'Een wireframe geeft aan wat waar komt te staan op een pagina.', 'Bij een svg bestand wordt gewerkt met vormen, inplaats van alleen pixels met kleuren zoals bij bitmaps', 'De UI moet duidelijk zijn en als het volledig uniek is, is het vaak erg verwarrend voor de gebruiker.', 'De UX focust zich op de tevredenheid van een gebruiker. Een product hoeft niet mooi zijn om gelieft te worden door gebruikers. Soms is het zo dat een product beter kan focussen op bruikbaarheid en functionaliteit in plaats van op het uiterlijk.'];
	}

	if($hoofdstuk == "B1"){
		$juisteAntwoorden = ['<p>', 'links naar andere bestanden', '<a href="LOCATIE">LINK</a>', '../', '<!-- COMMENT -->', 'font-size:', 'background-color:', ':hover'];
		$uitleg = ['&lt;p> is een onderdeel van de &lt;header>, &lt;body> en/of &lt;footer>', '&lt;head> wordt gebruikt om andere bestanden op te roepen en te laden en om algemene gegevens op te slaan. Er kan CSS in staat, maar dit hoort eigenlijk in een apart bestand.', 'Om een link toe te voegen gebruik je &lt;a href="LOCATIE">LINK&lt;/a>, met in de plaats van LINK een tekst naar keuze die iemand doorstuurt naar de pagina waar de link naar wijst.', 'Met ../ ga je een map omhoog.', 'In HTML gebruik je &lt;!-- COMMENT --> gebruik je voor zowel een single- als multiline comment.', 'Met font-size stel je de tekstgrote in.', 'De achtergrondkleur kun je instellen met background-color of background, maar background-color is het gebruikelijkst.', 'Met :hover verandert de stijl als je met de cursor over het element gaat.'];
	}

	if($hoofdstuk == "B2"){
		$juisteAntwoorden = ['Nee', 'Nee', 'Nee', "el.style.width = '500px';", 'if(x && y){};', 'Een pakket van code met bepaalde functies die samenwerken volgens een bepaalde structuur'];
		$uitleg = ['Niet alle browsers ondersteunen de nieuwe versie van JS en soms worden alleen delen ervan ondersteund.', 'JS werkt standaard in de browser aan de kant van de client', 'In plaats van href zou het src moeten zijn', 'De breedte wordt bepaald met css, dus het attribuut style moet worden aangepast. De nieuwe breedte wordt 500px, dus het wordt ook aan 500px gelijk gesteld.', 'Om meerdere voorwaarden in een if-statement te gebruiken die allemaal waar moeten zijn gebruik je &&. Een enkele & werkt ook, maar het is niet volgens de officiële  syntax.'];
	}

	$count = count($antwoorden);
	for($i=0; $i<$count; $i++){
		if($antwoorden[$i] == $juisteAntwoorden[$i]){
			$punten++;
			$correct[] = $i;
		} else {
			$incorrect[] = $i;
		}
	}

	$cijfer = ((($punten * 10) / count($antwoorden)) * 9 + 10)/10;
	$cijfer = number_format(round(floatval($cijfer)), 1);

	//check if user already has a score for the quiz
	$sql = "SELECT cijfer FROM quiz WHERE userid=$id AND hoofdstuk='$hoofdstuk'";

	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		//if no result is found than insert result
		if (mysqli_num_rows($result) == 0){
			$sql = "INSERT INTO quiz (userid, hoofdstuk, cijfer) VALUES ($id, '$hoofdstuk', $cijfer)";
			if (mysqli_query($conn, $sql)) {

			} else {
				$error = "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}
		} else {
			$result = mysqli_fetch_assoc($result);
			$Ccijfer = $result['cijfer'];

			if($cijfer > $Ccijfer){
				$sql = "UPDATE quiz SET cijfer=$cijfer WHERE userid=$id AND hoofdstuk='$hoofdstuk'";
				if (mysqli_query($conn, $sql)) {

				} else {
					$error = "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				}
			}
		}

	} else {
		$error = "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
	}

	$result = 'Je hebt een '.$cijfer.' gehaald';

	$verbeteringen = [];
	for($i=0; $i<sizeof($incorrect); $i++){
		$number = $incorrect[$i];
		$verbeteringen[] = $juisteAntwoorden[$number];
	}

	$return = array('result'=>$result, 'right'=>$correct, 'wrong'=>$incorrect, 'corrections'=>$verbeteringen, 'uitleg' => $uitleg, 'error'=>$error);
	$return = json_encode($return, JSON_FORCE_OBJECT);

	echo $return;

?>
