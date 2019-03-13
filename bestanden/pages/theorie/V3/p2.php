<?php
include('../../../components/headerChapter.php');
?>

<body>

  <div class="title-small">
    <h2>
      V3 §2 Een database aanmaken
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

	<p>Je kunt waardes opvragen, aanpassen en toevoegen met SQL (Structured Query Language). SQL is een taal die erg lijkt op het Engels en waarmee je opdrachten kunt aanmaken om met de database te communiceren. Om hiermee te oefenen kun je gebruik maken van het programma XAMPP. Hoe je dit installeert kun je terugvinden bij de extra bestanden bij dit hoofdstuk. XAMPP is een programma dat je kunt gebruiken om te doen alsof een computer een server is. Zo kun je gebruikmaken van bepaalde talen en mogelijkheden. We gaan nu met XAMPP een eerste database aanmaken.
  </p>

	<p>Ga nu naar de browser en dan naar <a href="http://localhost/phpmyadmin/">http://localhost/phpmyadmin/</a> . Je krijgt hier een overzicht van een databasebeheer systeem. Om een database aan te maken klik je linksboven op “New”.</p>
  <img src="./afbeeldingen/CreateDatabase.png" />

	<p>Dan vul je een naam in, collation kun je voor nu negeren. Het geeft aan met welke karakterset je wilt werken, oftewel hoe je tekens (tekst) wilt opslaan. Klik dan op “Create”. Je hebt nu een eigen database gemaakt!</p>

	<p>Het heeft alleen nog geen inhoud, maar daar gaan we verandering in brengen. Klik links op de door jouw aangemaakte database.</p>
  <img src="./afbeeldingen/FillinDB.png" />

	<p>Om een tabel toe te voegen vul je een naam in en dan het aantal kolommen, dit zijn het aantal vakken dat per rij beschikbaar zal zijn. Een vak kan dan bijvoorbeeld “gebruikersnaam” of “wachtwoord” zijn. Als naam van de tabel kun je bijvoorbeeld ‘gebruikers’ kiezen. Klik vervolgens op “Go” om de database aan te maken.</p>

	<p>Als het goed is krijg je nu het volgende te zien:</p>
  <img src="./afbeeldingen/FillinOverview.png" />


	<p>'Name' geeft aan hoe je de kolom wilt noemen.</p>

	<p>'Type' geeft aan welke soort data in die kolom komt te staan. De belangrijkste opties zijn:</p>


  <div class="table-wrapper">
		<table>

			<tr>
				<td>INT</td>
				<td>Een geheel getal</td>
			</tr>
			<tr>
				<td>TEXT</td>
				<td>Een reeks karakters (of een enkel karakter)</td>
			</tr>
			<tr>
				<td>DATE</td>
				<td>Een datum</td>
			</tr>

		</table>
	</div>

	<p>Bij 'Length/Values' kun je invullen welke waardes je wilt accepteren en hoelang een stuk tekst mag zijn (in aantal karakters).</p>

	<p>'Null' geeft aan of de waarde leeg mag zijn of dat het verplicht is.</p>

	<p>'A_I' staat voor auto increment, dit zorgt ervoor dat het getal automatisch 1 groter wordt voor elke nieuwe rij. Het is erg handig voor een primaire sleutel.</p>

	<p>De andere opties zijn minder belangrijk en zullen we nu ook niet doorlopen.</p>

	<p>Je mag nu zelf een database bedenken of het voorbeeld blijven volgen.</p>

	<p>We willen eerst een primaire sleutel, deze gaan we “id” noemen. Het wordt een INT met A_I ingeschakeld. Als index kiezen we dus PRIMARY.</p>

	<p>Dan willen we vervolgens een gebruikersnaam, dit is een stuk tekst. Een gebruikersnaam van 20 karakters lang zou lang genoeg moeten zijn voor dit voorbeeld, dus Length = 20. Als je speciale tekens wilt opslaan, zoals een é, dan kun je onder Collation gebruikmaken van bijvoorbeeld utf8_bin. Deze optie zorgt ervoor dat een é niet opeens iets anders wordt als je het invoert in de database.</p>

	<p>Nu komt het wachtwoord, dit is weer tekst en kun je zelf proberen in te vullen. In een goede database zet je wachtwoorden niet als standaard tekst erin, maar in dit voorbeeld gaan we dat wel doen omdat het anders te complex wordt. Normaal zou je hiervoor encryptie gebruiken, dan is het wachtwoord namelijk niet direct af te lezen uit een (gehackte) database.</p>

	<p>Als laatste zetten we er email-adres bij, dit is weer tekst en mag in dit voorbeeld leeg blijven. We zetten “Null” dus aan.</p>

	<p>Het ziet er nu als volgt uit:</p>
  <img src="./afbeeldingen/FillinDBFilled.png" />

	<p>De andere opties zijn nu niet van belang, dus we klikken op “Save” om het aanmaken definitief te maken.</p>

	<p>We hebben nu een database met een structuur, maar er staat nog niks in. Hier gaan we in de volgende paragraaf aan werken.</p>

  <p>
    Je kunt ook een voorbeeld database downloaden via <a href="../../../downloads/inforcaV12.sql" download>deze link</a>. Als je dan een nieuwe lege database hebt aangemaakt kun je naar het tabblad 'Importeren' gaan, dan naar "Bladeren...", het bestand selecteren en "Starten". Je hebt nu de (publieke) versie van de Inforca database en kunt deze gebruiken om mee te oefenen.
  </p>

	</div>

  <div class="bar-s">
      <h3>
          Opdrachten
      </h3>
  </div>

  <div class="theorie-content">
      <ol>
				<li>Maak zelf een database met minimaal 4 kolommen, het liefst niet gelijk aan het voorbeeld.</li>
			</ol>
  	</div>
  </div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
