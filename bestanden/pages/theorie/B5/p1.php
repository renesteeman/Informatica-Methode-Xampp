<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B5 §1 OSI
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

			<p>OSI</p>

			<p>Een netwerk is een verzameling van apparaten die met elkaar kan communiceren. Je kunt hierbij denken aan het netwerk dat je waarschijnlijk thuis hebt, dat netwerk bestaat uit bijvoorbeeld een laptop, een router (het kastje van de provider) en twee telefoons. Via een netwerk kunnen apparaten data uitwisselen door het sturen van pakketjes met gegevens. Zo’n pakketje bevat de data die je wilt sturen in binaire vorm samen met instructies over waar het heen zou moeten en hoe het gelezen zou moeten worden samen met nog wat andere gegevens.</p>

			<p>Het verzenden van gegevens maakt gebruikt van het OSI-model, dit model toont hoe data wordt omgezet in een pakket en hoe dit pakket weer door kan gaan naar een ontvanger. Het OSI-model is een door ISO gestandaardiseerd referentiemodel voor datacommunicatiestandaarden, met als doel om de interoperabiliteit tussen netwerktoepassingen te vergroten. Je zou dus kunnen zeggen dat het aangeeft hoe verschillende onderdelen van netwerkcommunicatie eruitzien.</p>

			<p>Het bestaat uit zeven lagen en ziet er als volgt uit:</p>

			<div class="table-wrapper">
				<table>
					<tr>
						<th>Nr.</th>
						<th>Naam</th>
						<th>Beschrijving</th>
					</tr>
					<tr>
						<td>7</td>
						<td>Applicatie laag</td>
						<td>De netwerk functie van een applicatie</td>
					</tr>
					<tr>
						<td>6</td>
						<td>Presentatie laag</td>
						<td>De presentatie van de laag (het soort formaat en eventueel met beveiliging)</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Sessie laag</td>
						<td>Het 'gesprek' (de sessie) in stand houden tussen apparaten (vooral theoretisch)</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Transport laag</td>
						<td>De informatie opdelen in stukjes om te versturen</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Netwerk laag</td>
						<td>Het bepalen van de adressen voor de route om het andere apparaat te bereiken</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Data link laag</td>
						<td>De fysieke route bepalen</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Fysieke laag</td>
						<td>Het pakket versturen</td>
					</tr>
				</table>
			</div>

			<p>Je kunt het onthouden door te denken aan 'Anton Piek schildert tofu naast duikende Friezen'.</p>

			<p>Hoe verder naar onder je gaat in het model, des te meer informatie er in een 'pakket' zit, er komen namelijk steeds meer details bij om de data te kunnen versturen.</p>

			<p>Het versturen van informatie via een netwerk zal gaan door op een apparaat van laag 7 naar 1 van het OSI-model te gaan en vervolgens de ontvanger van de data van laag 1 naar 7 te laten gaan. Zo kan de data weer worden ‘uitgepakt’ door de ontvanger.</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Beschrijf in eigen woorden wat het OSI-model is.</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>Het OSI-model is een model dat schematisch weergeeft hoe informatie over een netwerk verstuurt kan worden aan de hand van (datacommunicatie)standaarden.</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
