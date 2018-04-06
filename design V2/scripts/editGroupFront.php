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

$groupname = mysqli_real_escape_string($conn, check_input($_SESSION['groupname']));
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
			Groep aanpassen
		</h3>
	</div>

	<div class="editGroupPage">

		<span id="groupName">
			<?php echo $groupname; ?>
		</span>

		<form class="editGroupForm" method="post" action="../scripts/editGroup.php" accept-charset="UTF-8">
			<ul>
				<li>
					<label>Nieuwe naam</label>
					<input type="text" placeholder="Nieuwe naam van de groep" name="NGnaam" maxlength="50">
				</li>
				<li>
					<label>Nieuwe omschrijving</label>
					<textarea type="text" placeholder="Nieuwe omschrijving van de groep" name="NGomschrijving" maxlength="500"></textarea>
				</li>
				<li>
					<label>Nieuwe link</label>
					<input type="text" placeholder="Nieuwe link naar bestanden" name="NGlink" maxlength="50">
				</li>
				<li>
					<label>Leden</label>
					<div class="ledenLijst">
						<ul>
							<?php


							if (isset($_SESSION["username"])){

								$user = $_SESSION["username"];

								$sql = "SELECT school FROM users WHERE username='$user'";

								if (mysqli_query($conn, $sql)) {
									//find school of teacher
									$result = mysqli_query($conn, $sql);
									$result = mysqli_fetch_assoc($result);
									$school = $result['school'];

									$sql = "SELECT naam FROM users WHERE school='$school' AND group_name='$groupname' AND functie='leerling'";

									if (mysqli_query($conn, $sql)) {

										$result = mysqli_query($conn, $sql);

										$namen=[];

										if (mysqli_num_rows($result) > 0) {
										    //save names
										    while($row = mysqli_fetch_assoc($result)) {
												$naam = $row["naam"];

												echo '
												<li>
													<span class="lid">'.$naam.'</span>
													<span class="delete">x</span>
												</li>';

										    }

										} else {
										    echo "Geen huidige leden";
										}
									} else {
										echo "SQL error, contact admin";
									}
								} else {
									echo "SQL error, contact admin";
								}
							}


							?>
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
					<input type="password" placeholder="Huidig wachtwoord" name="password" maxlength="50">
				</li>
				<li>
					<input type="submit" value="Bevestig" id="editGroupConfirm">
				</li>
				<li>
					<div class="center">
					</br></br>
						<div class="deleteGroupButton">
							Verwijder groep
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
