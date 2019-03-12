<?php
	include('components/headerIndex.php');
	$completedChapters = [];

	function chapterIsFinished($thisChapter){
		global $completedChapters;
		if(in_array($thisChapter, $completedChapters)){
			return true;
		}
	}

?>

<head>
	<meta name="description" content="Een informatica methode met structuur en keuze. Voor docenten is er een duidelijk overzicht en leerlingen kunnen zich specialiseren in wat ze interessant vinden, zonder de basis te missen." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk" />
	<meta name="author" content="René Steeman" />
</head>

<body>

	<?php
		//show which chapters are completed
		if (isset($_SESSION["id"])){

			$id = $_SESSION["id"];
			$chaptersAvailable = [];

			//look for current values
			$sql = "SELECT * FROM progressie WHERE userid='$id'";
			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);

				//if the user has progression stored
				if(!mysqli_num_rows($result) == 0){
					while($chapters = mysqli_fetch_assoc($result)){
						//get the chapters that are being tracked
						$availableChapters = array_keys($chapters);
						unset($availableChapters[0]);

						//check info from chapters
						for($i=1; $i<sizeof($availableChapters); $i++){
							$chapter = $availableChapters[$i];
							$chapterData = $chapters[$chapter];
							if($chapterData != ""){

								$amountOfParagraphsThatShouldBeFinished = $chapterData[0];
								$finishedParagraphs = substr($chapterData, 1);
								$finishedParagraphs = str_replace('0', '', $finishedParagraphs);
								$amountOfParagraphsFinished = strlen($finishedParagraphs);

								if($amountOfParagraphsThatShouldBeFinished == $amountOfParagraphsFinished){
									$completedChapters[] = $chapter;
								}
							}
						}
					}
				}
			}

			//if logged in show theory
			echo '
			<div class="title">
				<h2>
					Theorieoverzicht
				</h2>
			</div>

			<div class="bar">
				<h3>
					Kern
				</h3>
			</div>
			';

			echo '

			<div class="chapter-tiles">';
				if(chapterIsFinished('H1')){
					echo '<div class="tile completed">';
				} else {
					echo '<div class="tile">';
				}

					echo '
					<div class="tile-content">
						<div class="tile-chapter">
							H1 Werking computer
						</div>
						<div class="tile-paragraphs">
							<span class="closeTile">X</span>
							<ol>
								<ul><a href="pages/theorie/H1/p1.php">§1 Het binair systeem</a></ul>
								<ul><a href="pages/theorie/H1/p2.php">§2 Binair rekenen</a></ul>
								<ul><a href="pages/theorie/H1/p3.php">§3 Gates</a></ul>
								<ul><a href="pages/theorie/H1/p4.php">§4 Onderdelen van de computer</a></ul>
								<ul><a href="pages/theorie/H1/p5.php">§5 Software en het OS</a></ul>
								<ul><a href="pages/theorie/H1/p6.php">§6 standaardrepresentaties</a></ul>
								<ul><a href="pages/theorie/H1/quiz.php">Quiz</a></ul>
							</ol>
						</div>
					</div>
				</div>';

					if(chapterIsFinished('H2')){
						echo '<div class="tile completed">';
					} else {
						echo '<div class="tile">';
					}

					echo '
					<div class="tile-content">
						<div class="tile-chapter">
							H2 Logica
						</div>
						<div class="tile-paragraphs">
							<span class="closeTile">X</span>
							<ol>
								<ul><a href="pages/theorie/H2/p1.php">§1 Introductie tot logica</a></ul>
								<ul><a href="pages/theorie/H2/p2.php">§2 Visuele logica</a></ul>
								<ul><a href="pages/theorie/H2/p3.php">§3 Binair?</a></ul>
								<ul><a href="pages/theorie/H2/p4.php">§4 Logica en programmeren</a></ul>
								<ul><a href="pages/theorie/H2/p5.php">§5 Automaten</a></ul>
								<ul><a href="pages/theorie/H2/p6.php">§6 Grammatica</a></ul>
								<ul><a href="pages/theorie/H2/quiz.php">Quiz</a></ul>
							</ol>
						</div>
					</div>
				</div>';

					if(chapterIsFinished('H3')){
						echo '<div class="tile completed">';
					} else {
						echo '<div class="tile">';
					}

					echo '
					<div class="tile-content">
						<div class="tile-chapter">
							H3 Programmeren
						</div>
						<div class="tile-paragraphs">
							<span class="closeTile">X</span>
							<ol>
								<ul><a href="pages/theorie/H3/p1.php">§1 Introductie tot programmeertalen</a></ul>
								<ul><a href="pages/theorie/H3/p2.php">§2 Installatie</a></ul>
								<ul><a href="pages/theorie/H3/p3.php">§3 Variabelen</a></ul>
								<ul><a href="pages/theorie/H3/p4.php">§4 Rekenen met variabelen</a></ul>
								<ul><a href="pages/theorie/H3/p5.php">§5 Condities</a></ul>
								<ul><a href="pages/theorie/H3/p6.php">§6 Loops</a></ul>
								<ul><a href="pages/theorie/H3/p7.php">§7 Soorten structuren</a></ul>
								<ul><a href="pages/theorie/H3/p8.php">§8 Uitdaging: mini-game</a></ul>
								<ul><a href="pages/theorie/H3/quiz.php">Quiz</a></ul>
							</ol>
						</div>
					</div>
				</div>';

					if(chapterIsFinished('H4')){
						echo '<div class="tile completed">';
					} else {
						echo '<div class="tile">';
					}

					echo '
					<div class="tile-content">
						<div class="tile-chapter">
							H4 Arduino
						</div>
						<div class="tile-paragraphs">
							<span class="closeTile">X</span>
							<ol>
								<ul><a href="pages/theorie/H4/p1.php">§1 Elektriciteit</a></ul>
								<ul><a href="pages/theorie/H4/p2.php">§2 Introductie tot arduino</a></ul>
								<ul><a href="pages/theorie/H4/p3.php">§3 De basis van programmeren voor arduino</a></ul>
								<ul><a href="pages/theorie/H4/p4.php">§4 Verder met arduino</a></ul>
								<ul><a href="pages/theorie/H4/p5.php">§5 Een LED met LDR</a></ul>
								<ul><a href="pages/theorie/H4/installatie.php">Installatie</a></ul>
								<ul><a href="pages/theorie/H4/quiz.php">Quiz</a></ul>
							</ol>
						</div>
					</div>
				</div>';

					if(chapterIsFinished('H5')){
						echo '<div class="tile completed">';
					} else {
						echo '<div class="tile">';
					}

					echo '
					<div class="tile-content">
						<div class="tile-chapter">
							H5 Projectmanagement
						</div>
						<div class="tile-paragraphs">
							<span class="closeTile">X</span>
							<ol>
								<ul><a href="pages/theorie/H5/p1.php">§1 Introductie en onderdelen</a></ul>
								<ul><a href="pages/theorie/H5/p2.php">§2 Rollen</a></ul>
								<ul><a href="pages/theorie/H5/p3.php">§3 Communicatie</a></ul>
								<ul><a href="pages/theorie/H5/p4.php">§4 Agile en Scrum</a></ul>
								<ul><a href="pages/theorie/H5/quiz.php">Quiz</a></ul>
							</ol>
						</div>
					</div>
				</div>';

					if(chapterIsFinished('H6')){
						echo '<div class="tile completed">';
					} else {
						echo '<div class="tile">';
					}

					echo '
					<div class="tile-content">
						<div class="tile-chapter">
							H6 Project uitvoeren
						</div>
						<div class="tile-paragraphs">
							<span class="closeTile">X</span>
							<ol>
								<ul><a href="pages/theorie/H6/p1.php">§1 Plannen en Trello</a></ul>
								<ul><a href="pages/theorie/H6/p2.php">§2 Github</a></ul>
								<ul><a href="pages/theorie/H6/p3.php">§3 Verslag</a></ul>
								<ul><a href="pages/theorie/H6/p4.php">§4 Voorbeeld projecten</a></ul>
								<ul><a href="pages/theorie/H6/installerenTrello.php">Trello installeren</a></ul>
								<ul><a href="pages/theorie/H6/installerenGithub.php">Github installeren</a></ul>
								<ul><a href="pages/theorie/H6/verslag.docx" download>Voorbeeld verslag</a></ul>
								<ul><a href="pages/theorie/H6/quiz.php">Quiz</a></ul>
							</ol>
						</div>
					</div>
				</div>

			</div>

			<div class="bar">
				<h3>
					Verdieping
				</h3>
			</div>

			<div class="chapter-tiles">';

				if(chapterIsFinished('V1')){
					echo '<div class="tile completed">';
				} else {
					echo '<div class="tile">';
				}

					echo '
					<div class="tile-content">
						<div class="tile-chapter">
							V1 Filosofie en AI
						</div>
						<div class="tile-paragraphs">
							<span class="closeTile">X</span>
							<ol>
								<ul><a href="pages/theorie/V1/p1.php">§1 Wat is filosofie?</a></ul>
								<ul><a href="pages/theorie/V1/p2.php">§2 Wat is ethiek?</a></ul>
								<ul><a href="pages/theorie/V1/p3.php">§3 Het trein probleem</a></ul>
								<ul><a href="pages/theorie/V1/p4.php">§4 Informatica en de maatschappij</a></ul>
								<ul><a href="pages/theorie/V1/p5.php">§5 Kunstmatige intelligentie</a></ul>
								<ul><a href="pages/theorie/V1/p6.php">§6 Machine learning voorbeeld</a></ul>
								<ul><a href="pages/theorie/V1/quiz.php">Quiz</a></ul>
							</ol>
						</div>
					</div>
				</div>';

				if(chapterIsFinished('V2')){
					echo '<div class="tile completed">';
				} else {
					echo '<div class="tile">';
				}

					echo '
					<div class="tile-content">
						<div class="tile-chapter">
							V2 Privacy
						</div>
						<div class="tile-paragraphs">
							<span class="closeTile">X</span>
							<ol>
								<ul><a href="pages/theorie/V2/p1.php">§1 Wat wordt bijgehouden?</a></ul>
								<ul><a href="pages/theorie/V2/p2.php">§2 Hoe worden gegevens bijgehouden?</a></ul>
								<ul><a href="pages/theorie/V2/p3.php">§3 Hoe kun je jouw privacy verbeteren?</a></ul>
								<ul><a href="pages/theorie/V2/p4.php">§4 Wie beschermt jouw privacy?</a></ul>
								<ul><a href="pages/theorie/V2/quiz.php">Quiz</a></ul>
							</ol>
						</div>
					</div>
				</div>';

			if(chapterIsFinished('V3')){
				echo '<div class="tile completed">';
			} else {
				echo '<div class="tile">';
			}

				echo '
				<div class="tile-content">
					<div class="tile-chapter">
						V3 Databases
					</div>
					<div class="tile-paragraphs">
						<span class="closeTile">X</span>
						<ol>
							<ul><a href="pages/theorie/V3/p1.php">§1 Wat is een database?</a></ul>
							<ul><a href="pages/theorie/V3/p2.php">§2 Een database aanmaken</a></ul>
							<ul><a href="pages/theorie/V3/p3.php">§3 Communiceren met een database</a></ul>
							<ul><a href="pages/theorie/V3/p4.php">§4 Verder met SQL</a></ul>
							<ul><a href="pages/theorie/V3/installatieXAMPP.php">installatie XAMPP</a></ul>
							<ul><a href="pages/theorie/V3/quiz.php">Quiz</a></ul>
						</ol>
					</div>
				</div>
			</div>';

			if(chapterIsFinished('V4')){
				echo '<div class="tile completed">';
			} else {
				echo '<div class="tile">';
			}

				echo '
				<div class="tile-content">
					<div class="tile-chapter">
						V4 Netwerken
					</div>
					<div class="tile-paragraphs">
						<span class="closeTile">X</span>
						<ol>
							<ul><a href="pages/theorie/V4/p1.php">§1 OSI</a></ul>
							<ul><a href="pages/theorie/V4/p2.php">§2 Topologie</a></ul>
							<ul><a href="pages/theorie/V4/p3.php">§3 Werking en gevaren</a></ul>
							<ul><a href="pages/theorie/V4/p4.php">§4 Cloud</a></ul>
							<ul><a href="pages/theorie/V4/quiz.php">Quiz</a></ul>
						</ol>
					</div>
				</div>
			</div>';

			if(chapterIsFinished('V5')){
				echo '<div class="tile completed">';
			} else {
				echo '<div class="tile">';
			}

				echo '
				<div class="tile-content">
					<div class="tile-chapter">
						V5 UI en UX
					</div>
					<div class="tile-paragraphs">
						<span class="closeTile">X</span>
						<ol>
							<ul><a href="pages/theorie/V5/p1.php">§1 introductie</a></ul>
							<ul><a href="pages/theorie/V5/p2.php">§2 UI</a></ul>
							<ul><a href="pages/theorie/V5/p3.php">§3 UI vervolg</a></ul>
							<ul><a href="pages/theorie/V5/p4.php">§4 UX</a></ul>
							<ul><a href="pages/theorie/V5/quiz.php">Quiz</a></ul>
							</ol>
						</div>
					</div>
				</div>

			</div>

			<div class="bar">
				<h3>
					Bonus
				</h3>
			</div>

			<div class="chapter-tiles">';

			if(chapterIsFinished('B1')){
				echo '<div class="tile completed">';
			} else {
				echo '<div class="tile">';
			}

			echo '
			<div class="tile-content">
				<div class="tile-chapter">
					B1 Web development
				</div>
				<div class="tile-paragraphs">
					<span class="closeTile">X</span>
					<ol>
						<ul><a href="pages/theorie/B1/p1.php">§1 Introductie</a></ul>
						<ul><a href="pages/theorie/B1/p2.php">§2 De basis van HTML</a></ul>
						<ul><a href="pages/theorie/B1/p3.php">§3 HTML deel 2</a></ul>
						<ul><a href="pages/theorie/B1/p4.php">§4 De basis van CSS</a></ul>
						<ul><a href="pages/theorie/B1/p5.php">§5 CSS deel 2</a></ul>
						<ul><a href="pages/theorie/B1/quiz.php">Quiz</a></ul>
					</ol>
				</div>
			</div>
		</div>';

		if(chapterIsFinished('B2')){
			echo '<div class="tile completed">';
		} else {
			echo '<div class="tile">';
		}

		echo '
		<div class="tile-content">
			<div class="tile-chapter">
				B2 Web logic
			</div>
			<div class="tile-paragraphs">
				<span class="closeTile">X</span>
				<ol>
					<ul><a href="pages/theorie/B2/p1.php">§1 JS introductie</a></ul>
					<ul><a href="pages/theorie/B2/p2.php">§2 JS basis deel 1</a></ul>
					<ul><a href="pages/theorie/B2/p3.php">§3 JS basis deel 2</a></ul>
					<ul><a href="pages/theorie/B2/p4.php">§4 JS basis deel 3</a></ul>
					<ul><a href="pages/theorie/B2/p5.php">§5 JS advanced</a></ul>
					<ul><a href="pages/theorie/B2/quiz.php">Quiz</a></ul>
				</ol>
			</div>
		</div>
	</div>';

			//if not loged in, show 'sales page'
		} else {
			echo '
			<div class="title">
				<h2>
					Informatie over Inforca
				</h2>
			</div>

			<div class="bar">
				<h3>
					Wat is Inforca?
				</h3>
			</div>

			<div>
				<video controls>
					<source src="./video/InforcaDemo.mp4">
				</video>
			</div>

			<div class="info">

				<p>
					Inforca is een moderne informatica lesmethode die volledig digitaal beschikbaar is. Het bevat 13 hoofdstukken die ingedeeld zijn in kern- en verdiepingshoofdstukken. Leerlingen kunnen zich hiermee ontwikkelen in verschillende gebieden, zo komen onderwerpen zoals: logica, programmeren, arduino, web development, projecten en databases aan bod.
				</p>
				<p>
					Het heeft naast de theorie ook oefeningen met uitwerkingen waarmee de student zich goed kan voorbereiden op examens en een eventuele toekomst in de ICT. Voor de kernhoofdstukken zijn zelfs oefentoetsen beschikbaar met automatische beoordeling.
				</p>
				<p>
					Voor de docenten zijn ook veel handige systemen beschikbaar, zo kan een docent het overzicht over de leerlingen bewaren. De systemen zorgen er onder anderen voor dat de docent kan zien wie zijn werk af heeft, wie aan het werken is, hoe goed de oefentoetsen gemaakt worden en wie er samenwerken voor projecten.
				</p>

			</div>

			<div class="bar">
				<h3>
					Waarom Inforca?
				</h3>
			</div>

			<div class="info">
				<p>
					Inforca zorgt ervoor dat leerlingen zo veel mogelijk kunnen leren en docenten de leerlingen zo goed mogelijk kan ondersteunen. Dit wordt bereikt door praktische theorie in combinatie met ruimte voor zelfstandige projecten en ondersteunende systemen voor de docenten.
				</p>
				<p>
					Na het doorlopen van alle stof heeft de leerling een goede theoretische en praktische basis in verschillende velden op het gebied van ICT en heeft de leerling ervaring met het uitvoeren van projecten.
				</p>
				<p>
					De docent kan door allerlei handige hulpmiddelen zich meer en efficiënter bezighouden met de leerlingen in plaats van de administratie. Een voorbeeld hiervan is het systeem om projectgroepen te kunnen volgen. Dankzij dit systeem kan in een enkele oogopslag gezien worden wie samenwerken, waaraan ze werken, wat de rollen zijn en waar de bestanden staan.
				</p>
			</div>

			<div class="tiles">
				<div class="box">
					<div class="box-title">
						Modern
					</div>
					<div class="box-content">
						Alle theorie is up-to-date en eenvoudig bereikbaar via een modern vormgegeven systeem met vele handige functies.
					</div>
				</div>
				<div class="box">
					<div class="box-title">
						Uitgebreid
					</div>
					<div class="box-content">
						Een wordt een groot aantal onderwerpen uitgebreid besproken en leerlingen krijgen de middelen om hun kennis uitgebreid te toetsen.
					</div>
				</div>
				<div class="box">
					<div class="box-title">
						Overzichtelijk
					</div>
					<div class="box-content">
						De docent kan eenvoudig het overzicht op de leerlingen bewaren door handige systemen die inbegrepen zijn voor docentenaccounts.
					</div>
				</div>
				<div class="box">
					<div class="box-title">
						Praktisch
					</div>
					<div class="box-content">
						Leerlingen leren niet alleen pure theorie, maar ook hoe ze de theorie in praktijk kunnen brengen. Het effect hiervan is dat leerlingen beter zijn voorbereid op vervolgopleidingen en informatica leuker gaan vinden.
					</div>
				</div>
				<div class="box">
					<div class="box-title">
						Betaalbaar
					</div>
					<div class="box-content">
						Inforca is een stuk goedkoper dan de concurenten, zo kost een account voor een leerling maar €10/jaar en voor een docent maar €30/jaar.
					</div>
				</div>
				<div class="box">
					<div class="box-title">
						Privacy
					</div>
					<div class="box-content">
						Inforca waardeert de privacy van leerlingen en docenten. Er wordt daarom alleen gevraagd voor informatie die nodig is voor de werking van de website en administratie. De informatie wordt nooit gedeeld met derden en wordt bijveiligd opgeslagen.
					</div>
				</div>
				<div class="box">
					<div class="box-title">
						Flexibel
					</div>
					<div class="box-content">
						Inforca staat open voor al uw feedback en heeft geen moeite met het aanpassen van de methode aan de hand van uw wensen.
					</div>
				</div>
				<div class="box">
					<div class="box-title">
						Open
					</div>
					<div class="box-content">
						Bijna alle code van Inforca is open-source en terug te vinden op <a href="https://github.com/renesteeman/Informatica-Methode-Xampp">https://github.com/renesteeman/Informatica-Methode-Xampp</a>. Het enigste dat niet openbaar is zijn onderdelen die de beveiliging garanderen.
					</div>
				</div>
				<div class="box">
					<div class="box-title">
						Ondersteuning
					</div>
					<div class="box-content">
						Inforca levert gratis ondersteuning aan docenten op zowel technisch als onderwijskundig vlak.
					</div>
				</div>
			</div>

			<div class="bar">
				<h3>
					Inforca gebruiken
				</h3>
			</div>

			<div class="info inforcaGebruiken">
				<p>
					Als u interesse hebt in het gebruiken van Inforca kunt u contact opnemen met <a href="mailto:info@inforca.nl">info@inforca.nl</a> om al uw vragen te beantwoorden en u te helpen bij het bestellen van accounts.
				</p>
				<p>
					Als u nog niet volledig overtuigd bent kunt u ook vragen voor een testaccount waarmee u toegang krijgt tot alle functies van Inforca.
				</p>
				<p>
					Als u besluit accounts te bestellen zult u deze direct na het aanvragen ontvangen en kunt u een uitlegles krijgen om te leren hoe alle systemen werken, dit kan voor zowel docenten als leerlingen.
				</p>

			</div>
			';
		}
	?>


	<?php
	include('components/footerIndex.php');
	?>

</body>
