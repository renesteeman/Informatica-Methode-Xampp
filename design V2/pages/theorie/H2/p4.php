<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H2 §4 logica en programmeren
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
				Het opdelen van een probleem is erg belangrijk. Voornamelijk bij logisch nadenken en dus ook programmeren. Als je een project gaat uitvoeren moet je een groot probleem in delen kunnen hakken om te zorgen voor overzicht, zodat je weet waar je moet beginnen.
			</p>
			<p>
				Stel je wilt een website gaan maken (meer hierover in H5), dan moet je eerst bedenken waarover het moet gaan, hoe het gaat het heten, hoe de structuur ervan uit moet zien, hoe het vorm gegeven moet worden, enz. Daarna kun je bijvoorbeeld de logica van de site in stukken delen, bijvoorbeeld in de talen php en javascript. Dan ga je logica indelen bij deze talen, bijvoorbeeld mails sturen via php. Dan maak je een bestaand aan, bijvoorbeeld sendMail.php en stel je hierin de logica van het programma op, eerst in het Engels of Nederlands en later in de programmeertaal, dus php.
			</p>
			<p>
				De logica kan bijvoorbeeld zijn: als de gebruiker in het systeem staat voor de mail lijst en er is een nieuwe mail om te sturen, dan stuur mail naar de gebruiker. Je hakt het probleem, de mail sturen dus in kleine stukjes. Vervolgens kun je die stukjes weer gaan uitwerken.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">

			<ol>
				<li>
					Noem minimaal vijf mogelijke stappen die je volgt als je een auto wilt kopen.
				</li>
				<li>
					Je wilt een mail sturen naar klasgenoten waarvan de naam niet begint met een r, jonger zijn dan 18, ouder dan 16 en graag naar de bioscoop gaan en actiefilms leuk vinden. Noem de stappen die je kunt volgen om een mail te sturen naar deze klasgenoten, noteer minimaal 5 stappen.
				</li>
			</ol>

		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">

			<ol class="MLquestionAlt">
				<li>
					Juiste mogelijke stappen (er is meer mogelijk):
					<ol>
						<li>Kiezen tussen de verschillende soorten aandrijvingen; elektrisch, gas, benzine, diesel of op waterstof?</li>
						<li>Kiezen hoe snel het moet zijn</li>
						<li>Het budget bepalen</li>
						<li>Een kleur kiezen</li>
						<li>Bezoeken dealer</li>
						<li>Testrit maken</li>
						<li>Opties bekijken</li>
						<li>Betalen</li>
					</ol>
				</li>
				<li>
					Juiste mogelijke stappen (er is meer mogelijk):
					<ol>
						<li>Schrijf alle namen op van klasgenoten</li>
						<li>Streep de namen door van mensen waarvan de naam met r begint</li>
						<li>Je noteert van de overige mensen de leeftijd</li>
						<li>Je kijkt of de leeftijd van de klasgenoten tussen de 16 en 18 jaar ligt</li>
						<li>Je vraagt aan deze mensen of ze graag naar de bioscoop gaan</li>
						<li>De mensen die nee antwoorden streep je op de lijst door</li>
						<li>Je vraagt aan de mensen die over zijn of ze actiefilms leuk vinden</li>
						<li>Je vraagt aan de mensen die nog over zijn wat hun e-mailadres is</li>
						<li>Je stelt een mail op</li>
						<li>Je vult de adressen in van de overgebleven personen in</li>
						<li>Je stuurt de mail</li>
					</ol>
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
