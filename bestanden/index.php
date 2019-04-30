<?php
	include('components/headerIndex.php');
	$completedChapters = [];
	$theory_kern = [];
	$theory_verdieping = [];
	$theory_bonus = [];
	$theory_documents = [];

	function chapterIsFinished($thisChapterID){
		global $completedChapters;
		if(in_array($thisChapterID, $completedChapters)){
			return true;
		}
	}

	function loadParagraphs($conn, $chapter_id, $chapter, $chapter_name){
		global $theory_kern;
		global $theory_verdieping;
		global $theory_bonus;

		$sql = "SELECT paragraaf_id, paragraaf, paragraaf_naam FROM theorie_paragrafen WHERE hoofdstuk_id='$chapter_id' ORDER BY paragraaf";

		if(mysqli_query($conn, $sql)) {
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$paragraph_id = $row["paragraaf_id"];
					$paragraph_number = $row["paragraaf"];
					$paragraph_name = $row["paragraaf_naam"];

					if($chapter[0] == 'H'){
						$theory_kern[$chapter." ".$chapter_name." #".$chapter_id][] = [$paragraph_id, $paragraph_name, $paragraph_number];
					} else if($chapter[0] == 'V'){
						$theory_verdieping[$chapter." ".$chapter_name." #".$chapter_id][] = [$paragraph_id, $paragraph_name, $paragraph_number];
					} else if($chapter[0] == 'B'){
						$theory_bonus[$chapter." ".$chapter_name." #".$chapter_id][] = [$paragraph_id, $paragraph_name, $paragraph_number];
					}
				}
			}

		} else {
			echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}
	}

	function loadDocuments($conn, $chapter_id, $chapter, $chapter_name){
		global $theory_documents;

		$sql = "SELECT document_id, document_title FROM theorie_documenten WHERE hoofdstuk_id='$chapter_id'";

		if(mysqli_query($conn, $sql)) {
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$document_id = $row["document_id"];
					$document_title = $row["document_title"];

					$theory_documents[$chapter." ".$chapter_name." #".$chapter_id][] = [$document_id, $document_title];
				}
			}
		}
	}

?>

<head>
	<meta name='description' content='Een informatica methode met structuur en keuze. Voor docenten is er een duidelijk overzicht en leerlingen kunnen zich specialiseren in wat ze interessant vinden, zonder de basis te missen.' />
	<meta name='keywords' content='Informatica, lesmethode, betaalbaar, duidelijk' />
	<meta name='author' content='René Steeman' />
</head>

