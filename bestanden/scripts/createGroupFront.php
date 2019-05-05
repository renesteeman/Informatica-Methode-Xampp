<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/create.min.css">

<body>

	<div class="title">
		<h2>
			Overzicht
		</h2>
	</div>

	<div class="bar">
		<h3>
			<?php
				if (isset($_SESSION["username"])){
					echo 'Groep aanmaken';
				} else {
					echo 'Login';
				}
			?>
		</h3>
	</div>

	<div class="main createGroup">
		<form class="createGroupForm" method="post" action="../scripts/createGroupAjax.php" accept-charset="UTF-8">
			<ul>
				<li>
					<label>Naam</label>
					<input type="text" placeholder="Naam van de groep" name="Gnaam" maxlength="50" required>
				</li>
				<li>
					<label>Omschrijving</label>
					<textarea type="text" placeholder="Omschrijving van de groep" name="Gomschrijving" maxlength="500" required></textarea>
				</li>
				<li>
					<label>Link</label>
					<input type="text" placeholder="Link naar bestanden" name="Glink" maxlength="150">
				</li>
				<li>
					<label>Leden</label>
					<div class="list ledenLijst">
						<ul>

						</ul>
					</div>
					<div class="add-item addLid">
						<span class="add-item addLid">
							<input type="text" placeholder="Nieuw lid" name="Gleden" maxlength="50" autocomplete="off">
						</span>
						<span class="plus-sign addLidButton">+</span>
					</div>
				</li>
				<li>
					<button type="submit">Bevestig</button>
				</li>
			</ul>
		</form>
	</div>

	</div>

	<?php
	include('../components/footerGeneral.php');
	?>

	<script src="../scripts/group.js"></script>

</body>
