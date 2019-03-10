<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H5 §5 CSS deel 2
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
			<p>
				In CSS wordt gebruik gemaakt van het box model. Dit geeft aan hoe bepaalde toevoegingen invloed hebben op het element. Je kunt het voorstellen als een doos met daarin vier lagen. Laag 1 is de inhoud, bijvoorbeeld tekst. Laag 2 is padding, dit is een opvulling om de inhoud heen, maar hoort nog bij het element. Laag 3 is de border, oftewel de rand die eromheen zit. Laag 4 is margin, oftewel de afstand tot andere elementen.
			</p>
			<p>
				Stel je voegt een achtergrond kleur toe, dan wordt die kleur gebruikt voor het element, dus inclusief padding, maar exclusief de margin.
			</p>
			<p>
				Padding is dus een soort opvulling, in CSS gebruik je dit als padding of padding-kant. Padding voegt het aan alle kanten toe en padding-kant voegt het aan een kant toe. Een voorbeeld is padding-left: 10%; Dit zal links (van de inhoud) het element 10% groter maken.
			</p>
			<p>
				Border is een rand om het element. Een element met een rand die blauw is, 10 px dik en waarvan de rand solide is kan als CSS border: 10px solid blue; hebben. Voor alle mogelijkheden kun je kijken op <a href="https://www.w3schools.com/css/css_border.asp">https://www.w3schools.com/css/css_border.asp</a>
			</p>
			<p>
				Je kunt ook de opmaak veranderen door ergens overheen te gaan. Dit kan door gebruik te maken van :hover. Een voorbeeld is:
			</p>
			<p>
<pre><code>
#div1:hover
	Background-color: yellow
	Width: 400px
</code></pre>
			</p>
			<p>
				Als je nu met de muis erover gaat wordt de achtergrond geel en wordt het breder.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">

			<ol>
				<li>
					Ga verder met de HTML van de vorige paragraaf. Laat de <div> nu van kleur veranderen als je erover gaat met de cursor. Voeg aan de pagina een ‘tegel’ toe zoals op de hoofdpagina van de theorie (de groene blokken), de kleur, tekstgrote, afronding en andere eigenschappen mag je zelf bedenken.
				</li>
			</ol>

		</div>

	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
