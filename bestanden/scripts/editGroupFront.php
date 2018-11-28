<?php
include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/edit.min.css">

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

	<div class="main top-header-main">

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
					<span class="top-header">
						'.$groupname.'
					</span>'
				;

				$id = $_SESSION["id"];
				$sql = "SELECT school FROM users WHERE id='$id'";

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
									<input type="text" placeholder="'.$Glink.'" name="NGlink" maxlength="150">
								</li>
								<li>
									<label>Leden</label>
									<div class="list">
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
										<span class="list-item">'.$naam.'</span><span class="delete">x</span>
									</li>';

								}

							} else {
								echo "Geen huidige leden";
							}

							echo '
								</ul>
									</div>
									<div class="addLid add-item">
										<span class="addLid add-item">
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
									<input type="submit" value="Bevestig" id="editGroupConfirm" class="ConfirmButton">
								</li>
								<li>
									<input type="submit" class="deleteGroupButton red-button" value="Verwijder groep">
									</input>
								</li>
							</ul>
						</form>
						';
						} else {
							echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
						}
					} else {
						echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					}
				} else {
					echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
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

	<script src="../scripts/group.js"></script>

</body>
