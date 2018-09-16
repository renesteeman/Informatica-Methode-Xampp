<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B3 §4 JS basis deel 3
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

			<p>In deze paragraaf ga je meer leren over de structuren in JS. Je hebt namelijk, net zoals bij Python condities, loops en ook functies.</p>

			<p>Het is ook handig als je comments kunt maken, aangezien de complexiteit nu zal toenemen. Een single-line comment in JS maak je met <code>//</code>, voor multi-line gebruik je <code>/* */</code>.</p>

			<p>Condities vind je in JS voornamelijk in de vorm van if statements. Deze zien er als volgt uit:</p>

			<pre><code>If (VOORWAARDE){
  //DOE …
}</code></pre>

			<p>Het is ook mogelijk om een if-else statement te gebruiken, dat ziet er als volgt uit:</p>

			<pre><code>If (VOORWAARDE){
  //DOE …
} else {
  //Doe …
}</code></pre>

			<p>Een andere optie is else if, dan kan er als volgt uitzien:</p>

			<pre><code>If (VOORWAARDE){
  //DOE …
} else if (VOORWAARDE){
  //DOE …
}</code></pre>

			<p>Je kunt ook uitgebreidere voorwaarden opstellen, dit kan met AND en OR oftewel ‘en’ en ‘of’. In JS schrijf je AND als && en OR als ||.</p>

			<p>Een voorbeeld kan zijn:</p>

			<pre><code>datum = new Date();
uur = datum.getHours();

if (uur > 12 && uur < 18){
  alert("Fijne middag");
} else if (uur > 18 && uur < 6) {
  alert("Fijne avond");
} else if (uur > 6 && uur < 12) {
  alert("Fijne ochtend");
}</code></pre>

			<p>JS heeft ook loops, oftewel herhalingsstructuren. Deze komen in de vorm van for- en while loops. Deze gaan beide door zolang een bepaalde eis voldaan wordt. Het verschil zit voornamelijk in de notatie.</p>

			<p>Een for loop ziet er als volgt uit:</p>

			<pre><code>for (i=0; i&lt;AANTAL; i++) {
  //doe iets
}</code></pre>

			<p>Het wordt vaak gebruikt om een door een lijst van waardes te gaan en iets met die waardes te doen. Een voorbeeld is:</p>

			<pre><code>items = ['PHP', 'python', 'JS', 'HTML', 'CSS', 'C++', 'C#', 'C'];

for(i=0; i&lt;items.length; i++){
  alert(items[i]);
}</code></pre>

			<p>Dit ‘programma’ zal elk item uit ‘items’ laten zien. Het is ook te schrijven als:</p>

			<pre><code>items = ['PHP', 'python', 'JS', 'HTML', 'CSS', 'C++', 'C#', 'C'];

for (item in items){
  alert(items[item]);
}</code></pre>

			<p>Een while loop wordt vaak gebruikt bij processen die lang doorgaan. Denk aan een spel waarbij de speler kan bewegen zolang hij leeft. Het is lastig om bij een klein programma een goed voorbeeld hiervan te geven. Een while loop kan er als volgt uitzien:</p>

			<pre><code>i = 0;
amount = 10;

while(i < amount){
  document.getElementById('element').textContent += i;
  i++;
}</code></pre>

			<p>Dit ‘programma’ zal aan het element met id ‘element’ de getallen 0 tm 9 toevoegen. Let erop dat je de iterator (het getal dat steeds vergeleken wordt) steeds aanpast als je het niet voor altijd door wilt laten gaan. De loop stopt namelijk pas wanneer de conditie niet meer waar is.</p>

			<p>Als laatste onderdeel van deze paragraaf behandelen we functies. Functies zijn stukken code die gegroepeerd zijn. Dit wordt vaak gebruikt voor herhaling, maar kan ook handig zijn voor een duidelijkere structuur. De syntax van een functie is:</p>

			<pre><code>function FUNCTIE_NAAM(NODIGE_DATA){
  //doe iets
}</code></pre>

			<p>Je kunt een functie ‘aanroepen’ doormiddel van FUNCTIE_NAAM(NODIGE_DATA); De functie zal dan worden uitgevoerd. Op de plek van NODIGE_DATA kan data staan die de functie nodig heeft, denk aan variabelen die in de rest van de code voorkomen. Een voorbeeld van een kort programma met functies is:</p>

			<pre><code>function updateTime(DoorTeSturenInfo){
  datum = new Date();
  tijd = datum.getTime();
  document.getElementById('element').textContent = "Het is " + tijd + " milliseconde na 1 januari 1970. En \x22" + DoorTeSturenInfo + "\x22 werd doorgestuurd.";
}

function main(){
  DoorTeSturenInfo = "Stuur door naar functie.";
  setInterval(function(){
    updateTime(DoorTeSturenInfo);
  }, 1000);
}

main();</code></pre>

			<p>Dit programma zal de inhoud van het element met id ‘element’ vervangen met het aantal milliseconde sinds 1 januari en dit om de seconde verversen. Je hoeft niet de hele code te snappen, maar wel hoe de functie geschreven is en wordt opgeroepen ( updateTime(DoorTeSturenInfo); en main(); ). De ‘DoorTeSturenInfo’ is hier als voorbeeld gebruikt voor data dat buiten de functie bestaat. Een functie kan die data anders niet lezen (tenzij je global variables gebruikt, dit is buiten het bereik van de theorie).</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Schrijf zelf een if statement</li>
				<li>Pas de if statement aan en voeg er else-if aan toe.</li>
				<li>Schrijf zelf een for loop.</li>
				<li>Schrijf zelf een while loop.</li>
				<li>Maak een kort programma met minimaal één functie.</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
