<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H3 §7 Uitdaging: mini-game
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
			<p>Deze paragraaf is een uitdaging, maak je geen zorgen als het je niet meteen lukt of als je iets niet weet. Deze paragraaf is bedoeld om je te leren hoe het is om te programmeren, inclusief de irritante problemen en de vele vragen die je in het begin zult tegenkomen. Je moet waarschijnlijk ook zelf dingen opzoeken, net zoals een echte programmeur.</p>

			<p>Goede sites hiervoor zijn:</p>

			<p><a href="https://docs.python.org/3/tutorial/index.html ">https://docs.python.org/3/tutorial/index.html </a></p>

			<p><a href="https://stackoverflow.com/ ">https://stackoverflow.com/ </a></p>

			<p>Kijk ook onderaan de pagina voor een paar tips die zeker goed van pas komen.</p>

			<p>De opdracht</p>

			<p>Maak een tekstgame in python. Hierbij mag je zelf kiezen wat je precies wilt maken en hoe je dat gaat doen. Maak het jezelf niet te moeilijk en samenwerken en vragenstellen is aanbevolen.</p>

			<p>Ideeën voor als je echt niks kunt bedenken:</p>

			<ul>
				<li>
					Een wiskunde quiz waar zolang je het goede antwoord hebt punten blijft scoren.
				</li>
				<li>
					Een mysterieus verhaal waar je als speler moet bepalen wie de dader is van een misdrijf.
				</li>
			</ul>

			<p>Een paar tips</p>

			<ol>
				<li>
					Schijf het idee eerst op op papier, anders raak je het overzicht kwijt.
				</li>
				<li>
					Begin in het Nederlands of in het Engels de logica uit te werken.
				</li>
				<li>
					Voeg stukje voor stukje code toe en test steeds opnieuw, gebruik hiervoor print().
				</li>
				<li>
					Heb je bepaalde logica nodig waarvan je verwacht dat het al bestaat, zoek het dan gerust op (je hebt een grote kans op resultaat als je het in het Engels opzoekt).
				</li>
			</ol>

			<p>Een paar stukken code die je waarschijnlijk nodig hebt:</p>

			<p>Voor (pseudo)random getallen:</p>

<pre>
<code>
import random #import voegt al bestaande code toe zodat er meer functies zijn

random.randint(MINIMALE GROTE,MAXIMALE GROTE)
</code>
</pre>

			<p>Voor het krijgen van input van een gebruiker:</p>

			<p><code>input()</code></p>

			<p>bijvoorbeeld als</p>

<pre><code>antwoord = input()

print(antwoord)

#NB de input wordt als tekst gezien, vandaar de accolades bij de IF-statement:

if antwoord == "1":

print("juist geantwoord")

else:

print("verkeerd geantwoord")</code></pre>

		</div>

	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
