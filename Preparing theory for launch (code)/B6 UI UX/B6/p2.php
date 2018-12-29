<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B6 §2 UI
		</h2>
	 </div>

	<div class="bar-par-overview">
		<div class="paragraph-tiles">

			<div class="ptile">
				<span class="ptile-content"><a href="p1.php">
					§1
				</a></span>
			</div>

			<div class="ptile active">
				<span class="ptile-content"><a href="p2.php">
					§2
				</a></span>
			</div>

			<div class="ptile">
				<span class="ptile-content"><a href="p3.php">
					§3
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

			<p>In deze paragraaf ga je leren hoe je een UI kunt ontwerpen. Er zijn veel manieren mogelijk en we zullen ons beperken tot de belangrijksten. We zullen ons bezighouden met GUI's (grafical user interfaces), dit zijn de grafische weergaves die de gebruiker te zien krijgt. Ze zien er vaak mooi uit en kunnen effecten bevatten zoals: animaties, schaduwen, gradients (overgaande kleuren) en afbeeldingen. Een andere soort UI is de CLI (command line interface), deze zie je als de cmd opstart en bestaat alleen uit tekst.</p>

			<p>Bij het ontwerpen van een UI voeg je steeds meer detail toe, dit doe je meestal in fases. Gebruikelijk is om met de structuur te beginnen, daarna komen vaak kleuren en lettertypen, maar deze kunnen ook voor of tijdens het ontwerpen van de structuur komen.  Je gaat dan na of iedereen het met de ontworpen structuur eens is, het is zonde om het uit te werken en daarna opnieuw te moeten beginnen. Als iedereen er tevreden mee is ga je meer details toevoegen, zoals: de kleuren per element, afrondingen, animaties, effecten en precieze afmetingen.</p>

			<p>Het ontwerpen van de structuur kan gedaan worden via wireframes of schetsen. Het schetsen is vaak het snelst als je veel wilt experimenteren, zorg er dan wel voor dat je details weg laat. Een wireframe is een weergave van een pagina aan de hand van blokken, dit zijn normaal de belangrijkste elementen van de pagina. Dit is een voorbeeld van een wireframe.</p>

			<p>Naast de structuur zul je moeten bepalen welke kleuren, effecten en lettertype(s)  je wilt gebruiken. Deze beslissingen leg je vast in een design document of design language, je kunt het zo uitgebreid maken als je wilt. Voorbeelden van design documents zijn Google's material design https://material.io/design/ en het design van duolingo (een site waar je talen op kunt leren) <a href="https://www.duolingo.com/design/">https://www.duolingo.com/design/</a> . In het design document leg je dus alle zaken wat design betreft vast, denk aan: kleuren, vormen, lettertypes, icoontjes en ontwerpen voor standaard onderdelen.</p>

			<p>Op het moment dat je de basis van het ontwerp af hebt, dus als je: de structuur, de kleuren, het lettertype en dergelijken hebt vastgesteld, kun je een gedetailleerd ontwerp maken. Het is vaak handig om dit digitaal te maken, aangezien je dan makkelijk dingen kunt aanpassen en vaak meer detail kan weergeven. Een programma dat hier handig voor is is inkscape (https://inkscape.org/), hiermee kun je SVG's (scalable vector graphics) maken. Het voordeel hiervan is dat alles als objecten wordt gezien en je ze kan blijven verplaatsen en aanpassen, bij een programma zoals paint.net zou het veel moeilijker zijn om halverwege de structuur aan te passen. Het nadeel van inkscape is dat het vrij lastig kan zijn om mee te beginnen, de UX had beter gekund. Als je de basis van inkscape wilt leren kun je hier (https://inkscape.org/doc/tutorials/basic/tutorial-basic.html) beginnen. Dit is een voorbeeld van een ontwerp in inkscape.</p>

			<p>Tip: als je tekst wilt toevoegen, maar nog geen teksten hebt kun je gebruiken van Lorem Ipsum (https://nl.lipsum.com/) als placeholder.</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Wat probeer je weer te geven met een wireframe?

Maak zelf een wireframe, eventueel van een bekende website.</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>De structuur van een pagina.

-</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
