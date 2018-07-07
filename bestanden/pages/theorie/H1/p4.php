<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H1 §4 onderdelen van de computer
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
				Een computer werkt door veel gates samen te gebruiken om data te verplaatsen en te manipuleren. Om deze taken uit te kunnen voeren zijn verschillende onderdelen van een computer nodig, maar niet alle onderdelen voeren berkeningen uit. Andere zorgen ervoor dat aan de randvoorwaarden wordt voldaan, bijvoorbeeld dat de data opgeslagen kan worden en dat er genoeg stroom is. De belangrijkste onderdelen worden hieronder genoemd.
			</p>

			<p>
				<img src="./afbeeldingen/CPU.png" class="theorieImage small" />

				Het hart van de computer is de CPU, (Central Processing Unit). Dit is een chip die meestal maar een paar centimeter groot is, waarop alle algemene instructies worden uitgevoerd met behulp van de eerder besproken gates en dus het heen en weer halen van binaire getallen. Tegenwoordig heeft een CPU meerdere cores, dit wil zeggen dat het aan meerdere opdrachten tegelijk kan werken. Elke core werkt dan als een soort mini CPU, maar dan niet met alle onderdelen die de gehele CPU heeft. De CPU heeft namelijk naast alleen de onderdelen voor het rekenen ook andere onderdelen, een voorbeeld is cache opslag. Cache is een vorm van hele snelle opslag, maar vaak met kleine capiciteit (enkele MBs of minder). De snelheid van een CPU hangt van meerdere zaken af, voornamelijk de IPC, frequentie, cache en de hoeveelheid cores. De IPC is het aantal instructies dat per clock uitgevoerd kan worden. Een clock is een cyclus van instructies, zoals haal waardes van x naar y of voeg x toe aan y. De frequentie geeft aan hoeveel clocks er in een seconde uitgevoerd worden.
			</p>

			<p>
				<img src="./afbeeldingen/RAM.png" class="theorieImage small" />

				Het RAM, random accessible memory, slaat alle informatie op die snel beschikbaar moet zijn. Zaken zoals het OS en programma’s worden hierop gezet, zodat de CPU niet steeds verzoeken hoeft te doen om gegevens op een schijf op te vragen en ze dus veel sneller kan krijgen. Hoe meer ram, des te meer er opgeslagen kan worden in dit snelle geheugen.
			</p>

			<p>
				<img src="./afbeeldingen/MOBO.png" class="theorieImage small" />

				Het moederbord is een soort hub waar alles op aangesloten is: de CPU, GPU, schijven (opslag), usb poorten, internet en nog een boel andere zaken zitten allemaal erop aangesloten. Het moederbord zorgt er dus voor dat alle onderdelen met elkaar kunnen communiceren.
			</p>

			<p>
				<img src="./afbeeldingen/GPU.png" class="theorieImage small" />

				De GPU heeft heel veel cores, maar weer een lagere frequentie ten opzichte van de CPU en het is lastiger om er bepaalde instructies op uit te voeren. De GPU kan dus vooral veel eenvoudige taken tegelijkertijd uitvoeren. Dit maakt het erg handig voor het laden van beelden en dus voor bijvoorbeeld het spelen van spellen. De GPU kan echter ook andere taken uitvoeren, maar deze zijn vrij geavanceerd. Denk hierbij bijvoorbeeld aan het trainen van zelflerende programma’s.
			</p>

			<p>
				<img src="./afbeeldingen/HDD.png" class="theorieImage small inline" />
				<img src="./afbeeldingen/SSD.png" class="theorieImage small inline" />
				</br>

				Er zijn meerdere soorten schijven. Deze zijn voornamelijk op te delen in twee type schijven; de SSD (Solid State Drive) en de HDD (harddisk drive). De SSD werkt met cellen die maar een aantal keer beschreven kunnen worden, terwijl een HDD werkt met ladingen aanbrengen op een ronddraaiende schijf. Het voordeel van een SSD is dat hij t.o.v. een HDD veel sneller is en dat als het kapot gaat de data vaak leesbaar blijft.

				Het nadeel is dat op dit moment SSD's nog wel prijzig zijn vergeleken met een HDD. Een voordeel van een HDD is dat deze voor weinig geld veel informatie op kunnen slaan. De prijs per GB voor een SSD bedraagen nu (in 2018) rond de €0,268, terwijl de prijs per GB voor een HDD zo rond de €0,028 ligt.
			</p>

			Afkortingen:
			<div class="table-wrapper">
				<table>
					<tr>
						<th>Afkorting</th>
						<th>Volledige naam</th>
						<th>Vertaling</th>
					</tr>

					<tr>
						<td>CPU</td>
						<td>Central Processing Unit</td>
						<td>Centrale processoreenheid</td>
					</tr>
					<tr>
						<td>RAM</td>
						<td>Random Accessible Memory</td>
						<td>Willekeurig toegankelijk geheugen</td>
					</tr>
					<tr>
						<td>OS</td>
						<td>Operating System</td>
						<td>Besturingssysteem</td>
					</tr>
					<tr>
						<td>GPU</td>
						<td>Graphics Processing Unit</td>
						<td>Grafische processoreenheid</td>
					</tr>
					<tr>
						<td>SSD</td>
						<td>Solid State Drive</td>
						<td>Schijf zonder bewegende delen</td>
					</tr>
					<tr>
						<td>HDD</td>
						<td>Harddisk Drive</td>
						<td>Harde schijf</td>
					</tr>

				</table>
			</div>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">

			<ol class="MLquestion">
				<li>
					Beschrijf in maximaal 10 woorden de functie van de volgende onderdelen (dit hoeft niet in volledige zinnen).

					<ol>
						<li>de CPU</li>
						<li>de GPU</li>
						<li>het moederbord</li>
						<li>het RAM</li>
					</ol>
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
					<ol>
						<li>Het uitvoeren van algemene instructies.</li>
						<li>Het uitvoeren van veel eenvoudige instructies tegelijkertijd.</li>
						<li>Zorgen dat onderdelen onderling kunnen communiceren.</li>
						<li>Het opslaan van data dat snel nodig is.</li>
					</ol>
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
