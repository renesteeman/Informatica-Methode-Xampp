<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2> 
			H1 §4 
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
        
			<p>Een computer werkt door veel gates samen te gebruiken om data te verplaatsen en te manipuleren. Om deze taken uit te kunnen voeren zijn verschillende onderdelen van een computer nodig, maar niet alle onderdelen voeren berekeningen uit.</p>

			<p>Andere onderdelen zorgen ervoor dat aan de randvoorwaarden wordt voldaan, bijvoorbeeld dat de data opgeslagen kan worden en dat er genoeg stroom is. De belangrijkste onderdelen van een computer worden hieronder genoemd.</p>

			<p>Het hart van de computer is de CPU (Central Processing Unit). Dit is een chip die meestal maar een paar centimeter groot is, waarop alle algemene instructies worden uitgevoerd met behulp van de eerder besproken gates en dus het heen en weer halen van binaire getallen. Tegenwoordig heeft een CPU meerdere kernen, ook wel cores genoemd. Door middel van deze kernen kan de CPU aan meerdere opdrachten tegelijk kan werken.</p>

			<p>Elke kern werkt dan als een soort mini-CPU, maar dan niet met alle onderdelen die de gehele CPU heeft.</p>

			<p>De CPU heeft namelijk niet alleen de onderdelen voor het rekenen, maar daarnaast ook andere onderdelen, een voorbeeld is cache opslag.</p>

			<p>Cache is een vorm van hele snelle opslag, maar vaak met een kleine capaciteit (enkele MB’s of minder).</p>

			<p>De snelheid van een CPU hangt af van meerdere factoren, voornamelijk de IPC, frequentie, cache en de hoeveelheid kernen. De IPC is het aantal instructies dat per clock uitgevoerd kan worden. Een clock is een cyclus van instructies, bijvoorbeeld haal waardes van x naar y of voeg x toe aan y. De frequentie geeft aan hoeveel clocks er in een seconde uitgevoerd worden.</p>

			<p>Het RAM, Random Accessible Memory, slaat alle informatie op die snel beschikbaar moet zijn. Zaken als het OS en programma’s worden hierop gezet, zodat de CPU niet steeds verzoeken hoeft te doen om gegevens op een schijf op te vragen en ze dus veel sneller kan krijgen. Hoe meer ram, des te meer er opgeslagen kan worden in  dit snelle geheugen.</p>

			<p>Het moederbord is een soort hub waarop alle hardware aangesloten is: de CPU, GPU, schijven (opslag), usb poorten, internet en nog een heleboel andere zaken zitten allemaal hierop aangesloten. Het moederbord zorgt er dus voor dat alle onderdelen met elkaar kunnen communiceren.</p>

			<p>De GPU heeft heel veel kernen, maar weer een lagere frequentie ten opzichte van de CPU. Tevens is het lastiger om er bepaalde instructies op uit te voeren. De GPU kan dus vooral veel eenvoudige taken tegelijkertijd uitvoeren. Dit maakt het erg handig voor het laden van beelden en dus voor bijvoorbeeld het spelen van spellen. De GPU kan echter ook andere taken uitvoeren, maar deze zijn vrij geavanceerd. Denk hierbij aan het trainen van zelflerende programma’s.</p>

			<p>Er zijn meerdere soorten schijven. Deze zijn voornamelijk op te delen in twee type schijven; de SSD (Solid State Drive) en de HDD (harddisk drive).</p>

			<p>Verschillen tussen de SSD en de HDD</p>

			<p>Verschil</p>

			<p>SSD</p>

			<p>HDD</p>

			<p>Werking</p>

			<p>Door middel van cellen die maar een aantal keer beschreven kunnen worden</p>

			<p>Door middel van ladingen aan te brengen op een ronddraaiende schijf</p>

			<p>Snelheid</p>

			<p>Super snel (afhankelijk van het soort SSD)</p>

			<p>Gemiddeld; 250mb/s</p>

			<p>Langzamer dan een SSD</p>

			<p>Gemiddeld; 20mb/s</p>

			<p>Corruptie</p>

			<p>Wanneer een SSD kapot gaat blijft de data vaak nog leesbaar</p>

			<p>Wanneer een HDD kapot gaat is de data niet meer leesbaar</p>

			<p>Prijs</p>

			<p>De prijs per GB bedraagt op het moment van schrijven rond de €0,268.</p>

			<p>De prijs van een 1TB SSD ligt zo rond de €300.</p>

			<p>De prijs per GB bedraagt op het moment van schrijven rond de €0,028</p>

			<p>De prijs van een 1TB HDD ligt zo rond de €50, waardoor je dus voor weinig geld veel informatie op kan slaan.</p>

			<p>Afkorting</p>

			<p>Volledige naam</p>

			<p>Vertaling</p>

			<p>CPU</p>

			<p>Central Processing Unit</p>

			<p>Centrale processoreenheid</p>

			<p>RAM</p>

			<p>Random Accessible Memory</p>

			<p>Willekeurig toegankelijk geheugen</p>

			<p>OS</p>

			<p>Operating System</p>

			<p>Besturingssysteem</p>

			<p>GPU</p>

			<p>Graphics Processing Unit</p>

			<p>Grafische processoreenheid</p>

			<p>SSD</p>

			<p>Solid State Drive</p>

			<p>Schijf zonder bewegende delen (schijf in solide staat)</p>

			<p>HDD</p>

			<p>Harddisk Drive</p>

			<p>Harde schijf</p>

		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>