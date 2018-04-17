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
			<div class="ptile active">
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
			<div class="ptile">
				<span class="ptile-content"><a href="p6.php">
					§6
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

				Elektriciteit is het verplaatsen van een elektrische lading, doormiddel van het transport van elektronen. Oftewel het bewegen van deeltjes met een negatieve lading.
				Deze elektronen gaan door een stroomkring, oftewel door een materiaal dat stroom geleid (‘door laat’) en waarin het begin en eindpunt samenvallen.
			</p>
			<p>
				Deze bewegende elektronen verplaatsen energie. Energie wordt in de natuurkunde als ‘E’ weergeven en de hoeveelheid energie per seconde is ‘P’.
				De hoeveelheid energie per seconde is gelijk aan de het aantal bewegende elektronen maal de lading die ze hebben.
				Het aantal bewegende elektronen wordt stroomsterkte, oftewel ‘i’ genoemd. De lading wordt spanning, ‘U’ genoemd. Dus P=U*I. De energie per seconde is gelijk aan de spanning per hoeveelheid elektronen maal de hoeveelheid elektronen.
			</p>
			<p>
				Er is ook een verband tussen de spanning en stroomsterkte en dit heeft te maken met de weerstand. De weerstand geeft aan hoe lastig de elektronen door het elektrisch circuit (de stroomkring) kunnen gaan. Dit wordt gemeten in ohm en weerstand wordt weergeven als R (resistance). Het verband tussen spanning, stroomsterkte en weerstand is R=U/I, weerstand = spanning (E/hoeveelheid elektronen) / stroomsterkte (het aantal elektronen).
			</p>
			<p>
				Er zijn een paar manier om een elektrisch circuit te maken. Er bestaand twee ‘hoofdstructuren’, deze kunnen ook gecombineerd worden en zijn serie en parallel.
				Bij serie staan de onderdelen van het circuit ‘aan elkaar’ en bij parallel ‘naast elkaar’. Bij serie gaat de stroom dus over een ‘weg’ en bij parallel wordt het over meerdere ‘wegen’ verdeeld. In de afbeeldingen staan voorbeelden van stroomkringen en geven de pijlen de richting van de elektronen aan, er is geen spanningsbron getekend om het te versimpelen, maar deze zou overal geplaats kunnen worden.
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
				Bij series neem te spanning af des te verder je door het circuit gaat, maar de stroomsterkte blijft wel gelijk.
				De elektronen verliezen dus energie, maar het aantal blijft gelijk.
				Bij parallel blijft de spanning in elke ‘weg’ gelijk (aan het begin) en wordt de stroomsterkte ‘gesplitst’. De elektronen verdelen zich dus, terwijl ze de lading van het stuk direct ervoor behouden. Verder is de weerstand in een serieschakeling gelijk aan de weerstand van alle onderdelen bij elkaar opgeteld, dus Rtotaal=R1+R2+R… Bij een parallelschakeling neemt de weerstand juist af, er zijn namelijk meer ‘wegen’ waarover het ‘verkeer’ verdeeld wordt. Er geldt 1/Rtotaal = 1/R1 + 1/R2 + 1/R… Je kunt elke ‘weg’ in een parallelschakeling weer zien als een kleine serieschakeling.
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

				</li>
				<li>

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

				</li>
				<li>

				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
