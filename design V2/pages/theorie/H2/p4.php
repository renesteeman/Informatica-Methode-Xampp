<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H2 §4 logica en programmeren
		</h2>
	</div>

	<div class="bar-par-overview">
		<div class="paragraph-tiles">
			<div class="ptile">
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
			<div class="ptile active">
				<span class="ptile-content"><a href="p4.php">
					§4
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
			Een computer ‘begrijpt’ alleen 0’en en 1’en. Deze worden in de computer heen en weer gestuurd, waardoor de computer taken kan uitvoeren. Ze worden begrepen door de af- of aanwezigheid van stroom, dus een 0 of 1.
			Een hele reeks van deze 0’en en 1’en kan een betekenis hebben, net zoals een letter of cijfer. Samen zijn ze dus nuttig.
			In binair wordt van rechts naar links geteld. Elke 1 geeft de aanwezigheid van een getal weer en elke 0 de afwezigheid van een getal.
			Alle 1’en samen, inclusief de ruimte ertussen, geven een volledige waarde weer. De waarde van de 1 wordt bepaald door de plek die de 1 heeft binnen de reeks. De eerste plek is 1 waard, de 2e plek is 2 waard, de 3e is 4 waard en zo blijft het zich steeds verdubbelen naarmate het verder naar links gaat.

			Een voorbeeld is 01001. Als je van links naar rechts telt en alle waardes daarna bij elkaar optelt, kom je op 1+8=9 uit. Dit kan ook andersom 9=8+1, dus eerst 1 en dan 1000. Dat wordt samen 1001 (= 01001).

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
