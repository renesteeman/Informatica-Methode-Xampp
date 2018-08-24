<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H4 §4 verder met de arduino
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
			<p>
				Om een signaal te geven dat meer informatie bevat dan 0 of 1 kun je analogWrite() gebruiken. Dit geeft een waarde van 0 tm 255, het werkt op de arduino door snel te wisselen tussen 0 en 1. Dit kan bijvoorbeeld gebruikt worden om een led langzaam van helderheid te veranderen. Deze functie werkt alleen op de pinnen met het ~ ernaast.
			</p>
			<p>
				Om een ‘random’ getal te krijgen kun je random() gebruiken. Een voorbeeld is int intensiteit = random(500); Dit zal intensiteit voor de intensiteit een waarde van 0 tm 500 geven.
			</p>
			<p>
				Voor comments (uitleg) kun je // gebruiken voor één regel of /* aan het begin en */ aan het eind van een comment van meerdere regels.
			</p>
			<p>
				De taal ondersteunt ook loops en condities. Voor een if else statement ziet de syntax (de schrijfwijze) er als volgt uit:

<pre><code>if (voorwaarde){
	//inhoud
} else {
//inhoud
}</code></pre>

			</p>
			<p>
				Je kunt voor vergelijkingen weer (zoals in python) gebruik maken van != (is niet gelijk aan), < (is minder), > (is meer), == (is gelijk aan) en nog een paar andere. Het rekenen is ook hetzelfde als in python.
			</p>
			<p>
				Om de rest van de mogelijkheden te bekijken kun je naar <a href="https://www.arduino.cc/reference/en/">https://www.arduino.cc/reference/en/</a> gaan.
			</p>
			<p>
				Verder biedt arduino ook nog libraries, dit zijn een soort uitbereidingen om meer functies toe te voegen, de voorgaande link geeft hier ook informatie over.
			</p>
			<p>
				Er zijn ook nog andere (krachtigere en compactere) arduino’s die voor het grootste deel hetzelfde werken als de uno.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">

			<ol>
				<li>
					Geef de naam van een arduino die krachtiger is dan de uno.
				</li>
				<li>
					Hoe ziet een IF statement eruit die code uitvoert als twee waarden niet gelijk zijn aan elkaar (je mag doen alsof er al variabelen gedeclareerd zijn)?
				</li>
			</ol>

		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">

			<ol>
				<li>
					Er zijn meerdere antwoorden mogelijk, waaronder de arduino mega.
				</li>
				<li>
					<pre>
						<code>
if(waarde1 != waarde2){
	//uit te voeren code
}
						</code>
					</pre>
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
