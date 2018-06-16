<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H1 §3 Gates
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
			<div class="ptile active">
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
			<span class="theorieTitle">Gates</span>

			‘Gates’ (= poortjes) zijn kleine schakelingen. De eenvoudigste zijn AND en OR.
			in de input van een gate staan twee (dus twee keer een 1 of 0) Een gate vergelijkt deze twee bits, en afhankelijk van de input creërt de gate een output bestaande uit één bit (dus één 1 of 0) (logica, komt in het volgende hoofdstuk).
			bij AND is de output 1 als de twee bits in de input dezelfde waarde hebben(in dit geval betekent 1 dat er stroom is in het circuit).
			daarom ook de naam 'AND'. bij OR moet minimaal een van de twee bits in de input 1 zijn om de output 1 uit te krijgen. maar twee keer 1 geeft ook de output 1. dus alleen als de output twee keer 0 is zal de output bij een OR gate 0 zijn.
			als je deze poorten in een stroom circuit gebruikt, dan geld dat wanneer de output 1 is de kring gesloten is (en er dus wel stroom kan circuleren), en bij 0 de kring open is (er dus geen stroom kan circuleren.)
			Je zou de twee poorten in een elektrisch circuit kunnen gebruiken door poorten in verschillende manieren in het circuit te plaatsen, dit ziet er als volgt uit:
			AND

			<img src="./afbeeldingen/AND.svg" class="theorieImage" />

			OR

			<img src="./afbeeldingen/OR.svg" class="theorieImage" />


			De grijze strepen zijn de mogelijke posities van de schakelaars. Als ze dicht zijn, dan kan er stroom doorheen, als ze open zijn niet, 1 of 0.


		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">

			<ol class="MLquestion">
				<li>
					Neem als waarden 0 en 1 (in die volgorde).

					<ol>
						<li>Welk resultaat zal dit geven bij een AND-gate?</li>
						<li>En bij een OR-gate?</li>
						<li>Teken de AND- en OR-gates als een elektrisch circuit.</li>
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
						<li>0</li>
						<li>1</li>
						<li>
							AND
							<img src="./afbeeldingen/vraagAND.svg" class="theorieImage" />

							OR
							<img src="./afbeeldingen/vraagOR.svg" class="theorieImage" />

						</li>
					</ol>
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
