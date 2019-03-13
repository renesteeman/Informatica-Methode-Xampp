<?php
include('../../../components/headerChapter.php');
?>

<body>

  <div class="title-small">
    <h2>
      V3 §3 Communiceren met een database
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

  		<p>Zoals al eerder gezegd, gebruik je SQL om met de database te communiceren. Het is een vrij eenvoudige taal, dus we gaan er snel doorheen. Als je meer details wilt kun je bijvoorbeeld terecht op <a href="https://www.w3schools.com/sql/">https://www.w3schools.com/sql/</a>, maar ook bij de volgende paragraaf.</p>

  		<p>Laten we beginnen! We willen eerst iets in onze database zetten. Hiervoor gebruik je INSERT INTO tabel (veld1, veld2, veld3) VALUES (waarde1, waarde2, waarde3). Stel dat we in onze database iemand willen zetten met als gebruikersnaam “gebruiker” en als wachtwoord “wachtwoord” en geen email. We gebruiken dan INSERT INTO gebruikers (gebruikersnaam, wachtwoord) VALUES ('gebruiker', 'wachtwoord'). Je kunt dit uitvoeren door in phpMyAdmin naar jouw database te gaan en dan te klikken op SQL</p>
      <img src="./afbeeldingen/ExecuteSQL.png" />

  		<p>en dan de query (de SQL opdracht) in te voeren.</p>

  		<p>Als je dan op “Go” klikt wordt er een rij aan jouw database toegevoegd. De code zet dus in de gebruikers tabel een rij met voor gebruikersnaam de waarde “gebruiker” en als wachtwoord de waarde “wachtwoord”. Er staan enkele aanhalingstekens om de waardes in SQL omdat het tekst is.</p>

  		<p>Het resultaat van de opdracht is te zien onder “Browse”.</p>
      <img src="./afbeeldingen/QueryResult.png" />

  		<p>Zo kunnen we nog een aantal rijen aanmaken, ga verder als je er 4 bij hebt gemaakt.</p>

  		<p>Er staan nu 5 rijen in onze database, laten we daar gebruik van maken. We gaan nu één van die rijen aanpassen, dit kun je doen door in SQL gebruik te maken van: UPDATE tabel SET kolom = waarde WHERE voorwaarde. Stel je wilt het email-adres van iemand met als gebruikersnaam “gebruiker” veranderen in test@test.test, dan kun je dat doen met de volgende code: UPDATE gebruikers SET email = 'test@test.test' WHERE gebruikersnaam = 'gebruiker'. Dit update het veld “email” naar de waarde test@test.test waar de gebruikersnaam gelijk is aan “gebruiker”.</p>

  		<p>Stel je wilt nu iemand terugvinden in jouw database, dan kun je hiervoor gebruikmaken van SELECT kolom FROM tabel WHERE voorwaarde. De kolom die na SELECT komt is dus het ‘antwoord’ dat je krijgt, het kunnen ook meerdere kolommen zijn. Als je alles van een rij wilt terugkrijgen kun je ook * invullen, dat staat voor ‘alles’. Als je iemand zoekt met als id de waarde 5 en je alles van die persoon wilt zien, dan gebruik je dus SELECT * FROM gebruikers WHERE id = 5. 5 is hier geen tekst, maar een getal, er hoeven dus geen aanhalingstekens omheen. Je kunt het * ook uitspreken als all of alles.</p>

  		<p>Om deze paragraaf af te sluiten gaan we een rij verwijderen. Dit doe je met: DELETE FROM tabel WHERE voorwaarde. Als we de gebruiker met id 5 willen verwijderen doen we dat met DELETE FROM gebruikers WHERE id = 5. Het is trouwens ook mogelijk om de keywords, oftewel de commando’s zoals SELECT, UPDATE en WHERE te schrijven zonder hoofdletters, al maken de hoofdletters duidelijker wat er gebeurt.</p>

      <p>
        Tip: SQL keywords, zoals SELECT en UPDATE zijn niet hoofdletter gevoelig.
      </p>

    </div>

    <div class="bar-s">
      <h3>
        Opdrachten
      </h3>
    </div>

    <div class="theorie-content">
      <ol>
				<li>Voeg minimaal 4 rijen toe aan jouw database.</li>
				<li>Gebruik SELECT in combinatie met WHERE in jouw database.</li>
				<li>Verwijder een rij uit jouw database.</li>
    	</ol>
    </div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
