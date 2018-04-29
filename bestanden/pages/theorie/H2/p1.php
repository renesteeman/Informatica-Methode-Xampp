<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H2 §1 introductie tot logica
		</h2>
	</div>

	<div class="bar-par-overview">
		<div class="paragraph-tiles">
			<div class="ptile active">
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
				Logica is het combineren van feiten om nieuwe feiten op te kunnen stellen. Een bekend voorbeeld is de uitspraak:
				"Alle mensen zijn stervelingen.
				Socrates is een mens.
				Dus Socrates is een sterveling."
			</p>

			<p>
				2 feiten vormen hier dus het 3e feit. Logica is een vorm van wiskunde die vrij abstract lijkt. Het heeft zijn eigen notaties en betekenissen. </br>
				Er wordt veel gebruik gemaakt van sets. Dit zijn eigenlijk groepen objecten of getallen, bijvoorbeeld katten, honden of priemgetallen. Een van de andere regels bij logica is dat het ‘+-teken’ union (samenvoeging) betekent. Dit wordt gebruikt bij de sets, je kunt met het +-teken dus sets samenvoegen. X (maal) betekent intersection (overlap). Dit kan ook voor sets gebruikt worden. Verder betekent 1 alles, zoals in een set met auto’s, hier betekent 1 alle auto’s. Een andere notatie voor + is ꓵ en voor maal is ∪.
			</p>

			<p>
				Voorbeelden:
				<p>
					Stel set 1 bestaat uit katten. We delen set 1 in op basis van kleur: wit, grijs en bruin. We korten deze kleuren af met W, G en B. Je kunt nu zeggen dat bij set 1 W+G+B=1, want alle katten van deze set vallen onder die drie kleuren. Zo is W+G=1-B, alle katten met uitzondering van de bruine zijn wit of grijs. Er komen nu 0 rode (R) katten bij, nu is R=0, want geen enkele kat is rood.
				</p>

				<p>
					Stel we hebben nu 5 witte, 2 grijze, 6 bruine en 0 rode katten. W+G of W ∪ G bevat dus 7 katten (5+2). Van de 5 witte katten zijn 3 man (M) en 2 vrouw (V). M x W of M ꓵ W bevat dus 3 katten, want 3 witte katten zijn man.
				</p>

			</p>


		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">

			<ol class="MLquestion">
				<li>
					Stel er zijn 4 intel computers (I), 3 AMD computers (A) en 2 gemengde computers (M). Hoeveel computers zijn er in de volgende gevallen?

					<ol>
						<li>A + I</li>
						<li>M &cap; A</li>
						<li>A &cup; I</li>
						<li>1</li>
					</ol>
				</li>
			</ol>

		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">

			<ol>
				<li>
					7 (= 4+3)
				</li>
				<li>
					5 (= 3+2)
				</li>
				<li>
					0, geen AMD computer is hier ook een Intel computer
				</li>
				<li>
					9 (= 4+3+2)
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
