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

			<p>Ook dit is niet ingewikkeld. Je haalt steeds het onderste getal van het bovenste getal af. Als je op -1 uitkomt ‘leen’ je van het volgende getal.</p>

			<img src="./afbeeldingen/aftrekken.svg" class="theorieImage" />

			<p>Vermenigvuldigen</p>

			<p>Vermenigvuldigen lijkt wat moeilijker, maar dit valt mee. Dit doe je door steeds het meest rechtste nummer van onder te vermenigvuldigen met de nummers van de bovenste rij. Dit gaat dus van rechts naar links. Als de rij af is ga je bij de onderste rij de stappen herhalen voor het getal dat een plek verder naar links staat. Je zet steeds de uitkomsten onder elkaar en telt ze op het einde bij elkaar op. Denk eraan om het antwoord per rij ook steeds een plek op te laten schuiven.</p>

			<img src="./afbeeldingen/multiplicatie.svg" class="theorieImage" />

			<p>Delen</p>

			<p>Binair delen is niet gemakkelijk, daarom begint het voorbeeld met een ‘normale’ staartdeling. De bedoeling is om steeds te kijken hoe vaak de noemer (het onderste getal in de breuk) in de teller (het bovenste getal in de breuk) past en vervolgens die aantal keren bij elkaar op te tellen en mocht er iets overblijven dit als breuk over te nemen.</p>

			<p>Bij binair gaat het op exact dezelfde manier, maar het lijkt een stuk lastiger.</p>

			<p>(Bij binair rekenen mogen alle nullen waar aan de linkerkant geen 1 voor staat, weg gelaten worden)</p>

			<img src="./afbeeldingen/delen.svg" class="theorieImage" />

		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
