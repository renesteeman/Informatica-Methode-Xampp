<?php
	include('../components/headerGeneral.php');
?>

<head>
	<meta name="description" content="De bestelpagina voor nieuwe accounts op Inforca." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk" />
	<meta name="author" content="René Steeman" />
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<link rel="stylesheet" href="../css/create.min.css">
	<link rel="stylesheet" href="../css/requestAccounts.min.css">
	<script src="requestAccount.js"></script>
</head>

<body>

	<div class="title">
		<h2>
			Accounts aanvragen
		</h2>
	</div>

	<div class="bar">
		<h3>
			Accounts aanvragen
		</h3>
	</div>

	<div class="main">
		<form class="requestAccounts" method="post" action="../scripts/requestAccounts.php" accept-charset="UTF-8">

			<ul>
				<li>
					Naam van de school</br>
					<input type="text" name="schoolNaam" maxlength="50" required/>
				</li>
				<li>
					Adres van de school</br>
					<input type="text" name="schoolAdres" maxlength="50" required/>
				</li>
				<li>
					Postcode van de school</br>
					<input type="text"name="schoolPostcode" maxlength="50" required/>
				</li>
				<li>
					Plaats van de school</br>
					<input type="text" name="schoolPlaats" maxlength="50" required/>
				</li>
				<li>
					Telefoonnummer van de school</br>
					<input type="text" name="schoolTelefoonnummer" maxlength="50" required/>
				</li>
				<li>
					Naam van de docent</br>
					<input type="text" name="docentNaam" maxlength="50" required/>
				</li>
				<li>
					Telefoonnummer van de docent</br>
					<input type="text" name="docentTelefoonnummer" maxlength="50" required/>
				</li>
				<li>
					Aantal docenten</br>
					<input type="number" name="Ndocenten" min="0" required/>
				</li>
				<li>

					<label>Klassen</label>
					<div class="list">
						<ul>

						</ul>
					</div>

					<div class="add-item">
						<span class="addKlas add-item">
							<input type="text" placeholder="klas" name="Aklas" maxlength="20" autocomplete="off" class="medium">
						</span>
						<span class="addLeerlingen add-item">
							<input type="text" placeholder="aantal leerlingen" name="ANleerlingen" maxlength="3" autocomplete="off" class="small">
						</span>
						<span class="plus-sign plus-sign">+</span>
					</div>
				</li>

				<div class="priceOverview">

				</div>

				<li>
					<input type="submit" value="verzend">
				</li>
			</ul>

		</form>

	</div>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>
