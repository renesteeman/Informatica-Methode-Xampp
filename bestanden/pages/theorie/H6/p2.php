<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H6 §2 Github
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
			<p>
				Git is een handige tool voor versiebeheer van code. Het is het makkelijkst te gebruiken met github in combinatie met een GUI (graphical user interface). Je kunt via dit systeem bestanden opslaan en ook terug gaan naar hoe bestanden in het verleden uitzagen (of hoe verwijderde bestanden eruit zagen). Zo raak je nooit meer iets kwijt en kunnen anderen makkelijk de bestanden vinden en samenwerken. Een voorbeeld van een github pagina is <a href="https://github.com/renesteeman/Informatica-Methode-Xampp">https://github.com/renesteeman/Informatica-Methode-Xampp</a>, dit is de pagina dat voor het maken van deze methode is gebruikt. In de bonusparagrafen is weer te vinden hoe dit geïnstalleerd kan worden. Als het geïnstalleerd is kun je nu verder gaan.
			</p>
			<p>
				<ol>
					<li>
						Ga naar jouw  github pagina
					</li>
					<li>
						Klik op Repositories (bovenaan)
					</li>
					<li>
						Klik op New
					</li>
					<li>
						Vul de gegevens voor jouw repo in
					</li>
					<li>
						Klik op create
					</li>
					<li>
						Ga naar sourcetree
					</li>
					<li>
						Klik op Remote
					</li>
					<li>
						Klik op add ccount
					</li>
					<li>
						Kies GitHub als hosting service
					</li>
					<li>
						Kies basic authentication
					</li>
					<li>
						Vul jouw Github username in
					</li>
					<li>
						Klik op refresh password en vul jouw Github wachtwoord in
					</li>
					<li>
						Klik op oke
					</li>
					<li>
						Selecteer het aangemaakte project (dat je via GitHub hebt aangemaakt)
					</li>
					<li>
						Klik op Clone
					</li>
					<li>
						Voer een locatie in en Clone (deze folder moet leeg zijn)
					</li>
					<li>
						Vul nu de details in voor jouw commits (de ‘updates’ voor het project). Op het moment waarop deze handleiding is geschreven was er een bug waardoor je na de foutmelding ‘Wrong email format’ nog eens op ok moest klikken (zonder iets te hoeven wijzigen).
					</li>
					<li>
						Maak een bestand aan in de geselecteerde folder (het maakt niet uit wat voor een bestand).
					</li>
					<li>
						Ga terug naar het project in sourcetree en klik op ‘Stage All’ (terwijl je in het File Status tab zit). Dit zet het bestand klaar om als update bij het project te komen.
					</li>
					<li>
						Maak een beschrijving voor jouw commit (de update), dit kun je invoeren in het tekstveld onderaan.
					</li>
					<li>
						Klik op commit
					</li>
					<li>
						De update staat nu klaar voor het project en is lokaal opgeslagen. De update staat dus op dit apparaat.
					</li>
					<li>
						Om de update live te zetten op github.com moet je op Push klikken, dit staat in de balk bovenaan.
					</li>
					<li>
						Klik op de checkbox onder ‘Push?’
					</li>
					<li>
						Klik op Push
					</li>
					<li>
						Log in met GitHub
					</li>
					<li>
						De nieuwe versie van het project staat nu online!
					</li>
				</ol>
			</p>
			<p>
				Je kunt via het tabblad Log/History (onderaan) de geschiedenis van het project zien per commit (update). Om weer een Push uit te voeren moet je dan terug gaan naar het tabblad File Status. Om de handeling voor te pushen over te slaan kun je ook bij de commit op ‘Push changes immediately to x’ aanvinken (x is standaard origin/master). De commit wordt dan automatisch gepushed.
			</p>
			<p>
				Als het project wordt bijgewerkt door iemand anders of via een andere manier moet je voor de push een pull uitvoeren. Dit haalt de nieuwe eerst op (zorg dus ervoor dat je een kopie maakt van jouw aanpassingen zodat ze niet verloren gaan).
			</p>
			<p>
				Als je met een groep het project deelt is het handig om via de github pagina van het project de groepsleider collaborators (‘leden’) toe te laten voegen. Dit kan door naar settings te gaan en dan collaborators. Hier kun je een collaborator toevoegen (deze moet eerst een account hebben). Deze persoon ontvangt dan een mail waarmee hij toegang krijgt tot het project.
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
					Maak zelf een github project aan en zet er een bestand in.
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
