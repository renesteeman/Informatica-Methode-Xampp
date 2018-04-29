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

$itemname = mysqli_real_escape_string($conn, check_input($_SESSION['itemname']));
?>

<link rel="stylesheet" href="../css/editItem.min.css">

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

	<div class="editItemPage">

		<span id="itemName">
			<?php echo $itemname; ?>
		</span>

		<form class="editItemForm" method="post" action="../scripts/editItem.php" accept-charset="UTF-8">
			<ul>
				<li>
					<label>Nieuwe naam</label>
					<input type="text" placeholder="Nieuwe naam van de opdracht" name="NInaam" maxlength="50">
				</li>
				<li>
					<label>Nieuwe omschrijving</label>
					<textarea type="text" placeholder="Nieuwe omschrijving voor de opdracht" name="NIomschrijving" maxlength="500"></textarea>
				</li>
				<li>
					<label>Nieuwe klas</label>
					<input type="text" placeholder="Nieuwe klas waar de opdracht voor is" name="NIklas" maxlength="3">
				</li>
				<li>
					<label>Nieuwe datum</label>
					<input type="date" placeholder="Nieuwe datum" name="NIdatum" maxlength="50">
				</li>
				<li>
					<label>Progressie</label>
					<div class="itemLijst">
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

									$sql = "SELECT progressie FROM planner WHERE school='$school' AND titel='$itemname'";

									if (mysqli_query($conn, $sql)) {

										$result = mysqli_query($conn, $sql);
										$row = mysqli_fetch_assoc($result);

										if (mysqli_num_rows($result) > 0) {
										    //save chapters
										    $hoofdstukkenRaw = $row['progressie'];
											$hoofdstukkenEdited = explode(", ", $hoofdstukkenRaw);
											array_pop($hoofdstukkenEdited);

											for($i=0; $i < count($hoofdstukkenEdited); $i++){
												echo '
												<li>
													<span class="item">'.$hoofdstukkenEdited[$i].'</span>
													<span class="delete">x</span>
												</li>
												';
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
					<input type="submit" value="Bevestig" id="editItemConfirm">
				</li>
				<li>
					<div class="center">
					</br></br>
						<div class="deleteItemButton">
							Verwijder opdracht
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
