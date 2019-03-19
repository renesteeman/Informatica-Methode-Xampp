<?php
	include('../../../components/headerChapter.php');
?>

<link rel="stylesheet" href="../../../css/quiz.min.css">

<body>

	<div class="title-small">
		<h2>
			V4 quiz
		</h2>
	</div>

	<div class="quiz-bar">
		<!-- filled in with JS -->
	</div>

	<div class="vragen">
		<!-- vraag 1-->
		<div class="vraagBalk">
			Het OSI-model heeft 6 lagen, waar of niet waar?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Waar
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Niet waar
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 2-->
		<div class="vraagBalk">
			Bij een bus is elk apparaat direct met elkaar verbonden.
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Waar
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Niet waar
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 3-->
		<div class="vraagBalk">
			Des te lager de laag van het OSI, hoe kleiner de grootte van het datapakket.
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Waar
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Niet waar
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 4-->
		<div class="vraagBalk">
			Wat is een methode die gebruikt kan worden voor het beveiligen van een verbinding?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Encryptie
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Functiescheiding (men kan alleen bij het nodige deel van het systeem)
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een wachtwoord
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 5-->
		<div class="vraagBalk">
			Wat is de beste omschrijving van DHCP?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">Een code die het adres van het apparaat weergeeft
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een systeem voor het omzetten van een IP-adres in een MAC-adres en andersom
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Een systeem dat communicatie tussen netwerken toestaat
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

		<!-- vraag 6-->
		<div class="vraagBalk">
			Wat is geen voordeel van de cloud?
		</div>
		<div class="antwoorden">
			<ul>
				<li>
					<label class="container">De controle over het systeem
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">De capaciteit van het systeem
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">Het bijwerken van het systeem
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container">De beveiliging
						<input type="checkbox" class="single-select-checkbox">
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>
		<div class="uitleg">

		</div>

	</div>

	<input type="submit" value="controleer" class="controleerAntwoordButton"/>

	</div>

	<script src="../../../scripts/quiz.js"></script>
	<?php
	include('../../../components/footerChapter.php');
	?>

</body>
