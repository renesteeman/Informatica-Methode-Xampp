<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/planner.min.css">

<head>
	<meta name="description" content="Een planner waarop leerlingen kunnen zien wat voor wanneer af moet zijn en docenten opdrachten kunnen toevoegen." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk, overzicht, planner" />
	<meta name="author" content="René Steeman" />
</head>

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
			if (isset($_SESSION["id"])){

				$id = $_SESSION["id"];

				$klassen = [];
				$klassen['klas'] = [];

				$sql = "SELECT school, klas, functie FROM users WHERE id='$id'";

				if (mysqli_query($conn, $sql)) {
					//find teacher info
					$result = mysqli_query($conn, $sql);
					$result = mysqli_fetch_assoc($result);
					$Pschool = $result['school'];
					$Pklas = $result['klas'];
					$Pfunctie = $result['functie'];

					if($Pfunctie == 'leerling'){
						$sql = "SELECT * FROM planner WHERE school='$Pschool' AND klas='$Pklas' ORDER BY datum DESC";
					} else if ($Pfunctie == 'docent') {
						$sql = "SELECT * FROM planner WHERE school='$Pschool' ORDER BY datum DESC";
					}

					if (mysqli_query($conn, $sql)) {
						//get planner info
						$result = mysqli_query($conn, $sql);
						$Nitems = mysqli_num_rows($result);

						$Cdate = date("Y-m-d");
						$Cdate = strtotime($Cdate);

						if(mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
								$Ititel = $row['titel'];
								$itemID = $row['id'];
								$Ibeschrijving = $row['beschrijving'];
								$Idatum = date('d-m-y', strtotime($row['datum']));
								$IdatumCompare = strtotime($row['datum']);
								$Iklas = $row['klas'];
								$Iprogressie = $row['progressie'];
								//remove last comma
								$Ihoofdstukken = substr($Iprogressie, 0, -2);

								if($IdatumCompare < $Cdate){
									echo '
										<div class="item old">
									';
								} else {
									echo '
										<div class="item">
									';
								}

								if($Pfunctie == 'docent'){
								echo '
									<div class="itemHeader docent">
								';
								} else {
								echo '
									<div class="itemHeader leerling">
								';
								}

								$Idatum = substr($Idatum, 0, -3);

								echo '

										<!-- table header for this class-->
										<div class="itemHeaderContent">
											<span class="hide DateCompare">'.$IdatumCompare.'</span>
											<span class="hide itemID">'.$itemID.'</span>
											<span class="datum">'.$Idatum.'</span>
											<span class="klas">'.$Iklas.'</span>
											<span class="naam">'.$Ititel.'</span>
											<span class="hoofdstukken">'.$Ihoofdstukken.'</span>
											<span class="icons">
												<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>';

												if($Pfunctie == 'docent'){
												echo '
												<span class="editItem image"><img src="../icons/edit.svg" class="edit"/></span>
												';
												}

										echo '
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
						} else {
							//no 'items' found
							echo '
								<div class="item">
									<div class="itemHeader">
										<div class="itemHeaderContent">
											<span>Geen opdrachten gevonden</span>
										</div>
									</div>
								</div>
							';
						}

					} else {
						echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					}
				} else {
					echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
				}
			} else {
				echo "U bent niet ingelogd";
			}

		?>

		</div>

		<?php
			//if logged in show groups
			if ($Pfunctie == 'docent'){
				if (isset($_SESSION["id"])){
					echo '
					<form class="addItemButton" method="post" action="../scripts/createItemFront.php">
						<button type="submit">Nieuwe opdracht</button>
					</form>
					';
				}
			}

		?>
	</div>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>

<script src="../scripts/planner.js"></script>
