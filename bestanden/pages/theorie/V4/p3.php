<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			V4 Netwerken §3 Werking en gevaren
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

		</div>
	</div>

	<div class="theorie">
		<div class="bar-s">
			<h3>
				Theorie
			</h3>
		</div>

		<div class="theorie-content">

			<p>IP</p>

			<p>In een netwerk worden IP-adressen gebruikt om te achterhalen waar bepaalde data heen moet. Een IPv4-adres bevat waardes van 0 tm 255 die in vier 'blokken' zijn verdeeld. Zo kan een adres er als volgt uitzien 192.168.56.1, een netwerk-adapter kan dit gebruiken om data naar de juiste plek te sturen. Stel jij hebt adres 192.168.56.1 en ik 192.168.56.2, dan zou jij een bericht kunnen sturen naar mij door het te verzenden naar 192.168.56.2.</p>

			<p>Er zijn momenteel twee versies van IP-adressen in gebruik, dit zijn IPv4 en IPv6. Het grootste verschil tussen deze twee is dat IPv6 meer adressen kan bieden. De IPv4-addressen zijn namelijk bijna op, terwijl er steeds meer apparaten bijkomen. Een IPv6 adres ziet er ook heel anders uit, een voorbeeld is fe80∷32f2:e38c:394c:394c:f704%17.</p>

			<p>Een IP-adres is meestal dynamisch, dit wil zeggen dat het (regelmatig) kan veranderen. Als je met een laptop op een ander wifi netwerk zou gaan is de kans groot dat je een ander IP-adres krijgt. Servers hebben vaak wel een statisch (vast) IP-adres. Er kan dan makkelijker mee verbonden worden, aangezien het adres niet steeds opnieuw gezocht hoeft te worden.</p>

			<p>MAC</p>

			<p>Een andere manier om een adres aan te geven is met een MAC-adres. Het MAC-adres is gekoppeld aan de fysieke netwerkadapter. Een voorbeeld van zo'n adres is A0-00-27-00-00-11. Het MAC-adres wordt tijdens de productie van een adapter aan de adapter gekoppeld. Data kan niet direct naar een MAC-adres worden gestuurd, het moet eerst aan een IP-adres gekoppeld worden.</p>

			<p>DHCP</p>

			<p>DHCP is een methode die gebruikt wordt om een IP-adres te koppelen aan een MAC-adres, het voorkomt dat hetzelfde IP-adres meerdere keren op het netwerk wordt uitgedeeld en maakt een apparaat bereikbaar op het netwerk. Als een apparaat met een netwerk wilt verbinden vraagt het aan een DHCP-server op dat netwerk voor een IP-adres. De server zal dan een IP-adres voorstellen en de client kan dan bepalen of hij het accepteert. Als het geaccepteerd wordt kan het apparaat via dat IP-adres bereikt worden.</p>

			<p>Gevaren</p>

			<p>Ondanks dat er veel handige systemen voor netwerken bestaan kunnen ze problemen ondervinden. Een probleem dat vaak voorkomt is het schalingseffect, oftewel dat de capaciteit (de hoeveel vervoerbare data) kleiner is dan gewenst. Het gevolg hiervan is dat de snelheid omlaag gaat. Een manier om dit te verhelpen zou het beter instellen van een netwerk kunnen zijn of het gebruiken van een snellere verbinding. Betere instellingen kunnen ervoor zorgen dat de beschikbare capaciteit beter verdeeld kan worden over de verschillende gebruikers. Iemand kan dan misschien geen film kijken op Netflix, maar de anderen kunnen wel hun presentatie downloaden.</p>

			<p>Een ander probleem is beveiliging. Het is mogelijk om gegevens op een netwerk te onderscheppen en deze voor kwaadaardige doeleinden te gebruiken. Een maatregel hiervoor zou encryptie (het versleutelen van data) kunnen zijn of het verifiëren van verbonden apparaten (controleren of ze wel op het netwerk thuishoren). Het is ook belangrijk om werknemers in een bedrijf alleen toegang te geven tot de delen van een netwerk dat ze nodig hebben. Iemand die bij human resources werkt heeft geen toegang nodig de documenten van de CEO. Naast digitale beveiliging is physieke beveiliging ook belangrijk. Denk hierbij aan een deur die alleen opengaat met een pasje, vingerpintscanner of dergelijke die toegang tot een serverruimte blokkeert voor onbevoegde. </p>

			<p>
				Als de beveiliging niet goed geregeld zou zijn kunnen er allerlei problemen optreden, zoals het offline gaan van een netwerk, diefstal van gegevens of zelfs een aanval op apparaten die met het netwerk verbonden zijn.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Wat is het verschil tussen een IP- en MAC-adres?</li>
				<li>Wat is de functie van een DHCP-server?</li>
				<li>Noem 1 methode om de beveiliging van een verbinding te verbeteren.</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>Een MAC-adres is een adres dat gekoppeld is aan een fysieke kaart, terwijl een IP-adres dynamisch wordt verleend. Hiernaast kan er geen data direct naar een MAC-adres gestuurd worden, terwijl dit bij een IP-adres wel kan.</li>
				<li>Een DHCP-server deelt IP-adressen uit aan apparaten die met zijn netwerk zijn verbonden.</li>
				<li>Het toepassen van encryptie of het verifiëren van verbonden apparaten. (andere antwoorden zijn mogelijk)</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
