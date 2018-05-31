<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/create.min.css">
<link rel="stylesheet" href="../css/requestAccounts.min.css">
<script src="createAccount.js"></script>

<head>
	<meta name="description" content="De bestelpagina voor nieuwe accounts op Inforca." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk" />
	<meta name="author" content="René Steeman" />
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
				<input type="text" class="schoolnaam" name="schoolnaam"/>
			</li>
			<li>
				Telefoonnummer</br>
				<input type="text" class="telefoonnummer" name="telefoonnummer"/>
			</li>
			<li>
				Email</br>
				<input type="text" class="email" name="email"/>
			</li>
			<li>
				Aantal docenten</br>
				<input type="text" class="Ndocenten" name="Ndocenten"/>
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
				Prijs
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

			<li class="akkoord">
				<label class="container">
					Ik ga akkoord met de <a href="../downloads/privacyBeleid.pdf">voorwaarden</a> en de <a href="../downloads/voorwaarden.pdf">privacy overeenkomst</a>.
					<input type="checkbox">
					<span class="checkmark"></span>
				</label>
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
