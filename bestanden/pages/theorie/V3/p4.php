<?php
include('../../../components/headerChapter.php');
?>

<body>

  <div class="title-small">
    <h2>
      V3 §4 Verder met SQL
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

  		<p>SQL heeft nog veel meer mogelijkheden en we gaan er dan ook nog een paar van doornemen.</p>

      <p>
        Het is mogelijk om data uit meerdere tabellen te combineren in een SQL 'commando'. Je gebruikt dan tabel.kolom in plaats van alleen de naam van de kolom. Als je de voorbeeld database van paragraaf 2 hebt ingesteld kun je nu het commando "SELECT users.naam, quiz.cijfer FROM users, quiz WHERE quiz.userid = users.id" gebruiken om als resulaat de namen van 'personen' te krijgen met het punt dat ze voor een quiz hebben gehaald. De naam komt uit de tabel 'users' en het cijfer uit de tabel 'quiz'.
      </p>

  		<p>Nu volgen nog een paar handige SQL commando's. Als eerste het ordenen met SQL, dit kun je doen met ORDER BY data. Er zijn dan twee opties, ASC en DESC, bij ASC lopen de waardes omhoog van boven naar onder en bij DESC gaan ze andersom. Het wordt gebruikt in combinatie met SELECT en gebruikt ASC als standaard. Stel we willen de gebruikers ordenen op hun gebruikersnaam op alfabetische volgorde, we gebruiken dan SELECT gebruikersnaam FROM  gebruikers ORDER BY gebruikersnaam ASC. Je kunt ASC ook weglaten, aangezien het de standaard is.</p>

  		<p>Je kunt ook 'zoeken' met SQL, hiervoor gebruik je LIKE patroon. Je kunt hiermee bijvoorbeeld zoeken naar mensen met een bepaalde naam. Een patroon zou dan R_N% kunnen zijn, een _ betekent dat daar elk karakter mag staan en % betekent dat er meerdere karakters mogen staan of zelfs geen. Je gebruikt LIKE in combinatie met WHERE en een opdracht naar keuze (zoals SELECT, UPDATE of DELETE). Een voorbeeld is: SELECT gebruikersnaam FROM gebruikers WHERE gebruikersnaam LIKE '%3'. Als antwoord krijg je (bij gebruik van het voorbeeld) gebruiker3.</p>

  		<p>Dan nog een paar kleine functies, deze zijn: COUNT(), AVG() en SUM(). COUNT() kun je gebruiken met SELECT en de naam van een kolom tussen de haaken om te tellen hoevaak er een waarde voorkomt, dit kan handig zijn als je bijvoorbeeld wilt weten hoeveel mensen een email-adres hebben ingevoerd. AVG() werkt hetzelfde, maar dan om het gemiddelde van een reeks waardes te berekenen. Met SUM() kun je de waardes optellen. Stel je wilt weten wat de som is van alle id’s bij elkaar, dan kun je gebruikmaken van SELECT SUM(id) FROM gebruikers.</p>

  		<p>SQL wordt meestal in combinatie met een programmeertaal gebruikt, zoals voor deze website gedaan is. In dit geval is PHP gecombineerd met SQL en hiermee kan bijvoorbeeld ingelogd worden en kan de docent een overzicht zien van de klassen.</p>

  	</div>

    <div class="bar-s">
      <h3>
        Opdrachten
      </h3>
    </div>

    <div class="theorie-content">
      <ol>
				<li>Sorteert ORDER BY data standaard van klein naar groot of groot naar klein?</li>
				<li>Stel je gebruikt LIKE 't_la', zal de waarde “tesla” dan gevonden kunnen worden?</li>
				<li>Probeer de in deze paragraaf genoemde commando’s uit.</li>
    	</ol>
  	</div>

    <div class="bar-s">
      <h3>
        Antwoorden
      </h3>
    </div>

    <div class="theorie-content theorie-answers">
      <ol>
				<li>van klein naar groot</li>
				<li>Nee, want in de plaats van _ kan geen “es” komen te staan, aangezien er maar één karakter op die plaats kan komen.</li>
			</ol>
	  </div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
