<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H1 Werking computer §6 standaardrepresentaties
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
				Een computer moet heel veel verschillende soorten data kunnen opslaan en gebruiken met alleen maar het binaire systeem. Sommige zaken lijken hiervoor misschien niet geschikt, zoals: afbeeldingen, geluid en letters. Voor deze soorten data zijn systemen ontwikkeld om ze te kunnen vertalen naar het binair systeem en in deze paragraaf ga je leren hoe dat in elkaar zit.
			</p>
			<p>
				Afbeeldingen kun je zien als een heleboel kleine puntjes, oftewel pixels. Deze pixels hebben een kleur en deze bestaat uit een mix van rood, groen en blauw. Een computer vertaal zo'n pixel naar RGB-waarde waarin staat hoeveel rood, groen en blauw die pixel bevat. Een hele reeks van pixels wordt dus een reeks RGB-waardes. Samen vormt zo'n reeks RGB-waardes dus een afbeelding.
			</p>
			<p>
				Video werkt niet erg anders, want video bestaat uit een reeks afbeeldingen. Als je dus een reeks met daarin weer die reeks van RGB-waardes zet kun je dus video binair opslaan.
			</p>
			<p>
				Geluid kan gezien worden als een reeks toonhoogtes. Als je de toonhoogte omzet in een getal en dat voor alle toonhoogtes die achter elkaar voorkomen doet heb je al een geluidsbestand. Het is moeilijk om elk detail op te slaan, omdat er zo veel toonhoogtes voorkomen. Om toch ervoor te zorgen dat het haalbaar blijft wordt om een bepaalde de toonhoogte vastgelegd en niet voortdurend. Er gaat zo wel wat detail verloren, maar het bestand blijft beperkt in grote. Er is immers minder data nodig om het geluid weer te geven. Als je de hoeveelheid data dat gebruikt wordt om iets op te slaan verkleint heet dit compressie.
			</p>
			<p>
				Letters kunnen ook worden omgezet naar een binair getal. Er zijn hiervoor verschillende afspraken gemaakt die andere getallen toekennen aan een teken. Een paar bekende systemen zijn: ASCII en UTF. Een voorbeeld van zo'n waarde dat een getal representeert in ASCII is 1000001 (65), dit staat voor 'A'. Een belangrijk verschillen systemen zoals ASCII en UTF is het aantal karakters dat ze kunnen weergeven en hoeveel opslag ervoor nodig is. Des te meer karakters opgeslagen kunnen worden, hoe meer opslag er nodig is. Er zijn namelijk meer unieke waardes nodig om alle karakters te kunnen onderscheiden.
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
					Wat is compressie?
				</li>
				<li>
					Hoe kan video ook wel gezien worden?
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
					Iets opslaan met minder data. Hier gaat soms ook kwaliteit bij verloren.
				</li>
				<li>
					Als een reeks frames of zelfs als een reeks van een reeks van RGB-waardes (van pixel -> frame -> video).
				</li>
			</ol>

		</div>


	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
