<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H3 §3 Variabelen
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
			<div class="ptile">
				<span class="ptile-content"><a href="p7.php">
					§7
				</a></span>
			</div>
			<div class="ptile">
				<span class="ptile-content"><a href="p8.php">
					§8
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
			<p>Variabelen zijn vaak het hart van een computerprogramma. Dit zijn namen die een waarde toegekend hebben. Een voorbeeld in python is droomAuto = “tesla”. Als je dit in het jupyter notebook invoert (voor een nieuw hokje klik je op de +) als</p>

			<p><code>droomAuto = “Tesla model S”</code></p>

			<p><code>print(droomAuto)</code></p>

			<p>En je voert het uit (toetsencombinatie ctrl+enter) dan zie je onder het hokje Tesla model S verschijnen.</p>

			<p>Er zijn verschillende type variabelen, in python hoef je deze niet zelf te definiëren, omdat de programmeertaal dit namelijk voor jou doet.</p>

			<p>Een paar belangrijkste types zijn: int, float, string, bool en array.</p>

			<p>Een int (staat voor integer) is een geheel getal, het kan positief of negatief zijn. String is een stuk tekst, in python geef je dit aan door er “ ” omheen te zetten. Bool staat voor boolean en kan als waarde true of false hebben, 1 of 0, waar of niet waar. Een array is een lijst van waardes, zoals: “Tesla”, “koffie”, 20.</p>

			<p>Voorbeelden van de types in python</p>

			<p>Als je de waarde van een variabele op het scherm wilt zien kan dit door print(NAAM VAN DE VARIABELE) te gebruiken.</p>

			<p>int: <code>getal = 5</code></p>

			<p>float:	<code>getal = 1.2</code></p>

			<p>string: <code>droomauto = “Tesla model S”</code></p>

			<p>bool: <code>waarde1 = True</code></p>

			<p><code>waarde2 = False</code></p>

			<p>list (in andere talen array): <code>lijst = [2,4,7,8,”test”,0]</code></p>

			<p>NB: Als je bij een list een waarde van een bepaalde locatie in de list wilt hebben, kun je hiernaar verwijzen via NAAMLIST[NUMMER]. Let erop dat de eerste waarde nummer 0 is en niet 1. Stel je wilt “test” hebben, dan gebruik je dus lijst[4], want test heeft de 4e plaats (volgens de telling van programmeurs, die bij 0 beginnen).</p>

			<p>NB: Bij python kan een list allerlei soorten waarden bevatten, zoals tekst en integers, andere talen staan dit vaak niet toe en accepteren maar één datatype in de list.</p>
		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">

			<ol>
				<li>
					Bedenk 5 variabelen.
				</li>
				<li>
					Stel ik heb een list met als waarden [“Tesla”,”Koffie”,”Programmeren”], welk index nummer (nummer dat de plaats in de lijst aangeeft) heb je nodig als je koffie wilt?
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
					Eigen antwoord
				</li>
				<li>
					1, je telt vanaf 0 en het is de tweede waarden, 0+1=1
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
