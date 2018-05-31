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
							<span class="list-item klas">'+ klas +'</span>
							<span class="list-item leerlingen">'+ leerlingen +'</span>
							<span class="delete">x</span>
						</li>
					</ul>
				</div>

			<div class="addLid add-item">
				<span class="addKlas add-item">
					<input type="text" placeholder="klas" name="Aklas" maxlength="50" autocomplete="off" class="medium">
				</span>
				<span class="addLeerlingen add-item">
					<input type="text" placeholder="aantal leerlingen" name="ANleerlingen" maxlength="50" autocomplete="off" class="small">
				</span>
				<span class="plus-sign addklasButton">+</span>
			</div>

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
