<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B5 §2 Topologie
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

			<p>Netwerkonderdelen en topologie</p>

			<p>Een netwerk is een groep verbonden apparaten en bestaat uit meerdere onderdelen, sommige daarvan versturen of ontvangen data en andere zorgen voor het vervoer ervan. Een overzicht van de onderdelen ziet er als volgt uit:</p>

			<p>De naam van het onderdeel</p>

			<p>Beschrijving</p>

			<p>Switch</p>

			<p>Een apparaat dat fysieke verbinding kan maken met andere apparaten en data kan doorsturen tussen apparaten op een netwerk.</p>

			<p>Router</p>

			<p>Een apparaat dat fysieke aansluitingen heeft waarmee het data tussen netwerken kan sturen. Het kan dus netwerk A en B verbinden</p>

			<p>Acces-point</p>

			<p>Een apparaat dat draadloze verbinding tot stand kan brengen en zo data kan ontvangen en verzenden.</p>

			<p>De topologie van een netwerk is eigenlijk de structuur dat apparaten in een netwerk verbind. Er zijn een paar duidelijk herkenbare vormen die behandeld zullen worden, je zult niet hoeven te weten hoe je zelf precies zo’n topologie hoeft te maken. Je kunt de blauwe bollen zien als een apparaat dat data kan doorgeven en de lijnen als de fysieke verbinding.</p>

			<p>Bus</p>

			<p>Elk apparaat is verbonden aan een gedeelde verbinding waar alle data overheen zal gaan.</p>

			<p>Ster</p>

			<p>De apparaten buiten de kern verbinden via de 'kern' met de ontvanger en alle data zal dus door de 'kern' zal gaan.</p>

			<p>Ring</p>

			<p>Elk apparaat is verbonden met de twee apparaten ernaast, de data zal dus steeds van apparaat naar apparaat moeten gaan totdat het zijn bestemming heeft bereikt.</p>

			<p>Mesh</p>

			<p>Elk apparaat is met alle andere verbonden.</p>

			<p>Tree</p>

			<p>Groepen apparaten zijn verbonden met een centraler apparaat dat verbonden is met andere groepen of een nog centraler apparaat.</p>

			<p>Een hybride topologie is een combinatie van de hierboven genoemde topologieën die samen één netwerk vormen. Het is de bedoeling dat je deze topologieën kunt herkennen.</p>

			<p>Een netwerk bevat vaak een server en clients. Een server is een computer of programma dat het mogelijk maakt voor andere apparaten of programma's om gebruik te maken van zijn rekenkracht of opslag. Een client is een apparaat of programma dat met zo'n server verbonden is. Een server kan met meerdere clienten zijn verbonden. Een server kan gebruikt worden om werk op uit te voeren zodat de clients minder rekenkracht nodig hebben of om data centraal op te slaan. Een server zou bijvoorbeeld gebruikt kunnen worden voor een website of online-applicatie.</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Wat is het verschil tussen een router en switch?

Benoem welk soort topologie bij elk nummer past (1 tm</li>
				<li>.



Welke soort topologie is het geheel van de topologie van opdracht 2?</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>Een router verbindt meerdere netwerken met elkaar. Een switch verbindt alleen apparaten binnen hetzelfde netwerk.</li>
				<li>Ring</li>
				<li>Bus</li>
				<li>Ster

Hybride topologie</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
