<?php
	include('../components/headerGeneral.php');
	include('../scripts/DB_connect.php');
?>

<link rel="stylesheet" href="../css/planner.min.css">

<body>

	<div class="title">
		<h2>
			Planner
		</h2>
	</div>

	<div class="bar">
		<h3>
			Planning
		</h3>
	</div>

	<div class="items">
		<div class="table">

			<!--
			<div class="item">
				<div class="itemHeader">
					<!- - table header for this class- ->
					<div class="itemHeaderContent">
						<span class="datum">4-3-18</span>
						<span class="naam">Kdsgjichjkkq</span>
						<span class="icons">
							<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
							<span class="Edit image"><img src="../icons/edit.svg" class="arrow"/></span>
						</span>
					</div>

					<!- - table content for this class- ->
					<div class="itemContent">

						<div class="itemInhoud">
							<span class="itemBeschrijving">
								kjasdkl;jfkjsadkjfg8isduhgkshndtgi
							</span>
						</div>
					</div>
				</div>
			</div>
		-->



		<?php
			if (isset($_SESSION["username"])){

				$user = $_SESSION["username"];

				$klassen = [];
				$klassen['klas'] = [];

				$sql = "SELECT school, klas, functie FROM users WHERE username='$user'";

				if (mysqli_query($conn, $sql)) {
					//find teacher info
					$result = mysqli_query($conn, $sql);
					$result = mysqli_fetch_assoc($result);
					$Pschool = $result['school'];
					$Pklas = $result['klas'];
					$Pfunctie = $result['functie'];

					$sql = "SELECT titel, beschrijving, datum, klas FROM planner WHERE school='$Pschool'";

					if (mysqli_query($conn, $sql)) {
						//get planner info
						$result = mysqli_query($conn, $sql);
						$Nitems = mysqli_num_rows($result);

						if (mysqli_num_rows($result) > 0) {
						    // output data of each row
						    while($row = mysqli_fetch_assoc($result)) {
								$Ititel = $row['titel'];
								$Ibeschrijving = $row['beschrijving'];
								$Idatum = date('d/m', strtotime($row['datum']));
								$Iklas = $row['klas'];

								if($Iklas == $Pklas or $Iklas == ""){
									if($Pfunctie == "leerling"){
										echo '
										<div class="item">
											<div class="itemHeader">
												<!-- table header for this class-->
												<div class="itemHeaderContent">
													<span class="datum">'.$Idatum.'</span>
													<span class="naam">'.$Ititel.'</span>
													<span class="icons">
														<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
													</span>
												</div>

												<!-- table content for this class-->
												<div class="itemContent">

													<div class="itemInhoud">
														<span class="itemBeschrijving">
															'.$Ibeschrijving.'
														</span>
													</div>
												</div>
											</div>
										</div>
										';
									}
								}

								if($Pfunctie == "docent"){
									echo '
									<div class="item">
										<div class="itemHeader">
											<!-- table header for this class-->
											<div class="itemHeaderContent">
												<span class="datum">'.$Idatum.'</span>
												<span class="naam">'.$Ititel.'</span>
												<span class="icons">
													<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
													<span class="editItem image"><img src="../icons/edit.svg" class="edit"/></span>
												</span>
											</div>

											<!-- table content for this class-->
											<div class="itemContent">

												<div class="itemInhoud">
													<span class="itemBeschrijving">
														'.$Ibeschrijving.'
													</span>
												</div>
											</div>
										</div>
									</div>
									';

								}
							}
						}

					} else {
						echo "SQL error, report to admin";
					}


				} else {
					echo "SQL error, report to admin";
				}
			} else {
				echo "U bent niet ingelogd";
			}

		?>

		</div>

		<?php
			//if logged in show groups
			//TODO check if person is teacher
			if (isset($_SESSION["username"])){
				echo '
				<form class="addItemButton" method="post" action="../scripts/createItemFront.php">
					<input type="submit" value="Nieuw item">
				</form>
				';
			}

		?>
	</div>






	<?php
	include('../components/footerGeneral.php');
	?>

</body>
