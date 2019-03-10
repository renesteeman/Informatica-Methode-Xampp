<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H5 §1 Introductie
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
				In dit hoofdstuk ga je leren hoe je een (eenvoudige) website kunt maken. Hiervoor leer je HTML en CSS. HTML is voornamelijk gebruikt voor de inhoud en structuur van de pagina en CSS voor de opmaak (het goed uit laten zien van de site).
			</p>
			<p>
				Er zijn heel veel verschillende technologieën en talen die gebruikt kunnen worden voor websites. Ze worden onderverdeeld tussen front-end en back-end. Front-end is wat de gebruiker ziet of aan de kant van de gebruiker werkt en back-end is wat op de server wordt gebruikt. In dit hoofdstuk richten we ons dus tot front-end.
			</p>
			<p>
				Een webpagina heeft 3 ‘hoofdonderdelen’: een head, body en footer. Head is meestal de navigatiebalk, body is de ‘inhoud’ en de footer is meestal een balk onderaan met algemene info. Het meeste zul je dus bezig zijn met de body. Hierin heb je dingen zoals tekstblokken en afbeeldingen.
			</p>
			<p>
				De code van een echte website wordt opgeslagen op een server, dit is eigenlijk een gewone computer, maar dan zonder dingen zoals een beeldscherm. Deze staan vaak met grote aantallen bij elkaar. Als iemand naar de website toe gaat, dan stuurt de computer eigenlijk een bericht naar die server waarin het vraagt voor de bestanden. De server stuurt de bestanden en de browser (het programma waarmee je dit leest) zet de code in die bestanden om in iets dat je kunt zien, zoals deze pagina.
			</p>
			<p>
				Om te kijken hoe een site in elkaar zit, kun je de developer modus gebruiken. Dit doe je door in de browser op F12 te klikken. Hiermee kun je zien welke HTML en CSS gebruikt worden en dus hoe de website is opgebouwd. Met de inspector kun je de structuur van de pagina zien. De onderdelen kun je ‘uit klappen’ via het pijltje ervoor. Met de knop links boven die eruit ziet als een pagina met een cursor kun je delen van de site aanklikken en hun structuur te zien krijgen in de inspector.
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
					Bekijk de structuur van deze pagina (met F12) en schrijf 5 onderdelen op. Doe dit in het formaat: &lt;html onderdeel> inhoud. Je kunt de html onderdelen herkennen door de haken < >, wat ze precies zijn leer je nog. Hetzelfde soort element mag herhaald worden, maar dan moet de inhoud anders zijn.
				</li>
			</ol>

		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">

			<ol class="MLquestion">
				<li>
					1) Er zijn meerdere antwoorden mogelijk, enkele hiervan zijn:

					<ol>
						<li>
							&lt;body> waar alles in staat
						</li>
						<li>
							&lt;footer> met contact informatie
						</li>
						<li>
							&lt;header> met navigatie
						</li>
						<li>
							&lt;div> met de inhoud van de pagina
						</li>
						<li>
							&lt;div> met de blauwe balken
						</li>
						<li>
							&lt;p> met tekst erin
						</li>
						<li>
							&lt;div> met vragen erin
						</li>
					</ol>

				</li>

			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
