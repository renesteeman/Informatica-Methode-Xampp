<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H3 Programmeren §2 Installatie
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
			<div class="ptile">
				<span class="ptile-content"><a href="p6.php">
					§6
				</a></span>
			</div>
			<div class="ptile">
				<span class="ptile-content"><a href="p7.php">
					§7
				</a></span>
			</div>
			<div class="ptile">
				<span class="ptile-content"><a href="p8.php">
					§8
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
				Als python en jupyter notebook al geïnstalleerd zijn, dan kun je de eerste 5 stappen overslaan en in plaats daarvan de anaconda navigator openen en daarmee (jupyter) notebook starten.
			</p>
			<p>
				Er zijn veel manieren om python te gebruiken en te installeren. In deze paragraaf wordt één mogelijke optie uitgewerkt.
			</p>
			<ol>
				<li>
					Download anaconda via <a href='https://www.anaconda.com/download/'>https://www.anaconda.com/download/</a>. Click op windows installer python 3.6 en bij de pop-up klik je op 'no thanks'.
				</li>
				<li>
					Volg de stappen van de installer.
				</li>
				<li>
					Start anaconda navigator.
				</li>
				<li>
					Klik op install onder jupyter notebook.
				</li>
				<li>
					Start jupyter notebook.
				</li>
				<li>
					Maak een folder aan (via new -> folder)	NB de standaard folder waar je in begint staat onder C:\Users\USERNAME\
				</li>
				<li>
					Maak een bestand aan in deze folder (of kopieer het bestand van paragraaf 1).
				</li>
				<li>
					Open het bestand.
				</li>
				<li>
					Type in het eerste hokje (achter In[])</br>
					<code>print("Hello world")</code>
				</li>
				<li>
					Gebruik de toetsencombinatie ctrl+enter terwijl het hokje geselecteerd is, dit voert de code in het hokje uit. Als alles juist geïnstalleerd is komt er nu onder het hokje 'Hello world' te staan.
				</li>
			</ol>

			<p>
				Gefeliciteerd, je hebt jouw eerste regel python code uitgevoerd!
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
					Waar wordt code naar omgezet voordat het wordt uitgevoerd?
				</li>
				<li>
					Wat is het verschil tussen een hoge- en lage programmertaal?
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
					machinetaal
				</li>
				<li>
					Een lage programmeertaal is meer gedetailleerd en vaak efficiënter. Een hoge programmeertaal is makkelijker om code mee te schrijven en de taal zelf zorgt voor de details.
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
