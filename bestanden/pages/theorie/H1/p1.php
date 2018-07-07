<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H1 §1 het binair systeem
		</h2>
	</div>

	<div class="bar-par-overview">
		<div class="paragraph-tiles">
			<div class="ptile active">
				<span class="ptile-content"><a href="p1.php">
					§1
				</a></span>
			</div>
			<div class="ptile">
				<span class="ptile-content"><a href="p2.php">
					§2
				</a></span>
			</div>
			<div class="ptile">
				<span class="ptile-content"><a href="p3.php">
					§3
				</a></span>
			</div>
			<div class="ptile">
				<span class="ptile-content"><a href="p4.php">
					§4
				</a></span>
			</div>
			<div class="ptile">
				<span class="ptile-content"><a href="p5.php">
					§5
				</a></span>
			</div>

		</div>
	</div>

	<div class="theorie">
		<div class="bar-s">
			<h3>
				Theorie
			</h3>
		</div>

		<div class="theorie-content">
			<p>
				Een computer ‘begrijpt’ alleen 0’en en 1’en. Informatie wordt in een computer altijd doormiddel van deze twee getallen opgeslagen, ook de opdrachten die heen en weer worden verzonden bestaan uit dezen 1'en en 0'en.
			</p>
			<p>
				Een bit heeft twee mogelijke waardes: 1 en 0. Een 1 geeft de aanwezigheid en 0 de afwezigheid van stroom aan. Er kan met dit binair systeem vanalles worden weergegeven. Het werkt het beste als er meerden 0'en en 1'en elkaar opvolgen om te zorgen voor veel mogelijkheden. Hiermee wordt alles op een computer uitgevoerd.
			</p>
			<p>
				In het binair stelsel wordt van rechts naar links geteld. De waarde van een 1 wordt steeds groter als het verder links staat. Als voorbeeld kun je zien hoe je in het binair stelsel tot 10 telt (met stappen van 1).

				0, 1, 10, 11, 100, 101, 110, 111, 1000, 1001, 1010
			</p>

			<p>
				Alle 1'en en 0'en geven een volledige waarde weer. De waarde van de 1 wordt bepaald door de plek die de 1 heeft binnen de reeks. Helemaal rechts is het 1 waard en voor elke plek dat het verder naar links staat verdubbeld zijn waarde.
				Een paar voorbeelden zijn:
			</p>

			<p>
				Een 1 op de tweede plek van rechts is 2 waard, dus 10 in binair stelsel is 2 in het decimaal systeem.
			</p>

			<p>
				Een 1 op de derde plek is 4 waard, dus een 100 in het binair stelsel is 4.
			</p>

			<p>
				Een 1 op de vierde plek is 8 waard, dus een 1000 in het binar stelsel is 8.
			</p>

			<p>
				Je kunt ook een 0 eraan toevoegen, dit hebt je bijvoorbeeld nodig om 5 weer te geven in decimaal, 101. Een 0 kun dus een waarde van een 1 verhogen, door de 1 naar links te 'duwen'.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">

			<ol>
				<li>
					Hoe wordt een nul en een één door een computer begrepen?
				</li>
				<li>
					Vertaal 001, 011, 1001001 naar het decimale systeem (‘normale’ getallen)
				</li>
				<li>
					Vertaal 5, 20 en 40 naar binair
				</li>
			</ol>

		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">

			<ol>
				<li>
					Wel stroom = 1, geen stroom = 0
				</li>
				<li>
					1, 3, 73
				</li>
				<li>
					101, 10100, 101000
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
