<?php
	include('../../../components/headerChapter.php');
?>

<link rel="stylesheet" href="../../../css/quiz.min.css">

<body>

	<div class="title-small">
		<h2>
			B2 quiz
		</h2>
	</div>

	<div class="quiz-bar">
		<!-- filled in with JS -->
	</div>

	<div class="vragen">
		<!-- vraag 1-->
		<div class="vraagBalk">
			Wat is geen eis voor een goede UI?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Het is intuïtief
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Het is flexibel
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Het is kleurrijk
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Tekst is leesbaar
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
			Wat is de beste omschrijving van een wireframe?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Een schets van een pagina
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een ontwerp van een pagina met zowel de lay-out als details
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een overzicht van de lay-out van de elementen op een pagina
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
			Wat is het belangrijkste voordeel van svg bestanden over bitmaps?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Het gebruikt minder opslag
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Het geeft meer mogelijkheden om iets vorm te geven
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Het behandelt een afbeelding als vormen
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Het is sneller
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
			Welke uitspraak over UI is niet waar?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">De UI moet volledig uniek zijn
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">De UI moet duidelijk zijn
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">De UI moet goed uitzien
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">De UI moet consistent zijn
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
			Waar is niet nodig voor een goede UX?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Het begrijpen van de gebruikers
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Vanuit de gebruikers naar een product kunnen kijken
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Zaken zo eenvoudig mogelijk houden
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Het product zo mooi mogelijk maken
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
