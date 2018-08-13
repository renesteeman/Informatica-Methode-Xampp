<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2> 
			H1 §5 
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
        
			<p>De computer kan taken uitvoeren door een grote reeks van instructies uit te voeren. Deze instructies worden geschreven in een programmeertaal die vervolgens vertaald wordt naar machinetaal die de computer kan begrijpen. Hoe je zelf code kunt schrijven leer je in een later hoofdstuk.</p>

			<p>De basis van code bestaat uit variabelen. Dit zijn getallen of een stuk tekst waar je steeds dingen aan veranderd.</p>

			<p>Verder komt er ook veel herhaling voor, een voorbeeld is het verversen van het beeldscherm. Dit gebeurt door pixel voor pixel van links naar rechts en van boven naar onder de kleur aan te passen (in RGBA*) en dat vaak 60 keer per seconde en soms zelf 144 keer per seconde! Door deze variabelen en herhaling te combineren en om te zetten in instructies, kan een computer taken uitvoeren.</p>

			<p>Het belangrijkste programma dat op een computer werkt is het OS (Operating System), oftewel het besturingssysteem. Dit zorgt ervoor dat het geluid, het bewegen van de cursor op het scherm, en het toetsenbord allemaal werken.</p>

			<p>Verder geeft het OS de mogelijkheid om andere programma’s te laten werken die opdrachten kunnen geven aan het besturingssysteem. Ook zorgt het OS ervoor dat de rekenkracht goed wordt verdeeld over deze processen. Het werkt dus als een soort laag tussen de hardware (het fysieke deel) en de software (de code). De belangrijkste taak is misschien wel het registreren van input (data dat de gebruiker aan de computer geeft) en het terug kunnen geven van output, bijvoorbeeld het beeld of geluid. De vorm van de output wordt dan meestal wel weer door andere software geregeld, maar de OS maakt het mogelijk dat deze processen allemaal worden doorgegeven.</p>

			<p>*RGBA staat voor Red Green Blue Alpha. Alpha geeft aan hoe 'sterk' de kleur moet zijn en is een waarde van 0 tot 1.</p>

		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>