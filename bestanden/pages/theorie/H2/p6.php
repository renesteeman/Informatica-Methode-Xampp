<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H2 Logica §6 Grammatica
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
			<div class="ptile">
				<span class="ptile-content"><a href="p6.php">
					§6
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
				Grammatica is een set regels waar aan voldaan moet worden om een bruikbare waarde te hebben. Denk maar aan het Nederlands. Een 'zin' zoals "Gaan winkel de we zo naar voor boodschappen voor komende week!" is niet bruikbaar, een zin zoals "Gaan we naar de winkel voor boodschappen voor komende week?" is wel bruikbaar. Bij informatica geld hetzelfde principe, een bruikbare waarde moet aan een aantal eisen voldoen.
			</p>
			<p>
				Een voorbeeld voor bij informatica is de opbouw van een postcode, die is al volgt cijfer + cijfer + cijfer + cijfer + letter + letter. Zo kun je bijvoorbeeld 1234AB krijgen, maar niet B23A41. Zo'n regel of opbouw kun je voor allerlei dingen gebruiken, denk aan: telefoonnummers, adressen, leeftijden en e-mailadressen.
			</p>
			<p>
				Het is ook mogelijk om deze grammaticaregels in een schema weer te geven.
			</p>
			<img src="./afbeeldingen/grammatica.svg" />
			<p>
				Bij straatnaam zie je een voorbeeld van herhaling, namelijk de pijl die na letter terug gaat naar voor letter. Het betekent hier dat een onbekend aantal letters achter elkaar mag voorkomen.
			</p>
			<p>
				Bij letter zie je een voorbeeld van meerdere opties, namelijk de vertakkingen boven elkaar. Deze vertakkingen beteken dat elk van de boven elkaar staande waardes geaccepteerd wordt. Je ziet ook drie puntjes tussen 'b' en 'c'. Deze puntjes betekenen dat alle waardes die ertussen horen ook goed zijn, dit mag alleen gebruikt worden wanneer het duidelijk naar welke waardes het refereert. In dit geval gaat het om alle kleine letters.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>
					Hoe ziet de grammatica voor een punt van een toets eruit?
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
					<img src="./afbeeldingen/grammaticaAntwoord.svg" />
				</li>
			</ol>
		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
