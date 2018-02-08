<?php
include('../../php/DB_connect.php');
include('../../php/header.php');
?>

<link rel="stylesheet" href="../../css/main.min.css">
<link rel="stylesheet" href="../../css/par.min.css">

<body>

	<div class="debug">
		<?php

		?>
	</div>

	<div class="main">
		<div class="title">
			§1 het binair systeem
		</div>

		<div class="uitleg">
			<p>
				Een computer ‘begrijpt’ alleen 0’en en 1’en, deze worden in de computer heen en weer gestuurd waardoor de computer dingen kan uitvoeren. Ze worden begrepen door de af- of aanwezigheid van stroom, een 0 of 1 dus. Een hele reeks van deze 1’en en 0’en kan betekenis hebben, zoals een letter of cijfer samen zijn ze dus nuttig. In binair wordt van rechts naar links geteld en elke geeft een getal weer en elke 0 de afwezigheid van een getal. Alle 1’en samen en de ruimte ertussen geven een volledige waarde weer. De plek die de 1 heeft in de reeks bepaald zijn waarde, de eerste is 1 waard, de 2e 2, de 3e 4 en zo blijft het zich steeds verdubbelen des te verder het naar links gaat.

				Een voorbeeld is 01001, als je van links naar rechts telt en alle waardes daarna bij elkaar optelt kom je op 1+8=9 uit. Dit kan ook andersom 9=8+1, dus eerst 1, en dan 1000, dat wordt samen 1001 (= 01001).
			</p>

		</div>

		<div class="oefeningen">
			<p>
				<h2>Oefeningen</h2>
				<ul>
					<li>
						Hoe wordt een nul en een één door een computer begrepen?
					</li>
					<li>
						Vertaal 001, 011, 1001001 naar het decimale systeem (‘normale’ getallen)
					</li>
					<li>
						Vertaal 5, 20 en 40 naar binair
					</li>
				</ul>
			</p>
		</div>

		<div class="antwoorden">
			<p>
				<h2>Antwoorden</h2>
				<ul>
					<li>
						Wel stroom = 1, geen stroom = 0
					</li>
					<li>
						1, 3, 73
					</li>
					<li>
						101, 10100, 101000
					</li>
				</ul>
			</p>
		</div>

	</div>

</body>


<?php
include('../../php/footer.php');
?>
