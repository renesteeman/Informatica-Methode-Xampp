<?php
	include('../../../components/headerChapter.php');
?>

<link rel="stylesheet" href="../../../css/quiz.min.css">

<body>

	<div class="title-small">
		<h2>
			V3 quiz
		</h2>
	</div>

	<div class="quiz-bar">
		<!-- filled in with JS -->
	</div>

	<div class="vragen">
		<!-- vraag 1-->
		<div class="vraagBalk">
			Wat is de beste omschrijving van een blockchain?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Een reeks bestanden die in volgorde staan
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een database met een structuur die lijkt op een excel bestand
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een database waar delen informatie wiskundig aan elkaar gekoppeld zijn
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een groep van blokken data dat gezamenlijk wordt opgeslagen
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 2-->
		<div class="vraagBalk">
			Wat betekent het als een waarde in een database ‘Null’ is?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Het heeft als waarde het getal 0
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Het is gelijk aan de tekst ‘’
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Het heeft geen waarde
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 3-->
		<div class="vraagBalk">
			Wat is niet geschikt om als primairy key te gebruiken in een database?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">De naam van een persoon
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een leerlingennummer (voor een database waar maar leerlingen van een school in voorkomen)
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een BSN (burger service nummer)
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 4-->
		<div class="vraagBalk">
			Is de volgende SQL-query geldig als je ervanuit mag gaan dat de genoemde waardes bestaan? DELETE row_x FROM table_y WHERE condition_z
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Ja
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Nee
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 5-->
		<div class="vraagBalk">
			Is de volgende SQL-query geldig als je ervanuit mag gaan dat de genoemde waardes bestaan? Select x FrOm y wHEre z
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Ja
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Nee
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 6-->
		<div class="vraagBalk">
			Welke rechte lijn kun je opstellen met de volgende gegevens: coef const = 1*10^5 en coef size = 100 met size als onafhankelijke variabele?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Y = 1*10^5 + 100
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Y = 1*10^5x + 100x
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Y = 10^5x + 100
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Y = 100x + 1*10^5
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

	</div>

	<input type="submit" value="controleer" class="controleerAntwoordButton"/>

	</div>

	<script src="../../../scripts/quiz.js"></script>
	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
