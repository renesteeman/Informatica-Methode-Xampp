<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H5 §4 De basis van CSS
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
				In deze paragraaf ga je de basis van CSS (cascading style sheets) leren. CSS zorgt voor de opmaak van de pagina, dus hoe het eruit ziet. Het is het beste om een apart css bestand aan te maken die bij de html gaat.
			</p>
			<p>
				Om te leren hoe je CSS kunt gebruiken is het het makkelijkst om in HTML een paar &lt;div> te gebruiken. Bij de CSS verwijs je hierna terug naar die &lt;div>.  Om ze apart ‘aan te spreken’ geven we de &lt;div> een id, dit is naam die alleen voor dat element wordt gebruikt. Een voorbeeld is: &lt;div id=”div1”>&lt;/div>. Om naar de CSS te verwijzen in het HTML-bestand (zodat de CSS geladen wordt) kun je in de &lt;head> &lt;link rel="stylesheet" href="test.css"> te plaatsen. Als nu het HTML bestand geladen wordt, wordt ook de CSS geladen en toegepast. Het CSS bestand noemen we test.css.
			</p>
			<p>
				Om in de CSS naar een id te verwijzen (van de HTML) gebruik je # en voor een class '.' (alleen de punt) .Een class gebruik je als een element vaker op een pagina hebt en het steeds dezelfde stijl wilt geven. In de HTML kun je dan i.p.v. id=”” class=”” gebruiken.
			</p>
			<p>
				In de CSS gaan we nu de eerste div aanpassen. Het is momenteel nog niet te zien (als er geen tekst in staat), dit kunnen we veranderen door de volgende code als CSS te gebruiken:
			</p>
			<p>
<pre><code>#div1
	Background-color: red;
	Width: 200px;
	Height: 200px;
</code></pre>
			</p>
			<p>
				Dit zal de div een rode (achtergrond) kleur geven en een breedte en hoogte van 200px. Het is ook mogelijk om een kleur preciezer in te stellen met RGB of hex waarden een paar voorbeelden hiervan zijn te vinden op <a href="https://www.w3schools.com/css/css_colors.asp">https://www.w3schools.com/css/css_colors.asp</a>.
			  Zelf maak ik vooral gebruik van %, em en rem. % gebruikt een percentage van het element waar het onder valt en 'em' kijkt naar de grote van de tekst. Rem staat voor root em, het gebruikt dus de tekstgrote van de 'root', oftewel het HTML element zelf.
			</p>
			<p>
				Er zijn ook meerdere manier om maten aan te duiden, px is een manier, maar dit werkt niet goed als je een site zou willen maken die zich aanpast op verschillende apparaten. Voor meer informatie hierover kun je op <a href="https://www.w3schools.com/cssref/css_units.asp">https://www.w3schools.com/cssref/css_units.asp</a>.
			</p>
			<p>
				Stel je hebt wat tekst in de div staan en vindt het iets te klein, dan kun je de tekst vergroten met de volgende code:
			</p>
			<p>
<pre><code>#div
	Background-color: red;
	Width: 200px;
	Height: 200px;
	Font-size: 200%;
</code></pre>
			</p>
			<p>
				Om een afgeronde rand aan de &lt;div> te krijgen kun je gebruik maken van border-radius zoals in het voorbeeld:
			</p>
			<p>
<pre><code>#div
	Background-color: red;
	Width: 200px;
	Height: 200px;
	Font-size: 200%;
	Border-radius: 6px;
</code></pre>
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
					Ga verder met de pagina van de vorige paragraaf. Maak nu de &lt;div> zo breed als de pagina en zet er tekst in, verander de kleur van de link, voeg een rand toe aan de &lt;img> en zet voor de &lt;li> een ander teken.
				</li>
			</ol>

		</div>

	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
