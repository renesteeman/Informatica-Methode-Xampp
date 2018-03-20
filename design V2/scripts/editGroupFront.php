<?php
include('../components/headerGeneral.php');
include('../scripts/DB_connect.php');

//function to check and clean input
function check_input($data) {
	$data = trim($data, " ");
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$groupname = check_input($_SESSION['groupname']);
?>

<link rel="stylesheet" href="../css/editGroup.min.css">

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

	<div class="editGroup">

		<span id="groupName">
			<?php echo $groupname; ?>
		</span>

		<form class="editGroupForm" method="post" action="../scripts/editGroup.php" accept-charset="UTF-8">
			<ul>
				<li>
					<label>Nieuwe naam</label>
					<input type="text" placeholder="Nieuwe naam van de groep" name="NGnaam" maxlength="50" required>
				</li>
				<li>
					<label>Nieuwe omschrijving</label>
					<textarea type="text" placeholder="Nieuwe omschrijving van de groep" name="NGomschrijving" maxlength="500" required></textarea>
				</li>
				<li>
					<label>Nieuwe link</label>
					<input type="text" placeholder="Nieuwe link naar bestanden" name="NGlink" maxlength="50">
				</li>
				<li>
					<label>Leden</label>
					<div class="ledenLijst">
						<ul>
							//TODO
							load current members
						</ul>
					</div>
					<div class="addLid">
						<span class="addLid">
							<input type="text" placeholder="Nieuw lid" name="NGleden" maxlength="50" autocomplete="off">
						</span>
						<span class="plus-sign addLidButton">+</span>
					</div>
				</li>
				<li>
					<label>Uw wachtwoord</label>
					<input type="password" placeholder="Huidig wachtwoord" name="password" maxlength="50" required>
				</li>
				<li>
					<input type="submit" value="Bevestig">
				</li>
				<li>
					<div class="center">
					</br></br>
						<div class="deleteButton">
							Delete groep
						</div>
					</div>
				</li>
			</ul>
		</form>
	</div>



	</div>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>
