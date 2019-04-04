<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H1 Werking computer §3 Gates
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
			<p>'Gates', oftewel poortjes in het Nederlands, zijn kleine schakelingen. De eenvoudigste (en tevens ook de belangrijkste) zijn AND en OR. Een gate ontvangt twee binaire waarden als input en vergelijkt deze twee bits.</p>

			<p>Afhankelijk van welke gate en welke input het heeft ontvangen komt er een bepaalde output. Deze output is wederom een bit, het antwoord eigenlijk dus met ja of nee.</p>

			<p>Bij AND is de output 1 als de twee bits in de input beide 1 zijn, dan kan de stroom namelijk erdoorheen (zie afbeelding). De naam AND is dus eigenlijk best logisch, want het heeft 1 en 1 nodig.</p>

			<p>Bij OR moet minimaal een van de twee bits in de input 1 zijn om vervolgens een output van 1 uit te krijgen, maar twee keer 1 geeft ook de output 1. Alleen als de output twee keer 0 is zal de output bij een OR gate 0 zijn. De stroom kan dus doorgaan als er minimaal één keer een 1 als input is.</p>

			<p>Als je deze poorten in een stroomcircuit gebruikt geld dat wanneer de output 1 is, de kring gesloten is (en er dus wel stroom kan circuleren), en bij 0 de kring open is (en er dus geen stroom kan circuleren).</p>

			<p>Een voorbeeld van deze gates in een circuit is:</p>

			<p>AND</p>

			<img src="./afbeeldingen/AND.svg" class="theorieImage" />

			<p>OR</p>

			<img src="./afbeeldingen/OR.svg" class="theorieImage" />

			<p>De grijze strepen zijn de mogelijke posities van de schakelaars. Als ze dicht zijn kan er stroom doorheen en als ze open zijn niet, 1 of 0.</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">

			<ol class="MLquestion">
				<li>
					Neem als input de waarden 0 en 1 (in die volgorde).

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
