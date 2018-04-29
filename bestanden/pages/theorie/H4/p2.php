<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H4 §1 Introductie tot arduino
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
			<p>
				De arduino is een soort minicomputer die simpele berekeningen kan uitvoeren en daarmee andere elektronica kan aansturen door het sturen van elektriciteit. De ‘basis’ arduino heet Arduino Uno en ziet er als volgt uit. (Dit is niet het originele model, maar functioneel hetzelfde)
				<img src="./afbeeldingen/arduino.png" />
			</p>
			<p>
				Het kan met andere elektronica communiceren via de pinnen. De pinnen met een ~ ernaast zijn PWM (pulse width modulation) pinnen, ze kunnen een signaal met sterkte van 0 tm 255 geven. De andere pinnen zijn digitale pinnen, ze kunnen dus alleen 1 of 0 aangeven.
			</p>
			<p>
				In dit hoofdstuk leer je de basis van de arduino en daarvoor gebruiken we naast de arduino uno ook LEDs, een servo motor, een resistor en een LDR. Een LED (light dependent resistor) is een onderdeel dat elektriciteit in een richting doorlaat en wanneer dit gebeurt light geeft. Een servo motor is een soort ronddraaiende arm, hiermee kun je bewegende apparaten maken. Een resistor, oftewel weerstand gebruik je om onderdelen te beschermen tegen te hoge spanning (R=U/I). De LDR gebruiken als sensor, oftewel iets dat informatie over de wereld kan digitaliseren en doorsturen via elektriciteit. Bij een LDR wordt de weerstand kleiner naarmate er meer licht op valt, van deze eigenschap kun je handig gebruikmaken om een andere sterkte aan een signaal te geven. Een voorbeeld hiervan gaan we later in dit hoofdstuk uitwerken.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">

			<ol class="MLquestion">
				Waar of niet waar:
				<li>
					De weerstand van een LDR neemt toe als er meer licht op valt.
				</li>
				<li>
					Een arduino kan (zonder aanpassingen) gebruikt worden als een desktop met windows.
				</li>
				<li>
					Met PWM kan een waarde van 1 aangeven.
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
				Waar of niet waar:
				<li>
					Niet waar
				</li>
				<li>
					Niet waar
				</li>
				<li>
					Waar
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
