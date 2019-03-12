<?php
	include('../../../components/headerChapter.php');
?>

<link rel="stylesheet" href="../../../css/quiz.min.css">

<body>

	<div class="title-small">
		<h2>
			H2 quiz
		</h2>
	</div>

	<div class="quiz-bar">
		<!-- filled in with JS -->
	</div>

	<div class="vragen">
		<!-- vraag 1-->
		<div class="vraagBalk">
			Er zijn 5 vervoersmiddelen, waaronder 2 elektrische auto’s, een bus die op benzine rijdt, een elektrische motor en een fiets. Ze worden allemaal als ‘schoon’ gezien, met uitzondering van de bus. Welke bewering is wel waar?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">3 vervoersmiddelen voldoen aan de eis: E (elektrisch) ∪ A (auto)
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">S (schoon) ∩ bus = 1
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Bus ∩ fiets = 2
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
			Een getal moet aan twee eisen voldoen, het moet deelbaar zijn door 5 met modulus = 0 (het is geen komma getal) en het moet groter zijn dan 20. Wat is de juiste expressie voor dit getal? M staat voor modulus = 0 als door 5 wordt gedeeld en G staat voor groter dan 20.
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">M + G
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">M ∩ G
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">M ∪ G
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
			Welk getal hoort in plaats van de x te staan in de reeks?
			6, 6, 5, 6, 6, 5, 7, x
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">5
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">8
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">7
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">6
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
			Wat is de beste omschrijving van een automaat zoals in dit hoofdstuk behandeld is?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Een apparaat dat nadat het in werking is gezet zonder tussenkomst handelingen verricht.
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een programma dat zelf taken kan uitvoeren.
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een systeem waarmee processen worden vastgelegd.
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een systeem dat zelf handelingen kan verrichten.
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
			Wat is de beste omschrijving van grammatica zoals in dit hoofdstuk behandeld is?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Een afgesproken schrijfwijze van een taal.
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een structuur waaraan een geschreven iets moet voldoen om geldig te zijn.
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Spelling
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">De volgorde waarin tekens moeten staan.
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
