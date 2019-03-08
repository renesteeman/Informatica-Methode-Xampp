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
			<div class="ptile">
				<span class="ptile-content"><a href="p8.php">
					§8
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

			<p>Variabelen zijn bedoeld om waardes bij te houden en met deze variabelen kan gerekend worden. We gaan in dit geval uit van integers (gehele getallen).</p>

			<p>Deze waarden worden gebruikt tenzij anders aangegeven:</p>

			<p><code>waarde1 = 20</code></p>

			<p><code>waarde2 = 10</code></p>

			<p>De meest gebruikte acties zijn:</p>

			<p>Additie</p>

			<p><code>waarde3 = waarde1 + waarde2 (=30)</code></p>

			<p>Substractie</p>

			<p><code>waarde3 = waarde1 - waarde2 (=10)</code></p>

			<p>Multiplicatie</p>

			<p><code>waarde3 = waarde1 * waarde2 (=200)</code></p>

			<p>Delen</p>

			<p><code>waarde3 = waarde1 / waarde2 (=2.0)</code></p>

			<p>De modules, ook bekend als rest</p>

			<p><code>waarde1 = 20</code></p>

			<p><code>waarde2 = 3</code></p>

			<p><code>waarde3 = waarde1 % waarde2</code> (=2, want 20/3 = 6 met rest 2 (of 2/3))</p>

			<p>Er zijn veel meer mogelijkheden en deze zijn terug te vinden op https://docs.python.org/3/tutorial/introduction.html#numbers</p>

			<p>NB de rekenregels die je gewend bent gelden ook in python.</p>

			<p>NB python verandert automatisch datatypes in gevallen zoals 17/3, de uitkomst is hier een float met de waarde 5.666666666666667 ook al waren twee integers de beginwaarden.</p>

			<p>Bij strings, teksten kan ook met deze acties gewerkt worden. Hier gelden nagenoeg dezelfde regels al is er minder mogelijk.</p>

			<p>De nieuwe waarden zijn:</p>

			<p><code>string1 = “eerste”</code></p>

			<p><code>string2 = “tweede”</code></p>

			<p>Additie:</p>

			<p><code>string3 = string1 + string2</code> (=eerstetweede)</p>

			<p>Multiplicatie:</p>

			<p><code>String3 = string1 * 2</code> (=eersteeerste)</p>
		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">

			<ol>
				<li>
					Maak zelf 10 rekensommen met minimaal: 1 met een int, 1 met een string, 1 met een float, 1 met een list en 1 zonder variabele.
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
