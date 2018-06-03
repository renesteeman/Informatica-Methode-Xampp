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
	<script src="createAccount.js"></script>
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
				Schoolnaam</br>
				<input type="text" class="schoolnaam" name="schoolnaam" required/>
			</li>
			<li>
				Telefoonnummer</br>
				<input class="telefoonnummer" name="telefoonnummer" type="tel" required/>
			</li>
			<li>
				Email</br>
				<input class="email" name="email" type="email" required/>
			</li>
			<li>
				Aantal docenten</br>
				<input class="Ndocenten" name="Ndocenten" type="number" min="0" required/>
			</li>
			<li>

				<label>Klassen</label>
				<div class="list">
					<ul>

					</ul>
				</div>

			<div class="add-item">
				<span class="addKlas add-item">
					<input type="text" placeholder="klas" name="Aklas" maxlength="50" autocomplete="off" class="medium">
				</span>
				<span class="addLeerlingen add-item">
					<input type="text" placeholder="aantal leerlingen" name="ANleerlingen" maxlength="50" autocomplete="off" class="small">
				</span>
				<span class="plus-sign addklasButton">+</span>
			</div>

			</li>

			<li class="kosten">
				Overzicht
				<ul>
					<li>
						<span class="aantal">aantal</span>
						<span class="item">soort</span>
						<span class="prijs">prijs</span>
					</li>
					<li class="hide Pdocenten">
						<span class="aantal"></span>
						<span class="item">docent</span>
						<span class="prijs"></span>
					</li>
					<li class="hide Pleerlingen">
						<span class="aantal"></span>
						<span class="item">leerling</span>
						<span class="prijs"></span>
					</li>
					<li class="hide totaal">
						<span class="Tprijs"></span>
					</li>
				</ul>
			</li>

			<li>
				<span>Opmerkingen en extra informatie</span>
				<textarea class="extraInfo"></textarea>
			</li>

			<li class="akkoord">
				<label class="container">
					Ik ga akkoord met de <a href="../downloads/privacyBeleid.pdf">voorwaarden</a> en de <a href="../downloads/voorwaarden.pdf">privacy overeenkomst</a> en al mijn ingevoerde gegevens zijn correct.
					<input type="checkbox" class="checkbox">
					<span class="checkmark"></span>
				</label>
			</li>

			<li>
				<div class="g-recaptcha" data-sitekey="6Lc_J1MUAAAAAJlHeuG3e9tg0zTGAvA7bC2dgSzq"></div>
			</li>

			<li>
				<span class="info">Als u op verzenden klikt worden voor u de accounts aangemaakt en u ontvangt een vacature van uw bestelling die u binnen 14 dagen dient te betalen. Voor meer informatie kunt u bellen met 0622155216, hier zijn geen extra kosten aan verbonden.</span>
			</li>

			<li>
				<span class="info">Let op! Alle accounts zijn maar 1 jaar geldig, hierna moet u ze verlengen.</span>
			</li>
			<li>
				<span class="info">Let op! Het aanmaken van de accounts kan even duren, wacht totdat u op deze pagina een bevestiging te zien krijgt waarin staat dat de accounts aangemaakt zijn voordat u deze pagina afsluit. Het zou maximaal enkele minuten mogen duren, als het langer duurt kunt bellen met 0622155216.</span>
			</li>

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
