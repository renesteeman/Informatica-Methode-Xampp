<?php
include('../components/headerGeneral.php');
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

		<?php

			//function to check and clean input
			function check_input($data) {
				$data = trim($data, " ");
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$groupname = mysqli_real_escape_string($conn, check_input($_SESSION['groupname']));

			if (isset($_SESSION["username"])){

				echo '
					<span id="groupName">
						'.$groupname.'
					</span>'
				;

				$user = $_SESSION["username"];
				$sql = "SELECT school FROM users WHERE username='$user'";

				//get current info in order to show a 'preview'
				if (mysqli_query($conn, $sql)) {
					$result = mysqli_query($conn, $sql);
					$result = mysqli_fetch_assoc($result);
					$school = $result['school'];

					$sql = "SELECT beschrijving, link FROM groepen WHERE naam='$groupname' AND school='$school'";

					//get current info in order to show a 'preview'
					if (mysqli_query($conn, $sql)) {
						$result = mysqli_query($conn, $sql);
						$result = mysqli_fetch_assoc($result);
						$Gbeschrijving = $result['beschrijving'];
						$Glink = $result['link'];

						echo '
						<form class="editGroupForm" method="post" action="../scripts/editGroup.php" accept-charset="UTF-8">
							<ul>
								<li>
									<label>Nieuwe naam</label>
									<input type="text" placeholder="'.$groupname.'" name="NGnaam" maxlength="50">
								</li>
								<li>
									<label>Nieuwe omschrijving</label>
									<textarea type="text" placeholder="'.$Gbeschrijving.'" name="NGomschrijving" maxlength="500"></textarea>
								</li>
								<li>
									<label>Nieuwe link</label>
									<input type="text" placeholder="'.$Glink.'" name="NGlink" maxlength="50">
								</li>
								<li>
									<label>Leden</label>
									<div class="ledenLijst">
										<ul>
						';

						$sql = "SELECT naam FROM users WHERE school='$school' AND group_name='$groupname' AND functie='leerling'";

						if (mysqli_query($conn, $sql)) {

							$result = mysqli_query($conn, $sql);

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

							echo '
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
						';
						} else {
							echo "SQL error, contact admin";
						}
					} else {
						echo "SQL error, contact admin";
					}
				} else {
					echo "SQL error, contact admin";
				}
			} else {
				echo "Account not found";
			}
		?>







	</div>



	</div>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>