<body>

	<?php
		//show which chapters are completed
		if(isset($_SESSION['id'])){

			$id = check_input($_SESSION['id']);
			$chaptersAvailable = [];

			//look for current values
			$sql = "SELECT * FROM progressie WHERE userid='$id'";
			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);

				//if the user has progression stored
				if(!mysqli_num_rows($result) == 0){
					while($progression = mysqli_fetch_assoc($result)){
						//check info from chapters
						for($i=0; $i<sizeof($progression); $i++){
							$chapterID = $progression['chapter_id'];
							$chapterProgress = $progression['progress'];

							if($chapterProgress != ''){

								$amountOfParagraphsThatShouldBeFinished = strlen($chapterProgress);
								$finishedParagraphs = $chapterProgress;
								$finishedParagraphs = str_replace('0', '', $finishedParagraphs);
								$amountOfParagraphsFinished = strlen($finishedParagraphs);

								if($amountOfParagraphsThatShouldBeFinished == $amountOfParagraphsFinished){
									$completedChapters[] = $chapterID;
								}
							}
						}
					}
				}
			}

      //load theory
      $school = "";

			$inforca_chapters_ids = [];
			$inforca_chapters = [];
			$inforca_chapter_names = [];

			$school_chapter_ids = [];

    	$sql = "SELECT school FROM users WHERE id='$id'";

    	if (mysqli_query($conn, $sql)) {
    		//find school of teacher
    		$result = mysqli_query($conn, $sql);
    		$result = mysqli_fetch_assoc($result);
    		$school = $result['school'];

  			$sql = "SELECT hoofdstuk_id, hoofdstuk, hoofdstuk_naam FROM theorie_hoofdstukken WHERE school='$school' ORDER BY hoofdstuk";

  			if (mysqli_query($conn, $sql)) {
  				$result = mysqli_query($conn, $sql);

		      while($row = mysqli_fetch_assoc($result)) {
						$hoofdstuk_id = $row["hoofdstuk_id"];
		        $hoofdstuk = $row["hoofdstuk"];
		        $hoofdstukNaam = $row["hoofdstuk_naam"];

						$school_chapter_ids[] = $hoofdstuk_id;
		        $school_chapters[] = $hoofdstuk;
						$school_chapter_names[] = $hoofdstukNaam;
		      }

  			} else {
  				echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
  			}

				$sql = "SELECT hoofdstuk_id, hoofdstuk, hoofdstuk_naam FROM theorie_hoofdstukken WHERE school='Inforca' ORDER BY hoofdstuk";

  			if (mysqli_query($conn, $sql)) {
  				$result = mysqli_query($conn, $sql);

		      while($row = mysqli_fetch_assoc($result)) {
						$hoofdstuk_id = $row["hoofdstuk_id"];
		        $hoofdstuk = $row["hoofdstuk"];
		        $hoofdstukNaam = $row["hoofdstuk_naam"];

						$inforca_chapters_ids[] = $hoofdstuk_id;
		        $inforca_chapters[] = $hoofdstuk;
						$inforca_chapter_names[] = $hoofdstukNaam;
		      }

  			} else {
  				echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
  			}

				//save what will be used
				$theory_chapters_ids = $inforca_chapters_ids;
				$theory_chapters = $inforca_chapters;
			  $theory_chapter_names = $inforca_chapter_names;

			  for($i=0; $i<count($school_chapter_ids);$i++){
			    $school_chapter = $school_chapters[$i];
			    $array_found_index = array_search($school_chapter, $theory_chapters);

			    //check if a chapter from the school is found and if so replace it by the school version if not add the chapter
			    if($array_found_index !== False){
						$theory_chapters_ids[$array_found_index] = $school_chapter_ids[$i];
			      $theory_chapters[$array_found_index] = $school_chapter;
			      $theory_chapter_names[$array_found_index] = $school_chapter_names[$i];
			    } else {
						$theory_chapters_ids[] = $school_chapter_ids[$i];
			      $theory_chapters[] = $school_chapter;
			      $theory_chapter_names[] = $school_chapter_names[$i];
					}
			  }

				//load the paragraphs that correspond to the chapters
				for($i=0; $i<count($theory_chapters); $i++){
					$chapter_id = $theory_chapters_ids[$i];
					$chapter = $theory_chapters[$i];
					$chapter_name = $theory_chapter_names[$i];
					loadParagraphs($conn, $chapter_id, $chapter, $chapter_name);
					loadDocuments($conn, $chapter_id, $chapter, $chapter_name);
				}

				$hoofdstuknamen_kern = array_keys($theory_kern);
				$hoofdstuknamen_verdieping = array_keys($theory_verdieping);
				$hoofdstuknamen_bonus = array_keys($theory_bonus);

				$hoofdstuknamen_documenten = array_keys($theory_documents);

    	} else {
    		echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
    	}

      echo "
			<div class='title'>
				<h2>
					Theorieoverzicht
				</h2>
			</div>

			<div class='bar'>
				<h3>
					Kern
				</h3>
			</div>

			<div class='chapter-tiles'>";

			for($i=0; $i<count($hoofdstuknamen_kern); $i++){
				$hoofdstuk = $hoofdstuknamen_kern[$i];
				$hoofdstuk_id = explode("#", $hoofdstuk)[1];
				$hoofdstuk_titel = explode("#", $hoofdstuk)[0];

				if(chapterIsFinished($hoofdstuk_id)){
					echo "<div class='tile completed'>";
				} else {
					echo "<div class='tile'>";
				}

        echo "
					<div class='tile-content'>
						<div class='tile-chapter'>
							".$hoofdstuk_titel."
						</div>
						<div class='tile-paragraphs'>
							<span class='closeTile'>X</span>
							<ol id=".$hoofdstuk_id.">";

								//show paragraphs
								for($j=0; $j<count($theory_kern[$hoofdstuk]); $j++){
									$paragraph_id = $theory_kern[$hoofdstuk][$j][0];
									$paragraph_name = $theory_kern[$hoofdstuk][$j][1];
									$paragraph_number = $theory_kern[$hoofdstuk][$j][2];
									echo "<ul><span class='paragraph' id='".$paragraph_id."'>§"."$paragraph_number"." ".$paragraph_name."</span></ul>";
								}

								//show documents if they exist
								if(in_array($hoofdstuk, $hoofdstuknamen_documenten)){
									$documents = $theory_documents[$hoofdstuk];
									for($j=0; $j<count($documents); $j++){
										$document_id = $documents[$j][0];
										$document_name = $documents[$j][1];
										echo "<ul><span class='document' id='".$document_id."'>".$document_name."</span></ul>";
									}
								}

								//show quiz
								echo "<ul><span class='quiz' id='".$hoofdstuk_id."'>Quiz</span></ul>";

						echo "
							</ol>
						</div>
					</div>
				</div>";
			}

      echo "</div>";

        echo "
        <div class='bar'>
  				<h3>
  					Verdieping
  				</h3>
  			</div>

			<div class='chapter-tiles'>";

			for($i=0; $i<count($hoofdstuknamen_verdieping); $i++){
				$hoofdstuk = $hoofdstuknamen_verdieping[$i];
				$hoofdstuk_id = explode("#", $hoofdstuk)[1];
				$hoofdstuk_titel = explode("#", $hoofdstuk)[0];

				if(chapterIsFinished($hoofdstuk_id)){
					echo "<div class='tile completed'>";
				} else {
					echo "<div class='tile'>";
				}

        echo "
					<div class='tile-content'>
						<div class='tile-chapter'>
							".$hoofdstuk_titel."
						</div>
						<div class='tile-paragraphs'>
							<span class='closeTile'>X</span>
							<ol>";

								for($j=0; $j<count($theory_verdieping[$hoofdstuk]); $j++){
									$paragraph_id = $theory_verdieping[$hoofdstuk][$j][0];
									$paragraph_name = $theory_verdieping[$hoofdstuk][$j][1];
									$paragraph_number = $theory_verdieping[$hoofdstuk][$j][2];
									echo "<ul><span class='paragraph' id='".$paragraph_id."'>§"."$paragraph_number"." ".$paragraph_name."</span></ul>";
								}

								//show documents if they exist
								if(in_array($hoofdstuk, $hoofdstuknamen_documenten)){
									$documents = $theory_documents[$hoofdstuk];
									for($j=0; $j<count($documents); $j++){
										$document_id = $documents[$j][0];
										$document_name = $documents[$j][1];
										echo "<ul><span class='document' id='".$document_id."'>".$document_name."</span></ul>";
									}
								}

								echo "<ul><span class='quiz'>Quiz</span></ul>";

						echo "
							</ol>
						</div>
					</div>
				</div>";
			}

      echo "</div>";

      echo "
			<div class='bar'>
				<h3>
					Bonus
				</h3>
			</div>

			<div class='chapter-tiles'>";

			for($i=0; $i<count($hoofdstuknamen_bonus); $i++){
				$hoofdstuk = $hoofdstuknamen_bonus[$i];
				$hoofdstuk_id = explode("#", $hoofdstuk)[1];
				$hoofdstuk_titel = explode("#", $hoofdstuk)[0];

				if(chapterIsFinished($hoofdstuk_id)){
					echo "<div class='tile completed'>";
				} else {
					echo "<div class='tile'>";
				}

				echo "
					<div class='tile-content'>
						<div class='tile-chapter'>
							".$hoofdstuk_titel."
						</div>
						<div class='tile-paragraphs'>
							<span class='closeTile'>X</span>
							<ol>";

								for($j=0; $j<count($theory_bonus[$hoofdstuk]); $j++){
									$paragraph_id = $theory_bonus[$hoofdstuk][$j][0];
									$paragraph_name = $theory_bonus[$hoofdstuk][$j][1];
									$paragraph_number = $theory_bonus[$hoofdstuk][$j][2];
									echo "<ul><span class='paragraph' id='".$paragraph_id."'>§"."$paragraph_number"." ".$paragraph_name."</span></ul>";
								}

								//show documents if they exist
								if(in_array($hoofdstuk, $hoofdstuknamen_documenten)){
									$documents = $theory_documents[$hoofdstuk];
									for($j=0; $j<count($documents); $j++){
										$document_id = $documents[$j][0];
										$document_name = $documents[$j][1];
										echo "<ul><span class='document' id='".$document_id."'>".$document_name."</span></ul>";
									}
								}

								echo "<ul><span class='quiz'>Quiz</span></ul>";

						echo "
							</ol>
						</div>
					</div>
				</div>";
			}

    echo "
		</div>
	</div>";

			//if not loged in, show 'sales page'
		} else {
			echo "
			<div class='title'>
				<h2>
					Informatie over Inforca
				</h2>
			</div>

			<div class='bar'>
				<h3>
					Wat is Inforca?
				</h3>
			</div>

			<div>
				<video controls poster='./video/thumbnail.png'>
					<source src='./video/InforcaDemo.mp4'>
				</video>
			</div>

			<div class='info'>

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

			<div class='bar'>
				<h3>
					Waarom Inforca?
				</h3>
			</div>

			<div class='info'>
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

			<div class='tiles'>
				<div class='box'>
					<div class='box-title'>
						Modern
					</div>
					<div class='box-content'>
						Alle theorie is up-to-date en eenvoudig bereikbaar via een modern vormgegeven systeem met vele handige functies.
					</div>
				</div>
				<div class='box'>
					<div class='box-title'>
						Uitgebreid
					</div>
					<div class='box-content'>
						Een wordt een groot aantal onderwerpen uitgebreid besproken en leerlingen krijgen de middelen om hun kennis uitgebreid te toetsen.
					</div>
				</div>
				<div class='box'>
					<div class='box-title'>
						Overzichtelijk
					</div>
					<div class='box-content'>
						De docent kan eenvoudig het overzicht op de leerlingen bewaren door handige systemen die inbegrepen zijn voor docentenaccounts.
					</div>
				</div>
				<div class='box'>
					<div class='box-title'>
						Praktisch
					</div>
					<div class='box-content'>
						Leerlingen leren niet alleen pure theorie, maar ook hoe ze de theorie in praktijk kunnen brengen. Het effect hiervan is dat leerlingen beter zijn voorbereid op vervolgopleidingen en informatica leuker gaan vinden.
					</div>
				</div>
				<div class='box'>
					<div class='box-title'>
						Betaalbaar
					</div>
					<div class='box-content'>
						Inforca is een stuk goedkoper dan de concurenten, zo kost een account voor een leerling maar €10/jaar en voor een docent maar €30/jaar.
					</div>
				</div>
				<div class='box'>
					<div class='box-title'>
						Privacy
					</div>
					<div class='box-content'>
						Inforca waardeert de privacy van leerlingen en docenten. Er wordt daarom alleen gevraagd voor informatie die nodig is voor de werking van de website en administratie. De informatie wordt nooit gedeeld met derden en wordt bijveiligd opgeslagen.
					</div>
				</div>
				<div class='box'>
					<div class='box-title'>
						Flexibel
					</div>
					<div class='box-content'>
						Inforca staat open voor al uw feedback en heeft geen moeite met het aanpassen van de methode aan de hand van uw wensen.
					</div>
				</div>
				<div class='box'>
					<div class='box-title'>
						Open
					</div>
					<div class='box-content'>
						Bijna alle code van Inforca is open-source en terug te vinden op <a href='https://github.com/renesteeman/Informatica-Methode-Xampp'>https://github.com/renesteeman/Informatica-Methode-Xampp</a>. Het enigste dat niet openbaar is zijn onderdelen die de beveiliging garanderen.
					</div>
				</div>
				<div class='box'>
					<div class='box-title'>
						Ondersteuning
					</div>
					<div class='box-content'>
						Inforca levert gratis ondersteuning aan docenten op zowel technisch als onderwijskundig vlak.
					</div>
				</div>
			</div>

			<div class='bar'>
				<h3>
					Inforca gebruiken
				</h3>
			</div>

			<div class='info inforcaGebruiken'>
				<p>
					Als u interesse hebt in het gebruiken van Inforca kunt u contact opnemen met <a href='mailto:info@inforca.nl'>info@inforca.nl</a> om al uw vragen te beantwoorden en u te helpen bij het bestellen van accounts.
				</p>
				<p>
					Als u nog niet volledig overtuigd bent kunt u ook vragen voor een testaccount waarmee u toegang krijgt tot alle functies van Inforca.
				</p>
				<p>
					Als u besluit accounts te bestellen zult u deze direct na het aanvragen ontvangen en kunt u een uitlegles krijgen om te leren hoe alle systemen werken, dit kan voor zowel docenten als leerlingen.
				</p>

			</div>
			";
		}
	?>


	<?php
	include('components/footerIndex.php');
	?>

</body>
