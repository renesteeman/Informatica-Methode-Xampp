<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B2 §2 JS basis deel 1
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
			<p>In deze paragraaf ga je kennismaken met JS. Om JS te kunnen gebruiken heb je niet meer nodig dan een tekstbewerker en een browser. Als je al Atom gebruikt is het ook hier erg handig voor. Als je meer wilt weten dan dat hier behandeld wordt kun je altijd zoeken op <a href="https://www.w3schools.com/js/default.asp.">https://www.w3schools.com/js/default.asp</a>.</p>

			<p>Er zijn meerdere manieren om de JS code toe te voegen aan een webpagina. De standard is een vorm van een external include, dit betekent dat het in een apart bestand staat, los van eventuele HTML. Het liefst zetten we deze external include ook nog op het eind van een pagina. Op die manier kan de gebruiker eerst al de inhoud van de pagina zien en na even te wachten ook de interactie gebruiken. De pagina lijkt dan sneller te zijn, terwijl het eigenlijk even lang zal laden. Een voorbeeld van zo’n soort include is:</p>

			<pre><code>&lt;html>
  &lt;head>
    &lt;meta charset="UTF-8" />
  &lt;/head>
  &lt;body>
    &lt;header>

    &lt;/header>
    &lt;p>
      JS external include
    &lt;/p>

    &lt;footer>

    &lt;/footer>

    &lt;script src="JS_LOCATIE">&lt;/script>
  &lt;/body>
&lt;/html></code></pre>

			<p>Je ziet onderdaan <code>&lt;script src="JS_LOCATIE">&lt;/script></code> staan, dit is de regel die zorgt voor het inladen van de JS code. Je kunt vervolgens een apart bestand aanmaken dat eindigd met .js en hierin jouw JS gaan schrijven.</p>

			<p>Je kunt testen of jouw include werkt door in het JS bestand <code>alert('test');</code> te plaatsen. Dit zou moeten zorgen voor een pop-up bericht.</p>

			<p>Een van de belangrijkste onderdelen van JS is DOM traversal, dit is eigenlijk het selecteren van HTML onderdelen. DOM staat voor document object model. De DOM is de hiërarchie van de HTML pagina inclusief de attributen van elementen met hun waardes.</p>

			<p>Een voorbeeld van een (simpel) DOM is het volgende:</p>

			<p>Je ziet dat het document zelf boven staat, met daarin <html>, alle andere elementen vallen daar weer onder. Alles dat in &lt;body> staat zal daar dus ook in de DOM te vinden zijn. Veel elementen hebben ook nog inhoud of attributen en deze zijn ook weer terug te vinden in het DOM.</p>

			<img src="afbeeldingen/DOM.svg" />

			<p>Met JS ga je gebruik maken van het DOM om elementen te veranderen of informatie eruit te halen. Dit kan op verschillende manieren. De makkelijkste manieren zijn via het ID en de class, deze ken je hopelijk nog van jouw gebruik van CSS.</p>

			<p>Om via een ID een element op te halen gebruik je:</p>

			<pre><code>document.getElementById(“ID”)</code></pre>

			<p>Om het via een class te doen gebruik je:</p>

			<pre><code>document.getElementByClass(“CLASS”)</code></pre>

			<p>Als je het gewenste element hebt opgehaald kun je hier informatie uithalen of aanpassen. Per attribuut van een HTML element vereist dit andere code. Een paar veel gebruikte volgen.</p>

			<p>Het ophalen van tekst via:</p>

			<p>innerText</p>

			<p>Een voorbeeld is:</p>

			<pre><code>Content = document.getElementById(“formulier”).innerText;</code></pre>

			<p>Het toevoegen van een class via:</p>

			<p>classList.add(‘CLASS’)</p>

			<p>Een voorbeeld is:</p>

			<pre><code>document.getElementById(“element”).classList.add(‘Class’);</code></pre>

			<p>Het verwijderen van een class via:</p>

			<p>classList.remove(‘CLASS’)</p>

			<p>Een voorbeeld is:</p>

			<pre><code>document.getElementById(“element”).classList.remove(‘Class’);</code></pre>

			<p>Je ziet dus steeds ELEMENT.METHODE als je met het DOM werkt in JS. Let er ook op dat bij JS op het eind van de regel een ; gebruikt wordt.</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Wat staat in het DOM?</li>
				<li>Hoe voeg je JS het beste toe aan jouw HTML bestand?</li>
				<li>Hoe haal je een element met als ID de waarde 3 op met JS?</li>
				<li>Hoe pas je de inhoud van een &lt;p> met als ID de waarde p aan naar “JS”?</li>
				<li>Maak een HTML bestand met daarin 3 &lt;p> en stel de inhoud ervan in met JS.</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>De hiërarchie van de HTML element, inclusief attributen en hun waardes.</li>
				<li>Met <code>&lt;script src=”JS_LOCATION”>&lt;/script></code> net voor &lt;/body>.</li>
				<li><code>document.getElementById(‘3’);</code></li>
				<li><code>document.getElementById(‘3’).innerText = “JS”;</code></li>
				<li>Eigen antwoord</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
