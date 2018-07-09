<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H1 §5 Software en het OS
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
			<div class="ptile active">
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
				De computer kan taken uitvoeren door een grote reeks van instructies uit te voeren. Deze instructies worden geschreven in een programmeertaal en vervolgens omgezet in machinetaal dat de computer kan begrijpen (binair). Hoe je zelf code kunt schrijven leer je in een later hoofdstuk.
			</p>

			<p>
				De basis bestaat uit variabelen. Dit zijn getallen of een stuk tekst waar je steeds dingen aan veranderd. Er komt ook veel herhaling in voor. Een voorbeeld is het verversen van het beeldscherm. Dit gebeurt door pixel voor pixel van links naar rechts en van boven naar onder de kleur aan te passen (in rgba*) en dat vaak 60 keer per seconde!
			</p>

			<p>
				Het belangrijkste programma dat op een computer werkt is het OS, oftewel besturingssysteem. Dit zorgt voor het geluid, het bewegen van de cursor op het schermen, het kunnen gebruiken van een toetsenbord, het beeldscherm verversen, enz. Verder geeft het OS de mogelijkheid om andere programma’s te laten werken die opdrachten kunnen geven aan het besturingssysteem.  Het werkt dus als een soort tussenlaag tussen de hardware (het fysieke deel) en de software (de code).
			</p>

			*RGBA staat voor Red Green Blue Alpha, alpha geeft aan hoe 'sterk' de kleur moet zijn en is een waarde van 0 tot 1.

		</div>

	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
