<?php
	include('../components/headerGeneral.php');
	include('../scripts/DB_connect.php');
?>

<link rel="stylesheet" href="../css/changeClass.min.css">

<head>
	<meta name="description" content="Een informatica methode met structuur en keuze. Voor docenten is er een duidelijk overzicht en leerlingen kunnen zich specialiseren in wat ze interessant vinden, zonder de basis te missen." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk" />
	<meta name="author" content="René Steeman" />
</head>

<body>

	<div class="title">
		<h2>
			Klas wijzigen
		</h2>
	</div>

	<div class="main">
		<form class="accountSettingsForm" method="post" action="../scripts/updateAccount.php" accept-charset="UTF-8">
			<ul>
				Klas:
				<div class="klasSelector">
					<select>
						<option value="volvo">H51</option>
						<option value="saab">A51</option>
						<option value="opel">Opel</option>
						<option value="audi">Audi</option>
					</select>
				</div>

				<div class="leerlingSelector">
					Leerlingen:
					<div class="leerling">
						<label class="container">L1
							<input type="checkbox" class="single-select-checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="leerling">
						<label class="container">L1
							<input type="checkbox" class="single-select-checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>

				Nieuwe klas:</br>
				<input type="text" />

				<li>
					<input type="submit" value="update">
				</li>
			</ul>
		</form>

	</div>



	<?php
	include('../components/footerGeneral.php');
	?>

</body>
