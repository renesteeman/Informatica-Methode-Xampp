<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H1 §2 Binair rekenen
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

			<p>Optellen</p>

			<p>Optellen in binair is niet ingewikkeld. Je telt het bovenste en het onderste getal bij elkaar op en in het geval van 1+1 krijg je dan 10 als uitkomst. Het is alleen zo dat je bij het optellen van binaire getallen vaker iets moet onthouden, omdat het vaker boven de grenswaarde (meer dan 1) uitkomt.</p>

			<img src="./afbeeldingen/additie.svg" class="theorieImage" />

			<p>Decimaal: 108+49 = 157, dus het klopt.</p>

			<p>Getallen met elkaar verminderen</p>

			<p>Ook dit is niet ingewikkeld. Je haalt steeds het onderste getal van het bovenste getal af. Als je op -1 uitkomt ‘leen’ je van het volgende nummer.</p>

			<img src="./afbeeldingen/aftrekken.svg" class="theorieImage" />

			<p>Vermenigvuldigen</p>

			<p>Vermenigvuldigen lijkt wat moeilijker, maar dit valt mee. Dit doe je door steeds het meest rechtste nummer van onder te vermenigvuldigen met de nummers van de bovenste rij. Dit gaat dus van rechts naar links. Als de rij af is ga je bij de onderste rij de stappen herhalen voor het getal dat een plek verder naar links staat. Je zet steeds de uitkomsten onder elkaar en telt ze op het einde bij elkaar op. Denk eraan om het antwoord per rij ook steeds een plek op te laten schuiven naar links, je kunt er ook steeds een nul achter zetten om dit te verduidelijken.</p>

			<img src="./afbeeldingen/multiplicatie.svg" class="theorieImage" />

			<p>
				Binair delen is ook mogelijk, maar dit is vrij lastig (voor een mens) om te doen. We zullen dit dus niet gaan uitvoeren, omdat het simpelweg te complex wordt.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">

			Binair rekenen
			<ol class="MLquestion">
				<li>
					Tel op

					<ol>
						<li>10111+01100</li>
						<li>01111+1110101</li>
						<li>001100111+01111100</li>
					</ol>
				</li>


				<li>
					Trek af

					<ol>
						<li>10110-11</li>
						<li>10110-0110</li>
						<li>110011-101110</li>
					</ol>
				</li>

				<li>
					Vermenigvuldig

					<ol>
						<li>111*000</li>
						<li>101*101</li>
						<li>11011*101111 </li>
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
					Tel op

					<ol>
						<li>100011</li>
						<li>10000100</li>
						<li>11100011</li>
					</ol>
				</li>

				<li>
					Trek af

					<ol>
						<li>10011</li>
						<li>10000</li>
						<li>100</li>
					</ol>
				</li>

				<li>
					Vermenigvuldig

					<ol>
						<li>0</li>
						<li>11001</li>
						<li>1001010</li>
					</ol>
				</li>

			</ol>

		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
