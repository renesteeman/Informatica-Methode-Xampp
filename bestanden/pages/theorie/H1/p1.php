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
				<p>
					Een computer ‘begrijpt’ alleen 0’en en 1’en. informatie word in een computer altijd doormiddel van deze twee getallen opgeslagen, 'taken' die heen en weer worden gestuurd door de compter bestaan alleen uit 1' en en 0'

				</p>
				0' en en 1' en worden begrepen door de af- of aanwezigheid van stroom, een 0 voor de afwezigheid van stroom en een 1 voor de aanwezigheid van stroom
				<p>
				een bit heeft twee mogelijke waardes: 1 en 0. zoals we al aangegaven is een 1 de aanwezigheid en 0 de afwezigheid van stroom, met deze afwezigheid en de aanwezigheid kun je een heleboel aanduiden: aan (1) of uit (0), geslacht: (0) vrouw (1) man en meer.
				</p>

				<p>
					In binair stelsel wordt van rechts naar links geteld net zoals bij het decimaal stelsel dat wij gebruiken. alleen is hierbij niet 9 de grenswaarde maar 1:
				</p>

				<p>
				naar het getal 10 tellen in het decimaal stelsel: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10
				</p>

				<p>
					naar het getal 10 tellen in het binar stelsel:0, 1, 10, 11, 100, 101, 110, 111, 1000, 1001, 1010
				</P>
			</p>

			<p>
				alle 1'en samen, inclusief de nullen ertussen, geven een volledige waarde weer. de waarde van de 1 wordt bepaald door de plek die de 1 heeft binnen de reeks:
			</p>

			<p>
				een 1 op de tweede plek is 2 waard, dus 10 in binair stelsel is 2
				</p>

				<p>
					een 1 op de derde plek is 4 waard, dus een 100 in het binair stelsel is 4
				</p>

				<p>
					een 1 op de vierde plek is 8 waard, dus een 1000 in het binar stelsel is 8
				</p>

				<p>
					een 1 op de vijfde plek is 16 waar, en zo verdubbelt zich het steeds
				</p>

				<p>
					zo zie je dat je het getal 0 of 1 in een bit kan uitdrukken, maar dat je 2 bits nodig hebt om het getal 2 in het binar stelsel uit te drukken, want na 0 en 1 komt 10.

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
