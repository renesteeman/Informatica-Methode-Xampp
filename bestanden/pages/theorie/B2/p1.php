<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B2 §1 JS introductie
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

			<p>In dit hoofdstuk ga je leren hoe je logica kunt toevoegen aan jouw website. In plaats van een site waar je alleen dingen kunt bekijken, kun je er nu ook interactie mee hebben. In dit deel van web logic gaan we voornamelijk in op JS (javascript).</p>

			<p>JS is een programmeertaal die voor veel dingen gebruikt kan worden, ook voor applicaties anders dan websites. Het is een hoge taal en niet al te ingewikkeld, terwijl het wel veel mogelijkheden biedt. De code die je in JS zal gaan schrijven voor dit hoofdstuk wordt door de browser uitgevoerd. Het is daarom ook belangrijk om een browser te gebruiken die zo goed mogelijk ondersteuning biedt voor JS. Firefox en Chrome zijn hier beide goede keuzes voor, IE (internet Explorer) kan beter vermeden worden. Je zult JS voornamelijk gebruiken om de website interactieve elementen te geven en eventueel data door te sturen naar andere systemen.</p>

			<p>Er zijn naast JS nog veel andere talen die je kunt gebruiken voor websites. JS is wel een van de meest gebruikte en wordt als een van de standaarden van het internet gezien. PHP is ook een belangrijke taal voor websites en kun je leren in web logic+. PHP wordt gebruikt om logica uit te voeren op een server en is een erg krachtige, maar soms lastige taal.</p>

			<p>Talen die worden uitgevoerd aan de kant van de gebruiker heten ‘client-side’. Een voorbeeld hiervan is JS, aangezien de browser aan de kant van de gebruiker wordt gebruikt. Talen die aan de kant van de server worden gebruikt heten ‘server-side’. Een voorbeeld hiervan is PHP. Het voordeel van een client-side taal is dat het weinig rekenkracht vereist van een centrale server. Het voordeel van een server-side taal is dat het vaak sneller uitgevoerd wordt (de snelheid van het apparaat van de gebruiker is niet erg belangrijk) en het is vaak krachtiger.</p>

			<p>NB: JS kan ook server-side gebruikt worden, maar dat is niet standard.</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Waardoor wordt JS code uitgevoerd?</li>
				<li>Wat is een voordeel van een server-side taal?</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>De browser</li>
				<li>Het wordt sneller uitgevoerd. / Het is krachtiger.</li>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
