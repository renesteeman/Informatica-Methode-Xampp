<?php
include('../../../components/headerChapter.php');
?>

<body>

  <div class="title-small">
    <h2>
      B4 §1 Wat is een database?
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
        <span class="ptile-content"><a href= "p2.php">
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

  		<p>Een database is een manier om data op te slaan voor applicaties. Het lijkt op een grote tabel waar onder andere getallen, datums en tekst in kan worden opgeslagen. Het is vooral handig om gegevens van gebruikers bij te houden, zoals de gebruikersnaam, het wachtwoord (niet in tekst) en een email-adres.</p>

      <p>Er zijn meerdere soorten databases, in dit hoofdstuk zullen werken met relationele databases. Bij een relationele database wordt data uit verschillende tabellen aan elkaar gekoppeld door een unieke waarde die bij een rij hoord, zoals een leerlingennummer of BSN (burger service nummer).</p>

      <p>
        Een ander soort database dat momenteel erg veel aandacht ontvangt is blockchain. Een blockchain bestaat uit meerdere blokken data die elkaar opvolgen en die aan elkaar verbonden zijn door een wiskundige formule. Als een blok eenmaal is opgeslagen kan deze niet meer veranderd worden.
      </p>

      <p>
        Het voordeel van blockchain is dat de data betrouwbaarder is, het kan namelijk niet eenvoudig zijn 'geschiedenis' veranderen. Een nadeel is dat het meer rekenkracht vereist en een stuk complexer is. Het wordt dus vooral gebruikt voor data dat erg betrouwbaar moet zijn.
      </p>

  		<p>Een database staat vaak op een server. Dat is een soort computer die voornamelijk gebruikt wordt om informatie uit te wisselen met gebruikers en een applicatie. Bijvoorbeeld voor het inloggen op een website, hier stuurt de gebruiker tekst door naar een server en ‘reageert’ de applicatie door bijvoorbeeld de code te activeren die toegang geeft tot bepaalde functies.</p>

  		<p>In een database zijn vaak meerdere tabellen te vinden, zoals: groepen, planner en gebruikers. Elke tabel heeft dan zijn eigen overzicht van gegevens. Zo kan er bij gebruikers bijvoorbeeld een gebruikersnaam en wachtwoorden kolom zijn. Elke gebruiker heeft dan zijn eigen rij waar deze kolommen zijn ingevuld.</p>

  		<p>Een voorbeeld van zo’n database is:</p>
      <img src="./afbeeldingen/VoorbeeldDatabase.png" />

  		<p>In een database is het belangrijk dat er een primary key in voorkomt. Dit is een waarde die voor elke rij uniek is. In dit voorbeeld is dat het ID, dit is een uniek nummer voor elke gebruiker en kan gebruikt worden om mensen uit elkaar te houden.</p>

		</div>

    <div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">

			<ol>
				<li>
					Noem twee soorten database structuren.
				</li>
				<li>
					Beschrijf een blockchain in eigen woorden.
				</li>
				<li>
					Wanneer zou een blockhain handig zijn?
				</li>
        <li>
          Wat is een primary key?
        </li>
        <li>
          Wat is het verschil tussen een tabel, kolom en rij?
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
					Relationele database, blockchain of NoSQL.
				</li>
				<li>
					Een blockchain is een reeks van blokken data die aan elkaar gelinkt zijn.
				</li>
				<li>
					Als de data die wilt opslaan erg betrouwbaar moet zijn.
				</li>
        <li>
          Een primary key is een unieke waarde voor elke rij in een database.
        </li>
        <li>
          Een tabel is een verzameling van zowel kolommen als rijen waarin de structuur voor elke rij gelijk is. Een kolom is een soort categorie. Een rij is een verzameling van waardes voor alle kolommen in een tabel met één waarde per kolom.
        </li>
			</ol>

		</div>

	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
