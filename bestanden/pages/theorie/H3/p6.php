<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H3 §6 Loops
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
			<div class="ptile active">
				<span class="ptile-content"><a href="p6.php">
					§6
				</a></span>
			</div>
			<div class="ptile">
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
			<p>Bij software komt veel herhaling voor en dit kan het efficiënts geprogrammeerd worden met loops. Loops zijn herhalingsstructuren. De belangrijkste zijn: while- en for-loops. Oftewel terwijl en voor herhalingen. In python is de for loop een beetje anders dan in andere programmeertalen, maar de logica is bijna hetzelfde.</p>

			<p>Voordat we kunnen beginnen met de voorbeelden is het belangrijk om een paar tekens te kennen. Deze zijn:</p>

			<p>Het groter dan teken ></p>

			<p>Het kleiner dan teken <</p>

			<p>Het = teken kan met deze gecombineerd worden, dit gebeurd in python door <= of >= te gebruiken</p>

			<p>Voorbeelden in python zijn:</p>

<pre>
<code>
#For-loop (# is een comment oftewel notatie in python voor één regel, hierin wordt vaak uitleg gezet)

Priemgetallen = [2,3,5,7]

for priemgetal in priemgetallen:

print (priemgetal)

#hier wordt dus eerst een lijst van priemgetallen gemaakt en vervolgens wordt gezegd dat voor elk getal in die lijst een bepaalde actie uitgevoerd moet worden, in dit geval het printen van het getal.

#while-loop

i = 5

'''

i komt veel voor als variabele in een loop, het is het standard getal voor programmeurs voor een loop van één laag diep, het is namelijk ook mogelijk om meerdere loops in elkaar te zetten. Het standaard teken voor de 2e variabele is j, dan k, l, enz. De driedubbele accolades in python worden gebruikt voor commentaar dat meerdere regels lang is.

'''

while i < 20:

print (i)

i = i+1

#i += 1 geeft hetzelfde resultaat en in veel andere talen is i++ ook mogelijk

'''

Er wordt hier dus steeds gekeken of i, dat eerst gelijk is aan 5 nog minder is dan 20. Als i minder is dan 20, dan wordt de waarde van i weergegeven en met één verhoogd. Je krijgt dus een lijst van de waardes van i vanaf 5 t/m 19. Aangezien 20 niet meer kleiner is dan 20 en dus de herhaling eindigt.

'''
</code>
</pre>


			<p>Je kunt meerdere eisen maken voor de while loop. Stel je hebt twee eisen die beide vervuld moeten zijn, dan kun je ‘&’ tussen de eisen zetten.</p>

			<p>Je kunt de code voor rekenwerk nog iets makkelijker opschrijven. Zo is variabele = variabele + 1 ook te schrijven als variabele++. Net zoals variabele2 = variabele2 + variabele te schrijven is als variabele2 += variabele.</p>

			<p>
				Noties zoals hierboven zijn erg belangrijk om de code goed leesbaar te maken en houden. Ze worden vooral gebruikt voor uitleg en zijn erg handig voor code die gedeeld wordt en voor als je na een tijdje terug gaat naar de code. Het is zo duidelijk wat de code eigenlijk doet en waarom het zo in elkaar zit.
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Vragen
			</h3>
		</div>

		<div class="theorie-content">

			<ol>
				<li>
					Geef de waarden van een variabele zolang die tussen 5 en 10 in zit via python.
				</li>
				<li>
					Maak een lijst met 5 getallen en geef per getal weer hoeveel de som van alle getallen op dat moment is (inclusief het huidige getal). De som is de opgetelde waardes van de getallen. Stel je hebt 3, 4 en 5, dan is de som 12 (3+4+5).
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
					i = 6

					while i > 5 and i < 10:
					    print(i)
					    i += 1
				</li>
				<li>
					waardes = [1,3,10,43,1248]
					sum = 0

					for waarde in waardes:
					    sum += waarde
					    print (sum)
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
