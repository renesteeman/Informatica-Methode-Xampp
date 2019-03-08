<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H2 §5 Automaten
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
			<div class="ptile active">
				<span class="ptile-content"><a href="p5.php">
					§5
				</a></span>
			</div>
			<div class="ptile active">
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
				Eindige automaten zijn systemen waarmee mogelijke processen worden vastgelegd. Het klinkt erg lastig, maar weest gerust.
			</p>
			<p>
				Een voorbeeld zal hierbij helpen. Je wilt online een boek gaan kopen, maar weet nog niet welk boek. Je kunt dan een paar stappen volgen en er zijn verschillende uitkomsten mogelijk.
			</p>
			<img src="./afbeeldingen/automaat.svg" />
			<p>
				Je legt dus vast welke toestanden er mogelijk zijn en hoe toestanden elkaar opvolgen.
			</p>
			<p>
				Als de kans dat een bepaalde route gevolgd wordt 100% is dan is het deterministisch, dat is bij het voorbeeld niet het geval. Het is mogelijk dat je boek wel of niet te duur vindt, het is van tevoren niet zeker.
			</p>
			<p>
				Herhaling is ook mogelijk, zo als te zien is in het voorbeeld bij de pijl van "Je vindt het te duur" naar "Je gaat zoeken".
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
					Maak zelf een automaat voor het gebruiken van een wasstraat. Je mag zelf bepalen wat de mogelijkheden precies zijn.
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
					<img src="./afbeeldingen/automaatAntwoord.svg" />
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
