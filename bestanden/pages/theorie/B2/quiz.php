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
			Klopt het dat JS in elke browser hetzelfde werkt?
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
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 2-->
		<div class="vraagBalk">
			Klopt het dat JS-code standaard wordt uitgevoerd op de server?
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
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 3-->
		<div class="vraagBalk">
			Klopt het dat &lt;script href="JS_LOCATIE">&lt;/script> geldige code is? Je mag ervan uitgaan dat het JS bestand bestaat en geen fouten bevat.
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
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 4-->
		<div class="vraagBalk">
			Welke code kan gebruikt worden om de breedte van een element genaamd 'el' te veranderen naar 500 pixels?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">el.style.width = '500px';
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">el.width = '500px';
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">el.width = 500;
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">el.style.width = 500;
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
			Welke if-statement voldoet aan de JS-syntax?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">if(x AND y){};
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">if(x & y){};
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">if(x && y){};
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">if x AND y
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
			Wat is de beste omschrijving van een framework?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Een stuk kant-en-klare code dat je alleen maar hoeft te knippen en plakken
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een manier om code te schrijven
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een manier om over code te denken
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een pakket van code met bepaalde functies die samenwerken volgens een bepaalde structuur
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
