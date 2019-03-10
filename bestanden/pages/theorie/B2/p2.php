<?php
include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			B2 §2 Hoe worden gegevens bijgehouden?
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

		</div>
	</div>

	<div class="theorie">
		<div class="bar-s">
			<h3>
				Theorie
			</h3>
		</div>

		<div class="theorie-content">

			<p>Hoe worden gegevens van jou eigenlijk bijgehouden?</p>

			<p>De meeste gegevens worden opgeslagen in (tabellen van) een database. Het voordeel daarvan is dat de eigenaar van een site altijd bij de gegevens kan en zo veel kan opslaan als gewenst is. Het opslaan op een database is ook erg goedkoop, de meeste informatie is niet meer dan een beetje tekst. Je kunt dus makkelijk gegevens bijhouden van duizenden en misschien wel miljoenen mensen op een schijf van €100. Het ligt er natuurlijk ook aan hoeveel je op wilt slaan en voor hoelang. De gegevens van een database zijn gebruikelijk gekoppeld aan een account.</p>

			<p>Een andere mogelijkheid is het gebruik van cookies. Cookies zijn kleine tekstbestanden die bij de gebruiker van een site opgeslagen worden. De meeste informatie die op een database staat zou ook op een cookie kunnen staan. Een nadeel van het gebruik van cookies is dat de gebruiker ze zelf kan verwijderen en aanpassen. Een cookie is immers gewoon een tekst bestandje dat op een apparaat staat. De inhoud ervan kan dus gemanipuleerd worden. Het voordeel van cookies is dat het per apparaat gegevens opslaat en niet per account. Je hoeft dus niet in te loggen om de gegevens te ‘delen’. Verder heeft een cookie een maximum grote (nu 4093bytes), je kunt er dus niet heel veel in opslaan. Het is wel weer mogelijk om eer meerdere aan te maken.</p>

			<p>Cookies en databases worden ook vaak gecombineerd. Zo combineer je de voordelen van beide systemen. Je kunt bijvoorbeeld een cookie maken die gekoppeld is aan de database, op die manier kun je het apparaat en account herkennen zonder beveiligingsproblemen. De cookie slaat dan bijvoorbeeld het volgende op: de aanmaakdatum, een ID en het IP-adres.</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">
			<ol>
				<li>Maak een overzicht van minimaal 4 kenmerken/eigenschappen van cookies en databases.</li>
			</ol>
		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">
			<ol>
				<li>Een mogelijk antwoord is:
					<div class="table-wrapper">
						<table>
							<tr>
								<th>Eigenschap</th>
								<th>Database</th>
								<th>Cookie</th>
							</tr>
							<tr>
								<td>Opslagcapaciteit</td>
								<td>Groot</td>
								<td>Klein</td>
							</tr>
							<tr>
								<td>Veiligheid</td>
								<td>Goed</td>
								<td>Slecht</td>
							</tr>
							<tr>
								<td>Beschikbaarheid</td>
								<td>Goed</td>
								<td>Slecht</td>
							</tr>
							<tr>
								<td>Manier van herkenning</td>
								<td>Account</td>
								<td>Apparaat</td>
							</tr>
							<tr>
								<td>Opslagstructuur</td>
								<td>Tabellen</td>
								<td>Tekst</td>
							</tr>
							<tr>
								<td>Opslaglocatie</td>
								<td>Server</td>
								<td>Apparaat van gebruiker</td>
							</tr>

						</table>
					</div>
			</ol>
		</div>
	</div>

	<?php
		include('../../../components/footerChapter.php');
	?>

</body>
