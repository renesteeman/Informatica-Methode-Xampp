<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/create.min.css">
<script src="../scripts/planner.js"></script>

<body>

	<div class="title">
		<h2>
			Planner
		</h2>
	</div>

	<div class="bar">
		<h3>
			<?php
				if (isset($_SESSION["username"])){
					echo 'Opdracht aanmaken';
				} else {
					echo 'Login';
				}
			?>
		</h3>
	</div>

	<div class="main createItem">
		<form class="createItemForm" method="post" action="../scripts/createItemAjax.php" accept-charset="UTF-8">
			<ul>
				<li>
					<label>Naam</label>
					<input type="text" placeholder="Naam van de opdracht" name="Inaam" maxlength="50" required>
				</li>
				<li>
					<label>Omschrijving</label>
					<textarea type="text" placeholder="Omschrijving van de opdracht" name="Iomschrijving" maxlength="500" required></textarea>
				</li>
				<li>
					<label>Klas</label>
					<input type="text" placeholder="Klas" name="Iklas" maxlength="50" required>
				</li>
				<li>
					<label>Datum</label>
					<input type="date" placeholder="Datum" name="Idatum" required>
				</li>
				<li>
					<label>Te maken hoofdstuk(ken)</label>
					<div class="list itemLijst">
						<ul>

						</ul>
					</div>
					<div class="add-item addChapter">
						<span class="add-item addChapter">
							<input type="text" placeholder="Te maken hoofdstuk (bv H1)" name="Ihoofdstukken" maxlength="3" autocomplete="off">
						</span>
						<span class="plus-sign addChapterButton">+</span>
					</div>
				</li>
				<li>
					<label>Uw wachtwoord</label>
					<input type="password" placeholder="Huidig wachtwoord" name="password" maxlength="50" required>
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

</body>
