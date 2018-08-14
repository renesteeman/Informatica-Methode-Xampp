<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H1 §4 Onderdelen van de computer
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

			<p>Een computer werkt door veel gates samen te gebruiken om data te verplaatsen en te manipuleren. Om dit te doen zijn veel verschillende onderdelen nodig, maar niet alle onderdelen voeren berekeningen uit.</p>

			<p>Andere onderdelen zorgen ervoor dat aan de randvoorwaarden wordt voldaan, bijvoorbeeld dat de data opgeslagen kan worden en dat er genoeg stroom is. De belangrijkste onderdelen van een computer worden hieronder genoemd.</p>

			<img src="./afbeeldingen/CPU.png" class="theorieImage small" />

			<p>Het hart van de computer is de CPU (Central Processing Unit). Dit is een chip die meestal maar een paar centimeter groot is, waarop alle algemene instructies worden uitgevoerd met behulp van de eerder besproken gates en dus het heen en weer halen van binaire getallen. Tegenwoordig heeft een CPU meerdere kernen, ook wel cores genoemd. Door middel van deze kernen kan de CPU aan meerdere opdrachten tegelijk werken.</p>

			<p>Elke kern werkt dan als een soort mini-CPU, maar dan niet met alle onderdelen die de gehele CPU heeft.</p>

			<p>De CPU heeft namelijk niet alleen de onderdelen voor het rekenen, maar daarnaast ook andere onderdelen. Een voorbeeld hiervan zijn cache opslag en de nodige structuren om data door te kunnen sturen.</p>

			<p>Cache is een vorm van hele snelle opslag, maar vaak met een kleine capaciteit (enkele MB’s of minder).</p>

			<p>De snelheid van een CPU hangt af van meerdere factoren, voornamelijk de IPC, frequentie, cache en de hoeveelheid kernen. De IPC is het aantal instructies dat per clock uitgevoerd kan worden. Een clock is een cyclus van instructies, bijvoorbeeld haal waardes van x naar y of voeg x toe aan y. De frequentie geeft aan hoeveel clocks er in een seconde uitgevoerd worden.</p>

			<img src="./afbeeldingen/RAM.png" class="theorieImage small" />

			<p>RAM, Random Accessible Memory, slaat alle informatie op die snel beschikbaar moet zijn. Zaken als het OS en actieve programma’s worden hierop gezet, zodat de CPU niet steeds verzoeken hoeft te sturen om gegevens van een schijf te krijgen en er dus veel sneller bij kan. Des te meer ram, des te meer informatie snel beschikbaar kan zijn.</p>

			<img src="./afbeeldingen/MOBO.png" class="theorieImage small" />

			<p>Het moederbord is een soort hub waarop alle hardware aangesloten is: de CPU, GPU, schijven (opslag), usb poorten, internet en nog een heleboel andere zaken zitten allemaal hierop aangesloten. Het moederbord zorgt er dus voor dat alle onderdelen met elkaar kunnen communiceren.</p>

			<img src="./afbeeldingen/GPU.png" class="theorieImage small" />

			<p>De GPU heeft heel veel kernen, maar weer een lagere frequentie ten opzichte van de CPU. Tevens is het lastiger om er bepaalde instructies op uit te voeren. De GPU kan dus vooral veel eenvoudige taken tegelijkertijd uitvoeren. Dit maakt het erg handig voor het laden van beelden en dus voor bijvoorbeeld het spelen van spellen. De GPU kan echter ook andere taken uitvoeren, maar deze zijn vrij geavanceerd. Denk hierbij aan het trainen van zelflerende programma’s.</p>

			<img src="./afbeeldingen/HDD.png" class="theorieImage small inline" />
			<img src="./afbeeldingen/SSD.png" class="theorieImage small inline" />

			<p>Er zijn meerdere soorten schijven. Deze zijn voornamelijk op te delen in twee type schijven: de SSD (Solid State Drive) en de HDD (harddisk drive).</p>

			<p>Verschillen tussen de SSD en de HDD:</p>

			<div class="table-wrapper">
				<table>
					<tr>
						<th>Verschil</th>
						<th>SSD</th>
						<th>HDD</th>
					</tr>
					<tr>
						<td>Opslagmethode</td>
						<td>Data opslaan in cellen die maar enkele keren beschreven kunnen worden.</td>
						<td>Magnetische ladingen aanbrengen op een draaiende schaaf.</td>
					</tr>
					<tr>
						<td>Snelheid</td>
						<td>Super snel (afhankelijk van het soort SSD), gemiddeld 250mb/s.</td>
						<td>Langzamer dan een SSD, gemiddeld 20mb/s.</td>
					</tr>
					<tr>
						<td>Veiligheid van data</td>
						<td>Wanneer een SSD kapot gaat blijft de data vaak nog leesbaar.</td>
						<td>Wanneer een HDD kapot gaat is de data niet meer leesbaar.</td>
					</tr>
					<tr>
						<td>Prijs</td>
						<td>De prijs per GB bedraagt op dit moment (2018) zo'n €0,268. De prijs van een 1TB SSD ligt zo rond de €300.</td>
						<td>De prijs per GB bedraagt op dit moment (2018) zo'n €0,028. De prijs van een 1TB HDD ligt zo rond de €50, waardoor je dus voor weinig geld veel informatie op kan slaan.</td>
					</tr>

				</table>
			</div>

			<p>Afkortingen:</p>

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
