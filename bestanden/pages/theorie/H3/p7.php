<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H3 §6 Uitdaging: mini-game
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
			<div class="ptile active">
				<span class="ptile-content"><a href="p7.php">
					§7
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
				Uitdaging
			</p>
			<p>
				<pre>
Deze paragraaf is een uitdaging, maak je geen zorgen als het je niet meteen lukt of als je iets niet weet. Deze paragraaf is bedoeld om je te leren hoe het is om te programmeren, inclusief de irritante problemen en de vele vragen die je in het begin zult tegenkomen. Je moet waarschijnlijk ook zelf dingen opzoeken, net zoals een echte programmeur.

Goede sites hiervoor zijn:
<a href="https://docs.python.org/3/tutorial/index.html ">https://docs.python.org/3/tutorial/index.html </a>
<a href="https://stackoverflow.com/ ">https://stackoverflow.com/ </a>

Kijk ook onderaan de pagina voor een paar tips die zeker goed van pas komen.
				</pre>

			</p>
			<p>
				De opdracht
			</p>
			<p>
				Maak een tekstgame in python. Hierbij mag je zelf kiezen wat je precies wilt maken en hoe je dat gaat doen. Maak het jezelf niet te moeilijk en samenwerken en vragenstellen is aanbevolen. </br></br>

				Ideeën voor als je echt niks kunt bedenken:
				Een wiskunde quiz waar zolang je het goede antwoord hebt punten blijft scoren.
				Een mysterieus verhaal waar je als speler moet bepalen wie de dader is.

			</p>
			<p>
				Een paar tips
			</p>
			<p>
				<pre>
1) Schijf het idee eerst op op papier, anders raak je het overzicht kwijt
2) Begin in het Nederlands of in het Engels de logica uit te werken
3) Voeg stukje voor stukje code toe en test steeds opnieuw, gebruik hiervoor print().
4) Heb je bepaalde logica nodig waarvan je verwacht dat het al bestaat, zoek het dan gerust op (je hebt een grote kans op resultaat als je het in het Engels opzoekt).

Een paar stukken code die je waarschijnlijk nodig hebt:
Voor (pseudo)random getallen:
import random #import voegt al bestaande code toe zodat er meer functies zijn
random.randint(MINIMALE GROTE,MAXIMALE GROTE)

Voor het krijgen van input van een gebruiker:
input()

bijvoorbeeld als
<code>
	antwoord = input()
	print(antwoord)
</code>

#NB de input wordt als tekst gezien, vandaar de accolades bij de IF-statement:
<code>
	if antwoord == "1":
	    print("juist geantwoord")
	else:
	    print("verkeerd geantwoord")
</code>


				</pre>

			</p>

		</div>

	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
