<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B1 Web development §3 HTML deel 2
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
				Naast de basis HTML van de vorige paragraaf is er natuurlijk nog veel meer. De belangrijkste dingen worden in deze paragraaf behandeld, de rest is te vinden op <a href="https://www.w3schools.com/">https://www.w3schools.com</a>.
			</p>
			<p>
				Als je in HTML een link wilt toevoegen kan dit via &lt;a>, in de tag zelf zet je ook de locatie van de afbeelding via href="", dus <code>&lt;a href="LOCATIE">TEKST&lt;/a></code>.
			</p>
			<p>
				Er zijn een paar manieren om de locatie aan te geven: het kan een link zijn, een relatief pad of een absoluut pad. Een relatief pad (oftewel relative path) geeft de 'weg' aan vanaf de huidige locatie in de bestandsstructuur. Om een map omhoog te gaan gebruik je '../' om naar een onderliggende map te gaan gebruik je '/' of './'. Een absoluut pad geeft de volledige route aan vanaf het hoogste niveau in de bestandstructuur, oftewel vanaf de start van een schijf.
			</p>
			<p>
				Stel ik heb een bestand genaamd index.php (dit is de pagina die automatisch geladen wordt als die in een map staat voor de website)(voor deze site is php gebruikt, vandaar .php, normaal zou dit .html zijn). Dit bestaand is te vinden in: F:/xampp/htdocs/InformaticaMethode/design V2/pages/index.php. Als relatief pad naar een icoontje kan ik dan ../icons/edit.svg gebruiken, als absoluut pad zou dit F:\xampp\htdocs\InformaticaMethode\design V2\icons\edit.svg zijn. Als url zou ik <a href="https://inforca.nl/icons/edit.svg">https://inforca.nl/icons/edit.svg</a> kunnen gebruiken.
			</p>
			<p>
				NB / en \ kunnen beide gebruikt worden en doen hetzelfde.
			</p>
			<p>
				Om een afbeelding toe te voegen gebruik je &lt;img>, in plaats van href gebruik je hier src="". Bijvoorbeeld &lt;img src="https://inforca.nl/icons/edit.svg">
			</p>
			<p>
				Verder kun je ook een lijst maken, dit kan een geordende (&lt;ol>) of een ongeordende (&lt;ul>) zijn. De geordende geeft (standaard) aan welk nummer een item (&lt;li>) in een lijst is. Een ongeordende lijst geeft (standaard) een bolletje aan voor het item. Deze lijsten zijn ook aan te passen met CSS. Een lijst kan er in code als volgt uit zien:
			</p>
			<p>
<pre>
<code>&lt;ol>
	&lt;li>Nummer een&lt;/li>
	&lt;li>Nummer twee &lt;/li>
	&lt;li>Nummer drie &lt;/li>
&lt;/ol></code>
</pre>
			</p>
			<p>
				Op een pagina zien dit soort lijsten er als volgt uit:
				<ol>
					<li>
						Georganiseerde lijst, item 1.
					</li>
					<li>
						Georganiseerde lijst, item 2.
					</li>
				</ol>
				<ul>
					<li>
						Ongeorganiseerde lijst, item 1.
					</li>
					<li>
						Ongeorganiseerde lijst, item 2.
					</li>
				</ul>
			</p>
			<p>
				Als je ergens extra belangrijke tekst wilt plaatsen, dan kan dat met 'headings'. Deze zijn &lt;h1> tm &lt;h6>, des te groter het nummer, des te kleiner de tekst. Je zult bijna nooit gebruikmaken van &lt;h3> tm &lt;h6>. Een goede pagina heeft namelijk niet zoveel belangrijke stukken tekst. Gebruik ze dus als volgt: <h1>H1 ZEER BELANGRIJK</h1> <h2>H2 IETS MINDER BELANGRIJK</h2>
			</p>
			<p>
				Stel je wilt een vragenlijst maken. Dit kun je niet met alleen maar HTML, maar om de velden te maken waar de data ingevoerd moet worden kun je gebruik maken van &lt;form>, &lt;input> en &lt;textarea>. &lt;form> geeft aan dat er een lijst komt waar iets wordt ingevuld. &lt;input> geeft een klein tekstveld waar iemand iets kan invoeren en &lt;textarea> geeft een groter veld.
			</p>
			<p>
				Om de code duidelijk te houden is het goed om indentatie te gebruiken, oftewel onderdelen iets opschuiven naar rechts om duidelijk te maken dat het ergens onderdeel van is. Dit gaat het beste door per 'laag' een tab te gebruiken. Dus stel het is onderdeel van twee dingen, gebruik dan twee keer tab.
			</p>
			<p>
				Daarnaast is het ook handig om comments/kommentaar plaatsen, dit kan in HTML met <code>&lt;!--  INHOUD COMMENT --></code>
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
					Maak een pagina met minimaal: 1 link, 1 afbeelding en 1 lijst. Gebruik hiervoor de HTML die je voor de vorige paragraaf hebt geschreven.
				</li>
			</ol>

		</div>

	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
