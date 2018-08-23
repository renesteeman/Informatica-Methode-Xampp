<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H4 §5 LED met LDR
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
			<div class="ptile active">
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
				Eerst nog een wat complexer voorbeeld. Een ledlampje dat meer licht geeft als het donker is en minder als het licht is. Dit werkt door met een LDR te achterhalen of er veel of weinig licht is en dan met een berekening een waarde voor het ledlampje te bepalen. Omdat we meer precisie willen dan aan of uit gebruiken we analogWrite() om de waarde voor de led in te stellen. Neem de code maar eens door, hierna ga je het uitbereiden. Er staat steeds uitleg bij over wat er gedaan wordt.
			</p>
			<p>
<pre><code>int sensorPin = A0; //stel de pin in voor het meten van de weerstand van de LDR
int ledPin = 3; //stel de pin voor de led in (dit moet een pin met het golfje zijn)
int sensorValue = 0;
int ledValue = 0;

void setup() {
  Serial.begin(9600); //zet snelheid
  pinMode(sensorPin, INPUT); //zet de sensorPin op aflees modus
  pinMode(ledPin, OUTPUT); //zet de ledPin op output modus
}
void loop() {
  //zet sensorValue gelijk aan de waarde van de weerstand van de LDR die afgelezen wordt
  sensorValue = analogRead(sensorPin);

  //laat de sensorwaarde zien
  Serial.print("sensorValue = ");
  Serial.println(sensorValue);

  //zorg ervoor de helderheid van de led omgekeerd evenredig is met de weerstand (als het donker is geeft de led meer licht)
  ledValue = (30000/sensorValue);

  //zorg dat de led waarde niet groter is dan 255 (dit is de maximum waarde)
  if(ledValue>255){
    ledValue = 255;
  }

  //laat de waarde voor de led zien
  Serial.print("ledValue =");
  Serial.println(ledValue);
  Serial.println();

  //zet de helderheid van het licht gelijk aan de weerstands waarde van de LDR
  analogWrite(ledPin, ledValue);
  delay(1000); //wacht 1s
}

//Probeer het uit door jouw vinger op de LDR te leggen (niet op de 'draad')
//Schijn nu met een lampje op de LDR
//Laat nu een lampje knipperen en kijk naar de reactie van het led lampje</code></pre>

			</p>
			<p>
				Hier hoort natuurlijk ook een circuit bij. Dit is wat lastiger en hoef je niet helemaal te begrijpen. Let wel op dat als je het gaat namaken je eerst goed moet controleren voordat je het aan zet! Om de pinnummers te achterhalen kun je ook bovenaan in de code kijken. Volg de pijlen om te zien hoe de elektriciteit zich verplaatst.

				<img src="./afbeeldingen/LDR_LED.png" />
			</p>
			<p>
				Dan nu de uitdaging voor dit hoofdstuk. Laat een servo naar links draaien in het donker en naar rechts als het licht is. Er volgt nog een stukje uitleg.
			</p>
			<p>
				De rode kabel bij de servo is +, verbindt dit met een 5V pin. De zwarte of bruine draad is de -, verbindt dit met grond (de GND pin). De andere draad (meestal geel) is voor het signaal door te sturen, verbindt deze met een analoge pin, dus een van de pinnen met A ernaast (bijvoorbeeld A5).
			</p>
			<p>
				Voordat je gaat programmeren moet je eerst de servo library (uitbereiding) toevoegen, dit maakt het geven van commando’s voor de servo veel makkelijker. Ga hiervoor naar de arduino software, dan sketch, dan include library en klik op servo. Voor de rest van de uitleg ga als een echte programmeur zelf dingen zoeken, de pagina voor de library is <a href="https://playground.arduino.cc/ComponentLib/Servo">https://playground.arduino.cc/ComponentLib/Servo</a> hier vind je al een belangrijk deel van de code die je nodig zal hebben. Probeer het echt op te lossen en samenwerken is aanbevolen. Succes!
			</p>

		</div>

	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
