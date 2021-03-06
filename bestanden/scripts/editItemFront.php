<?php
include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/edit.min.css">
<script src="../scripts/planner.js"></script>

<body>

	<div class="title">
		<h2>
			Planner
		</h2>
	</div>

	<div class="bar">
		<h3>
			Opdracht aanpassen
		</h3>
	</div>

	<div class="main editItemPage top-header-main">

		<?php

		$id = $_SESSION["id"];
		$school = "";

		$sql = "SELECT school FROM users WHERE id='$id'";

		//get current info in order to show a 'preview'
		if (mysqli_query($conn, $sql)) {
			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$school = $result['school'];
		}

		//function to check and clean input
		function check_input($data) {
			$data = trim($data, " ");
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$Iid = mysqli_real_escape_string($conn, check_input($_SESSION['itemID']));
		$Iname = mysqli_real_escape_string($conn, check_input($_SESSION['itemname']));
		$Iklas = mysqli_real_escape_string($conn, check_input($_SESSION['itemklas']));
		$Idate = mysqli_real_escape_string($conn, check_input($_SESSION['itemdatum']));
		$Idate = date('Y-m-d', $Idate);
		$Ibeschrijving = mysqli_real_escape_string($conn, check_input($_SESSION['itembeschrijving']));

		if (isset($_SESSION["functie"])){
			if($_SESSION["functie"] == 'docent'){

				echo '
				<span class="top-header">
					'.$Iname.'
				</span>

				<form class="editItemForm" method="post" action="../scripts/editItem.php" accept-charset="UTF-8">
					<ul>
						<li>
							<label>Nieuwe naam</label>
							<input type="text" placeholder="'.$Iname.'" name="NInaam" maxlength="50">
						</li>
						<li>
							<label>Nieuwe omschrijving</label>
							<textarea type="text" placeholder="'.$Ibeschrijving.'" name="NIomschrijving" maxlength="500"></textarea>
						</li>
						<li>
							<label>Nieuwe klas</label>
							<input type="text" placeholder="'.$Iklas.'" name="NIklas" maxlength="50">
						</li>
						<li>
							<label>Nieuwe datum</label>
							<input type="date" value="'.$Idate.'" name="NIdatum" maxlength="50">
						</li>
						<li>
							<label>Te maken hoofdstuk(ken)</label>
							<div class="list itemLijst">
								<ul>';

									$sql = "SELECT school FROM users WHERE id='$id'";

									if (mysqli_query($conn, $sql)) {
										//find school of teacher
										$result = mysqli_query($conn, $sql);
										$result = mysqli_fetch_assoc($result);
										$school = $result['school'];

										$sql = "SELECT progressie FROM planner WHERE school='$school' AND id='$Iid'";

										if (mysqli_query($conn, $sql)) {

											$result = mysqli_query($conn, $sql);
											$row = mysqli_fetch_assoc($result);

											if (mysqli_num_rows($result) > 0) {
												//save chapters
												$hoofdstukkenRaw = $row['progressie'];
												$hoofdstukkenEdited = explode(", ", $hoofdstukkenRaw);
												array_pop($hoofdstukkenEdited);

												$count = count($hoofdstukkenEdited);
												for($i=0; $i<$count; $i++){
													echo '
													<li>
														<span class="list-item">'.$hoofdstukkenEdited[$i].'</span><span class="delete">x</span>
													</li>
													';
												}

											} else {
												echo "Geen oude hoofdstukken gevonden";
											}
										} else {
											echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
										}
									} else {
										echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
									}

									echo '
								</ul>
							</div>
							<div class="addItem">
								<span class="addItem">
									<input type="text" placeholder="Nieuw items" name="NGleden" maxlength="50" autocomplete="off">
								</span>
								<span class="plus-sign addItemButton">+</span>
							</div>
						</li>
						<li>
							<label>Uw wachtwoord</label>
							<input type="password" placeholder="Huidig wachtwoord" name="password" maxlength="50">
						</li>
						<li>
							<input type="submit" value="Bevestig" id="editItemConfirm" class="ConfirmButton">
						</li>
						<li>
							<div class="center">
								<button class="redButton deleteItemButton" type="submit">Verwijder opdracht</button>
							</div>
						</li>
					</ul>
				</form>
			</div>';
			} else {
				echo "\nU bent geen docent.";
			}
		} else {
			echo "\nU bent niet ingelogd.";
		}
	?>

	</div>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>
