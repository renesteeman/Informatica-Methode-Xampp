<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B1 §2 De basis van HTML
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
				Zoals eerder genoemd bestaat een webpagina vaak uit 3 belangrijke onderdelen: de header, de body en de footer. Een HTML bestand zonder inhoud ziet er dan als volgt uit:
			</p>

<pre><code>&lt;html>
&lt;head>
&lt;/head>

&lt;header>
&lt;/header>

&lt;body>
&lt;/body>

&lt;footer>
&lt;/footer>
&lt;/html></code></pre>

			<p>
				Het valt misschien op dat er ook &lt;head> bij staat, hierin zet je normaal algemene dingen die de pagina nodig heeft om te werken, al wordt dit tegenwoordig ook vaak in de &lt;footer> gezet zodat eerst de inhoud van de pagina geladen wordt en daarna pas de rest, dan lijkt de pagina sneller te zijn. Zo kan er verwezen worden naar een css bestand of een andere code.
			</p>
			<p>
				Je ziet ook dat onderdelen beginnen met &lt;TAG> en eindigen met &lt;TAG/>, dit komt bij bijna elk element (onderdeel) in HTML voor. Tussen deze 'tags' kun je de inhoud zetten. In plaats van de tekst "TAG" komt er natuurlijk de naam van het element.
			</p>
			<p>
				Deze 'tags' vormen samen de webpagina. Een website is dus eigenlijk een verzameling van blokken met eventueel opmaak (css) en logica.
			</p>
			<p>
				Een pagina met als inhoud "Hello HTML" zou er als volgt uit kunnen zien.
			</p>

<pre><code>&lt;html>
&lt;head>
&lt;/head>

&lt;header>
&lt;/header>

&lt;body>
Hello HTML
&lt;/body>

&lt;footer>
&lt;/footer>
&lt;/html></code></pre>

			<p>
				Je zou in dit geval head, header en footer weg kunnen laten, ze worden hier toch niet gebruikt. Aangezien je ze vaak nodig hebt is wel standaard om ze te gebruiken.
			</p>
			<p>
				Stel je wilt gewoon tekst hebben, dan kun je &lt;p> gebruiken. De p staat voor paragraph. Of om een ‘blok’ te defineren kun je &lt;div> gebruiken, dit staat voor divisie. Dit kun je later met css bijvoorbeeld een achtergrondkleur geven.
			</p>
			<p>
				Als je HTML gaat schrijven kan dit in word, maar het is beter om een gespecialiseerd programma voor te gebruiken. Zelf (als maker van deze website) gebruik ik atom. Dit is een gratis tekstbewerker waar je zelf veel aan kunt aanpassen en toevoegen. Je kunt het vinden op <a href="https://atom.io/">https://atom.io/</a>.
			</p>
			<p>
				 Je kunt een bestand dan opslaan met de extensie HTML (dus je eindigt de naam van het bestand met .html). Dit kun je dan openen met de browser. Ik adviseer om als browser geen gebruik te maken van internet explorer, aangezien dit slechte ondersteuning heeft. Als je meer informatie wilt hebben over browsersupport dan kun je kijken op <a href="https://caniuse.com/">https://caniuse.com/</a>, hier staan wel veel dingen op die je nog niet kent.
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
					Maak een pagina met daarin minimaal een paragraaf en een divisie.
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
					<pre>
						<code>
&lt;html>
&lt;head>
&lt;/head>

&lt;header>
&lt;/header>

&lt;body>
&lt;p> INHOUD &lt;/p>
&lt;div> INHOUD &lt;/div>
&lt;/body>

&lt;footer>
&lt;/footer>
&lt;/html>

						</code>
					</pre>
				</li>

			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
