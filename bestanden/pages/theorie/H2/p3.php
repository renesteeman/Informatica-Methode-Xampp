<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H2 §3 binair?
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
				Een andere manier om logica te gebruiken is met booleans, oftewel ja of nee, true or false, 1 of 0.
				Stel ik wil een witte kat met korte staart of een mannetjes kat v (v = of) een groene kat. Oftewel W(it)*K(ort)+M(an)+G(roen). Maal kan hier als ‘en’ gezien worden en ‘+’ als of. Stel ik vind een bruine mannetjes kat, dan kan ik dat weergeven als: 0*0+1+0=1, dus het voldoet. NB (nota bene/let op) 1+1=1, want true+true=true.
			</p>
			<p>
				Een computer voert deze taken uit met de gates die in H1 besproken zijn.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">

			<ol class="MLquestion">
				<li>
					Je wilt een elektrische auto of een auto op gas of een fiets.
					<ol>
						<li>Geef deze wens weer als expressie met letters.</li>
						<li>Wat is de uitkomst (1 of 0) in de volgende gevallen:
							<ol>
								<li>
									een tesla model 3
								</li>
								<li>
									een monster truck
								</li>
								<li>
									een elektrische motor
								</li>
							</ol>
						</li>
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

			<ol class="MLquestion">
				<li>
					<ol>
						<li>E*A+s*G*A+F</li>
						<li>
							<ol>
								<li>
									1*1+1*0*1+0=1
								</li>
								<li>
									0*1+0*0*1+0=0
								</li>
								<li>
									1*0+1*0*0+0=0
								</li>
							</ol>
						</li>
					</ol>
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
