<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H3 §5 Condities
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
			<div class="ptile">
				<span class="ptile-content"><a href="p6.php">
					§6
				</a></span>
			</div>
			<div class="ptile">
				<span class="ptile-content"><a href="p7.php">
					§7
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
				Condities
			</p>
			<p>
				Als je programmeert wil je vaak kijken of een waarde aan een bepaalde eis voldoet en vervolgens iets uitvoeren als het aan die eis voldoet. Een voorbeeld is: als de koffie op is, dan hervul kop met koffie. Hier wordt gebruikt gemaakt van een IF-statement, er staat namelijk als x, dan y. Het kan ook andersom zijn, als de koffie niet op is, dan drink koffie. Stel je plakt deze twee aan elkaar, dan krijg je:

				Als de koffie op is, dan
					Hervul kop met koffie
				Anders
					Drink koffie

				Dit is een IF-ELSE-statement, als x, dan y, anders z.

				Een voorbeeld in python:

				coffee = True

				if coffee == True:
				    print("Drink koffie")

				else:
				    print("Zet koffie")

			</p>
			<p>
				NB
				Wat misschien opvalt is het dubbele = teken. Dit gebruik je bij het programmeren als je waardes vergelijkt, het enkele = teken gebruik je om een waarde toe te kennen.

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
					Maak zelf 2 condities
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>