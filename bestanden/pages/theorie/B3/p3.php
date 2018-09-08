<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2> 
			B3 §3 
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

			<div class="ptile active">
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
        
			<p>In deze paragraaf ga je meer van de basis van JS leren. JS kan namelijk veel meer dan alleen met de DOM werken, al gaan we dit in deze paragraaf wel verder behandelen.</p>

			<p>Er zijn namelijk nog een paar handige manieren om de DOM te gebruiken in JS. Je kunt namelijk vanaf een element verder door de DOM heen ‘reizen’. Je kunt daarvoor gebruikmaken van parents en children. Parents zijn elementen die ‘hoger’ liggen. Zo kan de parent van een <p> een <body> zijn. Children zijn elementen die ‘lager’ liggen, dus eigenlijk het omgedraaide van parents.</p>

			<p>Stel je wilt de parent van een element met als id ‘getParent’ krijgen. Dit kan met</p>

			<p>#CODE</p>

			<p>document.getElementById(‘getParent’).parentElement</p>

			<p>Een voorbeeld hiervan is:</p>

			<p>HTML</p>

			<p>#CODE</p>

			<p><html></p>

			<p><head></p>

			<p></head></p>

			<p><body></p>

			<p><header></p>

			<p></header></p>

			<p><div></p>

			<p><p id='element'></p>

			<p>Test</p>

			<p></p></p>

			<p></div></p>

			<p><footer></p>

			<p></footer></p>

			<p><script src="js.js"></script></p>

			<p></body></p>

			<p></html></p>

			<p>JS</p>

			<p>x = document.getElementById('element').parentElement;</p>

			<p>x.style.backgroundColor = 'green';</p>

			<p>x.style.width = '500px';</p>

			<p>x.style.height = '500px';</p>

			<p>De JS code zal de <div> met daarin een <p> met als id ‘element’ vierkant maken met een groene kleur.</p>

			<p>Om de children van een element te krijgen gebruik je:</p>

			<p>document.getElementById(‘getParent’).children</p>

			<p>Om het aantal children te krijgen gebruik je #CODE .length Dit werkt hetzelfde voor alle arrays, NAAM.length zal je het aantal elementen terug geven. Variabelen komen later in deze paragraaf nog aan bod.</p>

			<p>Bijvoorbeeld  document.getElementById(‘getParent’).children.length</p>

			<p>Om een bepaald child te krijgen bij meerdere children kun je .children[INDEX] gebruiken en door de children ‘heen bladeren’.</p>

			<p>JS is erg veelzijdig en werkt in veel opzichten hetzelfde als andere programmeertalen zoals Python. Het heeft dus ook variabelen, functies, loops en overige.</p>

			<p>Variabelen in JS bestaan in verschillende soort, zoals: objecten, integers, arrays en strings. Een variabele dat een object opslaat is bijvoorbeeld de ‘x’ in het voorbeeld en verwijst naar een element van de DOM. Integers zijn gehele getallen en werken net zoals in Python, er zijn ook floats oftewel kommagetallen. Arrays zijn eigenlijk de lists die je kent van Python, oftewel variabelen die meerdere waardes kunnen vasthouden. In JS kan een array ook meerdere type variabelen bevatten. Strings bestaan ook en houden tekst vast.</p>

			<p>Om een variabele ergens aan gelijk te stellen gebruik je #CODE var VARIABELE_NAAM = WAARDE; Je kunt ook #CODE VARIABELE_NAAM = WAARDE; gebruiken, maar dit is minder duidelijk.</p>

			<p>Een paar voorbeelden:</p>

			<p>#CODE</p>

			<p>var X = document.getElementById('element').parentElement;</p>

			<p>var INT = 5;</p>

			<p>var FLOAT = 1.2;</p>

			<p>var STRING = “tekst”</p>

			<p>var ARRAY = [“waarde”, 2, X];</p>

			<p>Om een variabele te bekijken kun je gebruik maken van alert() of console.log(), bij console.log() kun je meer soorten data zien en is de data zichtbaar in de console. Je moet dus eerst de developer modus starten om hiermee data te kunnen zien. Bij alert() zie je de data meteen als pop-up.</p>

			<p>Als je de boven beschreven variabelen via console.log() zichtbaar zou maken krijg je:</p>

			<p>Je kunt natuurlijk ook rekenen met de getallen. Dit gaat zoals je gewend bent Python. Voorbeelden zijn:</p>

			<p>#CODE</p>

			<p>A = 5</p>

			<p>B = 10</p>

			<p>C = A+B</p>

			<p>C = A-B</p>

			<p>C = A/B</p>

			<p>C = A*B</p>

			<p>Het is ook mogelijk om tekst ‘op te tellen’ zoals je bij getallen zou doen.</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Hoe krijg je het eerste child van een element met meerdere children?

Hoe krijg je het aantal children van een element?

Kun je in een JS array meerdere type variabelen onderbrengen? 

Kun je tekst bij elkaar ‘optellen’ in JS?</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>.children[0]

.children.length

Ja, zo kan er bijvoorbeeld een int, string en element in dezelfde array voorkomen.

Ja</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>