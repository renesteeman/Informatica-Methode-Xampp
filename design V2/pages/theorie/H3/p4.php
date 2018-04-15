<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H3 §4 Rekenen met variabelen
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
				Rekenen met variabelen
			</p>
			<p>
				Variabelen zijn bedoeld om waardes bij te houden en met deze variabelen kan gerekend worden. We gaan in dit geval uit van integers (gehele getallen).
			</p>
			<p>
				Deze waarden worden gebruikt tenzij anders aangegeven:

				waarde1 = 20
				waarde2 = 10
			</p>
			<p>
				Voorbeelden van de types in python
			</p>
			<p>
				De meest gebruikte acties zijn:

				Additie

					waarde3 = waarde1 + waarde2 (=30)

				Substractie

					waarde3 = waarde1 - waarde2 (=10)

				Multiplicatie

					waarde3 = waarde1 * waarde2 (=200)

				Delen

					waarde3 = waarde1 / waarde2 (=2.0)


				De modules, ook bekend als rest
					waarde1 = 20
					waarde2 = 3

					waarde3 = waarde1 % waarde2 (=2, want 20/3 = 6 met rest 2 (of 2/3))

			</p>

			<p>
				Er zijn veel meer mogelijkheden en deze zijn terug te vinden op https://docs.python.org/3/tutorial/introduction.html#numbers
			</p>

			<p>
				NB de rekenregels die je gewend bent gelden ook in python.
				NB python verandert automatisch datatypes in gevallen zoals 17/3, de uitkomst is hier een float met de waarde 5.666666666666667 ook al waren twee integers de beginwaarden.
			</p>

			<p>
				Bij strings, teksten kan ook met deze acties gewerkt worden. Hier gelden nagenoeg dezelfde regels al is er minder mogelijk.

				De nieuwe waarden zijn:
				string1 = “eerste”
				string2 = “tweede”

				Additie:
					string3 = string1 + string2 (=eerstetweede)

				Multiplicatie:
					String3 = string1 * 2 (=eersteeerste)
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
					Maak zelf 10 rekensommen met minimaal: 1 met een int, 1 met een string, 1 met een float, 1 met een boolean, 1 met een list en 1 zonder variabele.
				</li>
				<li>
					Stel ik heb een list met als waarden [“Tesla”,”Koffie”,”Programmeren”], welk index nummer (nummer dat de plaats in de lijst aangeeft) heb je nodig als je koffie wilt?
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
					Eigen antwoord
				</li>
				<li>
					1, je telt vanaf 0 en het is de tweede waarden, 0+1=1
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
