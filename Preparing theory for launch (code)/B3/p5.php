<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2> 
			B3 §5 
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
        
			<p>In deze paragraaf ga je leren wat events zijn, een stukje geschiedenis van JS en wat frameworks zijn.</p>

			<p>Als je wilt controleren of een bepaalde actie uitgevoerd wordt kunnen events erg van pas komen. Een paar veel gebruikte events zijn: onchange, onclick, onmouseover, onmouseout, onkeydown en onload. Dit zijn allemaal acties die kunnen voorkomen bij elementen. Als zo’n actie plaatsvindt wordt dit als ‘trigger’ gebruikt voor het uitvoeren van code. Je kunt bijvoorbeeld andere informatie geven als iemand op een knop klikt.</p>

			<p>Event</p>

			<p>Beschrijving</p>

			<p>Onchange</p>

			<p>Het element is aangepast</p>

			<p>Onclick</p>

			<p>Het element is aangeklikt</p>

			<p>Onmouseover</p>

			<p>De cursor is over het element gegaan</p>

			<p>Onmouseout</p>

			<p>De cursor is van het element af gegaan</p>

			<p>Onkeydown</p>

			<p>Een knop is ingeklikt (fysiek)</p>

			<p>Onload</p>

			<p>Het element is geladen</p>

			<p>Deze events kun je koppelen aan een element. Zo kun je een actie in de browser koppelen aan een stuk JS code. Om deze events ‘op te vangen’ kun je een event listener gebruiken, dit is een stuk code dat controleert wat er met het element gebeurt. Een voorbeeld is:</p>

			<p>HTML</p>

			<p>#CODE</p>

			<p><html></p>

			<p><head></p>

			<p><!-- stel karakterset in en verwijder waarschuwing --></p>

			<p><meta charset="UTF-8" /></p>

			<p></head></p>

			<p><body></p>

			<p><header></p>

			<p></header></p>

			<p><div id='parent'></p>

			<p><p id='element'></p>

			<p>Klik hier!</p>

			<p></p></p>

			<p></div></p>

			<p><footer></p>

			<p></footer></p>

			<p><script src="js.js"></script></p>

			<p></body></p>

			<p></html></p>

			<p>JS</p>

			<p>#CODE</p>

			<p>function veranderInhoud(element){</p>

			<p>console.log(element);</p>

			<p>element.textContent = "Het event heeft plaatsgevonden.";</p>

			<p>alert('triggered');</p>

			<p>}</p>

			<p>document.getElementById('element').addEventListener("click", function(){</p>

			<p>veranderInhoud(this);</p>

			<p>})</p>

			<p>Als de <p> met id ‘element’ aangeklikt wordt zal de tekst ervan veranderen. De event listener wordt dus toegevoegd aan het element en voert een functie uit als het event plaatsvindt.</p>

			<p>JS kent verschillende versies en deze werken niet allemaal op elke browser. Als je nieuwe mogelijkheden wilt gebruiken moet je hier dus op letten. JS, ook ECMAScript genoemd kwam uit in 1997 en heeft meerdere updates gehad. De latere versies voegen vooral handige functies toe om het leven van een programmeur te verfijnen.</p>

			<p>Versie</p>

			<p>Belangrijke veranderingen</p>

			<p>ES5</p>

			<p>Betere ondersteuning voor JSON en handige functies voor het werken met variabelen.</p>

			<p>ES6</p>

			<p>Meer verbeteringen voor het omgaan met variabelen in specifieke manieren. Betere omgang met arrays. Extra notatiewijze voor functies.</p>

			<p>Op dit moment (2018) worden versies na ES6 nog nauwelijks ondersteund. De recentere updates hebben vooral verbeteringen voor performance.</p>

			<p>JS kent ook nog uitbereidingen/aanpassingen oftewel frameworks en libraries. Dit zijn systemen die gemaakt zijn met JS om het schrijven van JS makkelijker te maken. Ze voegen vaak functies toe en zorgen voor minder schrijfwerk. Het verschil tussen een framework en library is dat een framework een ‘skelet’ vormt voor jouw applicatie, terwijl een library een verzameling is van afkortingen.</p>

			<p>Bekende frameworks zijn: Angular en Vue. Bekende libraries zijn: jQuery en React.</p>

			<p>Het is makkelijker om een library te leren dan het is om een framework te leren. Frameworks hebben meer eigen conventies en restricties. Een library is meer een andere manier om hetzelfde te schrijven, terwijl een framework meer een schrijfstijl is.</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Maak zelf een JS event.

Zijn nieuwe versies van JS al goed ondersteund?

Beschrijf het verschil tussen een library en framework in jouw eigen woorden.</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>Eigen antwoord

Nee, dit duurt een aantal jaar en sommige browsers zullen nauwelijks bijwerken.

Een mogelijk antwoord is: “Een framework is een schrijfwijze en een library is een verzameling afkortingen.”.</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>