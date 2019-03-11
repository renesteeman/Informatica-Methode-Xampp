<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B3 §5 JS advanced
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

		</div>
	</div>

	<div class="theorie">
		<div class="bar-s">
			<h3>
				Theorie
			</h3>
		</div>

		<div class="theorie-content">

			<p>In deze paragraaf ga je leren wat events zijn, een stukje geschiedenis van JS en wat frameworks zijn.</p>

			<p>Als je wilt controleren of een bepaalde actie uitgevoerd wordt kunnen events erg van pas komen. Een paar veel gebruikte events zijn: onchange, onclick, onmouseover, onmouseout, onkeydown en onload. Dit zijn allemaal acties die kunnen voorkomen bij elementen. Als zo’n actie plaatsvindt wordt dit als ‘trigger’ gebruikt voor het uitvoeren van code. Je kunt bijvoorbeeld andere informatie geven als iemand op een knop klikt.</p>

			<div class="table-wrapper">
				<table>

					<tr>
						<th>Event</th>
						<th>Beschrijving</th>
					</tr>
					<tr>
						<td>Onchange</td>
						<td>Het element is aangepast</td>
					</tr>
					<tr>
						<td>Onclick</td>
						<td>Het element is aangeklikt</td>
					</tr>
					<tr>
						<td>Onmouseover</td>
						<td>De cursor is over het element gegaan</td>
					</tr>
					<tr>
						<td>Onmouseout</td>
						<td>De cursor is van het element af gegaan</td>
					</tr>
					<tr>
						<td>Onkeydown</td>
						<td>Een knop is ingeklikt (fysiek)</td>
					</tr>
					<tr>
						<td>Onload</td>
						<td>Het element is geladen</td>
					</tr>

				</table>
			</div>

			<p>Deze events kun je koppelen aan een element. Zo kun je een actie in de browser koppelen aan een stuk JS code. Om deze events ‘op te vangen’ kun je een event listener gebruiken, dit is een stuk code dat controleert wat er met het element gebeurt. Een voorbeeld is:</p>

			<p>HTML</p>

			<pre><code>&lt;html>
  &lt;head>
    &lt;!-- stel karakterset in en verwijder waarschuwing -->
    &lt;meta charset="UTF-8" />
  &lt;/head>
  &lt;body>
    &lt;header>

    &lt;/header>

    &lt;div id='parent'>
      &lt;p id='element'>
        Klik hier!
      &lt;/p>
    &lt;/div>

    &lt;footer>

    &lt;/footer>

    &lt;script src="js.js">&lt;/script>
  &lt;/body>
&lt;/html></code></pre>

			<p>JS</p>

			<pre><code>function veranderInhoud(element){
  console.log(element);
  element.textContent = "Het event heeft plaatsgevonden.";
  alert('triggered');
}

document.getElementById('element').addEventListener("click", function(){
  veranderInhoud(this);
})
</code></pre>

			<p>Als de &lt;p> met id ‘element’ aangeklikt wordt zal de tekst ervan veranderen. De event listener wordt dus toegevoegd aan het element en voert een functie uit als het event plaatsvindt.</p>

			<p>JS kent verschillende versies en deze werken niet allemaal op elke browser. Als je nieuwe mogelijkheden wilt gebruiken moet je hier dus op letten. JS, ook ECMAScript genoemd kwam uit in 1997 en heeft meerdere updates gehad. De latere versies voegen vooral handige functies toe om het leven van een programmeur te verfijnen.</p>

			<div class="table-wrapper tSL">
				<table>
					<tr>
						<th>Versie</th>
						<th>Belangrijke veranderingen</th>
					</tr>
					<tr>
						<td>ES5</td>
						<td>Betere ondersteuning voor JSON (een bepaalde notatiewijze) en handige functies voor het werken met variabelen.</td>
					</tr>
					<tr>
						<td>ES6</td>
						<td>Meer verbeteringen voor het omgaan met variabelen in specifieke manieren. Betere omgang met arrays. Extra notatiewijze voor functies.</td>
					</tr>
				</table>
			</div>

			<p>Op dit moment (2018) worden versies na ES6 nog nauwelijks ondersteund. De recentere updates hebben vooral verbeteringen voor performance.</p>

			<p>JS kent ook nog uitbereidingen/aanpassingen oftewel frameworks en libraries. Dit zijn systemen die gemaakt zijn met JS om het schrijven van JS makkelijker te maken. Ze voegen vaak functies toe en zorgen voor minder schrijfwerk. Het verschil tussen een framework en library is dat een framework een ‘skelet’ vormt voor jouw applicatie, terwijl een library een verzameling is van afkortingen.</p>

			<p>Bekende frameworks zijn: Angular en Vue. Bekende libraries zijn: jQuery en React.</p>

			<p>Het is makkelijker om een library te leren dan het is om een framework te leren. Frameworks hebben meer eigen conventies en restricties. Een library is meer een andere manier om hetzelfde te schrijven, terwijl een framework meer een schrijfstijl is.</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Maak zelf een JS event.</li>
				<li>Zijn nieuwe versies van JS al goed ondersteund?</li>
				<li>Beschrijf het verschil tussen een library en framework in jouw eigen woorden.</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>Eigen antwoord</li>
				<li>Nee, dit duurt een aantal jaar en sommige browsers zullen nauwelijks bijwerken.</li>
				<li>Een mogelijk antwoord is: “Een framework is een schrijfwijze en een library is een verzameling afkortingen.”.</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
