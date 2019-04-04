<?php
	include('../../../components/headerChapter.php');
?>

<body>

	<div class="title-small">
		<h2>
			H2 Logica §2 visuele logica
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
				De verbanden tussen sets kunnen ook visueel worden weergeven, bijvoorbeeld in de vorm van cirkels. Stel set 1 bevat 27, 3, 8, 21 en 6. Set 2 bevat 3, 0, 20, 8 en 4.
			</p>
			<p>
				Set 1 &cap; 2 is dan:
				<img src="./afbeeldingen/logic2Mul.svg" class="theorieImage" />
			</p>
			<p>
				Set 1 ∪ set 2 is dan weer te geven als:
				<img src="./afbeeldingen/logic2Add.svg" class="theorieImage" />
			</p>
			<p>
				Of:
				<img src="./afbeeldingen/logic2MulCom.svg" class="theorieImage" />
			</p>

		</div>

		<div class="bar-s">
			<h3>
				Opdrachten
			</h3>
		</div>

		<div class="theorie-content">

			<ol class="MLquestion">
				<li>
					<ol>
						<li>Teken set 1 ∪ set 2 inclusief de getallen</li>
						<li>Teken set 1 ꓵ set 2 inclusief de getallen</li>
					</ol>
				</li>
			</ol>

		</div>

		<div class="bar-s">
			<h3>
				Antwoorden
			</h3>
		</div>

		<div class="theorie-content theorie-answers">

			<ol class="MLquestion">
				<li>
					Stel set 1 bevat 1, 3, 20, 6 en 400. Set 2 bevat 1, 6, 200, 8 en 4.
					<ol>
						<li><img src="./afbeeldingen/logic2Ans1.svg" class="theorieImage" /></li>
						<li><img src="./afbeeldingen/logic2Ans2.svg" class="theorieImage" /></li>
					</ol>
				</li>
			</ol>

		</div>
	</div>

	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
