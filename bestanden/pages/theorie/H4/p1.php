<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H4 §1 Elektriciteit
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
				Voordat we beginnen met de arduino en het programmeren ervan, gaan we eerst elektriciteit herhalen. Dit is namelijk de basis van de arduino (en eigenlijk alle computers).
			</p>
			<p>
				Elektriciteit gaat over het verplaatsen van een elektrische lading, doormiddel van het transport van elektronen. Oftewel het bewegen van deeltjes met een negatieve lading. Deze elektronen gaan door een stroomkring, oftewel door een materiaal dat stroom geleidt (door laat) en waarin het begin en eindpunt samenvallen. Het 'stroomcircuit' moet namelijk gesloten zijn.
			</p>
			<p>
				Deze bewegende elektronen verplaatsen energie. Energie wordt in de natuurkunde als 'E' weergeven en de hoeveelheid energie per seconde is 'P', power. De hoeveelheid energie per seconde is gelijk aan een bepaald aantal bewegende elektronen maal de lading die ze hebben. De hoeveelheid bewegende elektronen wordt beschreven met de stroomsterkte, oftewel 'I' (intensiteit). De lading wordt spanning, 'U' genoemd. Dus P=U*I. De energie per seconde is gelijk aan de energie per groep elektronen maal het aantal groepen elektronen per seconde.
			</p>
			<p>
				Er is ook een verband tussen de spanning en stroomsterkte en dit heeft te maken met de weerstand. De weerstand geeft aan hoe lastig de elektronen door het elektrisch circuit (de stroomkring) kunnen gaan, dit wordt gemeten in ohm. Het verband tussen spanning, stroomsterkte en weerstand is R=U/I, weerstand = spanning (energie per ampère) / stroomsterkte (het aantal ampère).
			</p>
			<p>
				Ter samenvatting: de stroomsterkte (I) wordt weergegeven in ampère (A), de spanning (U) in volt (V) en weerstand (R) in ohm.
			</p>
			<p>
				Het aantal ampère geeft eigenlijk het aantal coulomb per seconde weer. Een coulomb is een bepaald aantal elektronen, namelijk 6,241 506·10^18. Dit aantal werd hiervoor gebruikt als één 'groep' elektronen.
			</p>
			<p>
				Er zijn een paar manier om een elektrisch circuit te maken. Er bestaan twee 'hoofdstructuren', dit zijn serie en parallel. Het is ook mogelijk om deze te combineren.
			</p>
			<p>
				Bij serie staan de onderdelen van het circuit achter elkaar en bij parallel naast elkaar. Bij serie gaat de stroom dus over één weg en bij parallel wordt het over meerdere wegen verdeeld. In de afbeeldingen staan voorbeelden van stroomkringen en geven de pijlen de richting van de elektronen aan, er is geen spanningsbron getekend om het te versimpelen, maar deze zou overal geplaats kunnen worden.
			</p>
			<p>
				Series
				<img src="./afbeeldingen/serie.svg" />
			</p>
			<p>
				Parallel
				<img src="./afbeeldingen/parallel.svg" />
			</p>
			<p>
				Bij series neemt de spanning af des te verder je door het circuit gaat, maar de stroomsterkte blijft wel gelijk.
				De elektronen verliezen dus energie, maar het aantal blijft gelijk.
				Bij parallel blijft de spanning in elke 'weg' gelijk (aan het begin) en wordt de stroomsterkte 'gesplitst'. De elektronen verdelen zich dus, terwijl ze de lading van het stuk direct ervoor behouden. Verder is de weerstand in een serieschakeling gelijk aan de weerstand van alle onderdelen bij elkaar opgeteld, dus Rtotaal=R1+R2+R… Bij een parallelschakeling neemt de weerstand juist af, er zijn namelijk meer 'wegen' waarover het 'verkeer' verdeeld wordt. Er geldt 1/Rtotaal = 1/R1 + 1/R2 + 1/R… Je kunt elke 'weg' in een parallelschakeling weer zien als een kleine serieschakeling.
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
					Maak een samenvatting van deze paragraaf.
				</li>
				<li>
					Stel ik heb een apparaat dat 5V gebruikt en een weerstand heeft van 2ohm, wat is het vermogen ervan?
				</li>
				<li>
					<img src="./afbeeldingen/vraag1.svg" />
					Bij 1 is de spanning 12V en de weerstand is 1ohm. Bij 2 is de weerstand 2ohm. Hoeveel ampère gaat er door 3?
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
					Eigen antwoord leerling.
				</li>
				<li>
					U=5V R=2ohm</br>
					R=U/I </br>
					I=R/U=5/2=2.5A</br></br>

					P=U*I=5*2.5=12.5W
				</li>
				<li>
					Bij 1 hoort 12V en 1ohm, dus ook 12A.</br>
					Bij 2 hoort dan 12V (het aantal J/coulomb is na de 'splitsing' nog niet veranderd) en 2ohm, dus 6A.</br>
					Bij 3 hoort dan 12-6=6A, want er was 12 coulomb/s verdeeld over 2 stukken waarvan het andere stuk (2) 6 coulomb/s ontvangt.
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
