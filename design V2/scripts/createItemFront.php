<?php
	include('../components/headerGeneral.php');
	include('../scripts/DB_connect.php');
?>

<link rel="stylesheet" href="../css/plannerItemAanmaken.min.css">

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
					echo 'Item aanmaken';
				} else {
					echo 'Login';
				}
			?>
		</h3>
	</div>

	<div class="createItem">
		<form class="createItemForm" method="post" action="../scripts/createGroup.php" accept-charset="UTF-8">
			<ul>
				<li>
					<label>Naam</label>
					<input type="text" placeholder="Naam van het Item" name="Inaam" maxlength="50" required>
				</li>
				<li>
					<label>Omschrijving</label>
					<textarea type="text" placeholder="Omschrijving van het item" name="Iomschrijving" maxlength="500" required></textarea>
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
					<label>Progressie</label>
					<div class="itemLijst">
						<ul>

						</ul>
					</div>
					<div class="addChapter">
						<span class="addChapter">
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
					<input type="submit" value="Bevestig">
				</li>
			</ul>
		</form>
	</div>



	</div>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>
