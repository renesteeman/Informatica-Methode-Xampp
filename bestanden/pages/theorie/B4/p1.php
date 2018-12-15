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

      <div class="ptile active">
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

      <p>Er zijn meerdere soorten databases, in dit hoofdstuk zullen werken met relationele databases. Bij een relationele database wordt data uit verschillende 'tabellen' aan elkaar 'gekoppeld' door een unieke waarde die bij een rij hoord, zoals een leerlingennummer. Een ander soort database dat momenteel erg veel aandacht ontvangt is blockchain. Het voordeel van blockchain is dat de data betrouwbaarder is, het kan namelijk niet eenvoudig zijn 'geschiedenis' veranderen. Een nadeel is dat het meer rekenkracht vreist en een stuk complexer is.</p>

  		<p>Zo’n database staat vaak op een server. Dat is een soort computer die voornamleijk gebruikt wordt om informatie uit te wisselen met gebruikers en een applicatie. Bijvoorbeeld voor het inloggen op een website, hier stuurt de gebruiker tekst door naar een server en ‘reageert’ de applicatie door bijvoorbeeld de code te activeren die toegang geeft tot bepaalde functies.</p>

  		<p>In een database zijn vaak meerdere tabellen te vinden, zoals: groepen, planner en gebruikers. Elke tabel heeft dan zijn eigen overzicht van gegevens. Zo kan er bij gebruikers bijvoorbeeld een gebruikersnaam en wachtwoorden kolom zijn. Elke gebruiker heeft dan zijn eigen rij waar deze kolommen zijn ingevuld.</p>

  		<p>Een voorbeeld van zo’n database is:</p>
      <img src="./afbeeldingen/VoorbeeldDatabase.png" />

  		<p>In een database is het belangrijk dat er een primary key in voorkomt. Dit is een waarde die voor elke rij uniek is. In dit voorbeeld is dat het ID, dit is een uniek nummer voor elke gebruiker en kan gebruikt worden om mensen uit elkaar te houden.</p>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
