<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B1 §3 Gates
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
			Een gate vergelijkt twee waarden om een nieuwe te creëren (logica, komt in het volgende hoofdstuk). Bij AND moeten beide waarden 1 zijn, bij OR minimaal 1. Dit kan door stroompjes door een circuit te sturen. Als (genoeg) schakelingen in het circuit dicht zijn, dan is er een gesloten stroomkring, dus 1. Wanneer er geen sprake is van een gesloten stroomkring spreken we van 0.
			Je zou het elektrisch circuit als volgt kunnen weergeven:
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
