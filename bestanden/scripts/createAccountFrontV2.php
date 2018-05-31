<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/edit.min.css">

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
		<form class="changeClass" method="post" action="../scripts/updateAccount.php" accept-charset="UTF-8">

		<ul>
			<li>
				Schoolnaam</br>
				<input type="text" class="Nclass" name="Nclass"/>
			</li>
			<li>
				Telefoonnummer</br>
				<input type="text" class="Nclass" name="Nclass"/>
			</li>
			<li>
				Email</br>
				<input type="text" class="Nclass" name="Nclass"/>
			</li>
			<li>
				Aantal docenten</br>
				<input type="text" class="Nclass" name="Nclass"/>
			</li>
			<li>

				<label>Klassen</label>
				<div class="list">
					<ul>
						<li>
							<span class="list-item">naam</span>
							<span class="delete">x</span>
						</li>
					</ul>
				</div>

			<div class="addLid add-item">
				<span class="addLid add-item">
					<input type="text" placeholder="klas" name="NGleden" maxlength="50" autocomplete="off" class="medium">
				</span>
				<span class="addLid add-item">
					<input type="text" placeholder="aantal leerlingen" name="NGleden" maxlength="50" autocomplete="off" class="small">
				</span>
				<span class="plus-sign addLidButton">+</span>
			</div>

			</li>

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
