<?php
	include('../components/headerGeneral.php');
	$completedChapters = [];
?>

<head>
	<meta name="description" content="Een informatica methode met structuur en keuze. Voor docenten is er een duidelijk overzicht en leerlingen kunnen zich specialiseren in wat ze interessant vinden, zonder de basis te missen." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk" />
	<meta name="author" content="René Steeman" />
</head>

<body>

	<div class="title">
		<h2>
			Theorie overzicht
		</h2>
	</div>

	<div class="bar">
		<h3>
			Kern hoofdstukken
		</h3>
	</div>

	<?php
		//show which chapters are completed
		if (isset($_SESSION["username"])){

			$username = $_SESSION["username"];
			$chaptersAvailable = [];

			//get id from user
			$sql = "SELECT id FROM users WHERE username='$username'";

			if (mysqli_query($conn, $sql)) {

				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$id = $result['id'];

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
			}

			function chapterIsFinished($thisChapter){
				global $completedChapters;
				if(in_array($thisChapter, $completedChapters)){
					return true;
				}
			}

			chapterIsFinished('H1');
		}


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
					<ol>
						<ul><a href="theorie/H1/p1.php">§1 Het binair systeem</ul>
						<ul><a href="theorie/H1/p2.php">§2 Binair rekenen</a></ul>
						<ul><a href="theorie/H1/p3.php">§3 Gates</a></ul>
						<ul><a href="theorie/H1/p4.php">§4 Onderdelen van de computer</a></ul>
						<ul><a href="theorie/H1/p5.php">§5 Software en het OS</a></ul>
						<ul><a href="theorie/H1/quiz.php">Quiz</a></ul>
					</ol>
				</div>
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				<div class="tile-chapter">
					H2 logica
				</div>
				<div class="tile-paragraphs">
					<ol>
						<ul><a href="theorie/H2/p1.php">§1 Introductie tot logica</ul>
						<ul><a href="theorie/H2/p2.php">§2 Visuele logica</a></ul>
						<ul><a href="theorie/H2/p3.php">§3 Binair?</a></ul>
						<ul><a href="theorie/H2/p4.php">§4 Logica en programmeren</a></ul>
						<ul><a href="theorie/H2/quiz.php">Quiz</a></ul>
					</ol>
				</div>
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				<div class="tile-chapter">
					H3 programmeren
				</div>
				<div class="tile-paragraphs">
					<ol>
						<ul><a href="theorie/H3/p1.php">§1 Introductie tot programmeertalen</ul>
						<ul><a href="theorie/H3/p2.php">§2 Installatie</a></ul>
						<ul><a href="theorie/H3/p3.php">§3 Variabelen</a></ul>
						<ul><a href="theorie/H3/p4.php">§4 Rekenen met variabelen</a></ul>
						<ul><a href="theorie/H3/p5.php">§5 Condities</a></ul>
						<ul><a href="theorie/H3/p6.php">§6 Loops</a></ul>
						<ul><a href="theorie/H3/p7.php">§7 Uitdaging: mini-game</a></ul>
						<ul><a href="theorie/H3/quiz.php">Quiz</a></ul>
					</ol>
				</div>
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				<div class="tile-chapter">
					H4 arduino
				</div>
				<div class="tile-paragraphs">
					<ol>
						<ul><a href="theorie/H4/p1.php">§1 Elektriciteit</ul>
						<ul><a href="theorie/H4/p2.php">§2 Introductie tot arduino</a></ul>
						<ul><a href="theorie/H4/p3.php">§3 De basis van programmeren voor arduino</a></ul>
						<ul><a href="theorie/H4/p4.php">§4 Verder met arduino</a></ul>
						<ul><a href="theorie/H4/p5.php">§5 Een LED met LDR</a></ul>
						<ul><a href="theorie/H4/installatie.php">Installatie</a></ul>
						<ul><a href="theorie/H4/quiz.php">Quiz</a></ul>
					</ol>
				</div>
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				H5 Web development
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				H6 Project management
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				H7 Project uitvoeren
			</div>
		</div>

	</div>

	<div class="bar">
		<h3>
			Bonus hoofdstukken
		</h3>
	</div>

	<div class="chapter-tiles">
		<div class="tile">
			<div class="tile-content">
				<div class="tile-chapter">
					B1 Filosofie
				</div>
				<div class="tile-paragraphs">
					<ol>
						<ul><a href="theorie/B1/p1.php">§1 iets</ul>
						<ul><a href="theorie/B1/p2.php">§2 iets</a></ul>
						<ul><a href="theorie/B1/p3.php">§3 iets</a></ul>
						<ul><a href="theorie/B1/p4.php">§4 iets</a></ul>
						<ul><a href="theorie/B1/p5.php">§5 iets</a></ul>
						<ul><a href="theorie/B1/quiz.php">Quiz</a></ul>
					</ol>
				</div>
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				B2 beveiliging en privacy
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				B3 web+
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				B4 databases
			</div>
		</div>

		<div class="tile">
			<div class="tile-content">
				meer in de toekomst
			</div>
		</div>

	</div>';

	?>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>
