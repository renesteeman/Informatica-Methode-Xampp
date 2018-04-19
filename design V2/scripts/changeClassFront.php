<?php
	include('../components/headerGeneral.php');
	include('../scripts/DB_connect.php');
?>

<link rel="stylesheet" href="../css/changeClass.min.css">

<head>
	<meta name="description" content="Een informatica methode met structuur en keuze. Voor docenten is er een duidelijk overzicht en leerlingen kunnen zich specialiseren in wat ze interessant vinden, zonder de basis te missen." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk" />
	<meta name="author" content="René Steeman" />
</head>

<body>

	<div class="title">
		<h2>
			Leerlingen informatie wijzigen
		</h2>
	</div>

	<div class="bar">
		<h3>
			Klas wijzigen
		</h3>
	</div>

	<div class="main">
		<form class="accountSettingsForm" method="post" action="../scripts/updateAccount.php" accept-charset="UTF-8">

			<ul>

			<li>
				<?php
					//show classes


					//if logged in show class
					if (isset($_SESSION["username"])){

						$user = $_SESSION["username"];

						$klassen = [];
						$klassen['klas'] = [];

						$sql = "SELECT school, functie FROM users WHERE username='$user'";

						if (mysqli_query($conn, $sql)) {
							//find school of teacher
							$result = mysqli_query($conn, $sql);
							$result = mysqli_fetch_assoc($result);
							$school = $result['school'];

							$sql = "SELECT klas FROM users WHERE school='$school'";

							if (mysqli_query($conn, $sql)) {
								//find school of teacher
								$result = mysqli_query($conn, $sql);
								$klassen = [];

								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										$klas = $row['klas'];
										if(!in_array($klas, $klassen)){
											$klassen[] = $klas;
										}
									}
								}

								$Nclasses = count($klassen);

								//put the classes in the right order
								ksort($klassen);

								//output classes as option
								echo 'Klas: <div class="klasSelector"><select>';
								for($i=0; $i<$Nclasses; $i++){
									$CurrentClass = $klassen[$i];

									echo'
									<option value="'.$CurrentClass.'">'.$CurrentClass.'</option>
									';

								}
								echo '</select></div>';
							} else {
								echo "SQL error, report to admin";
							}
						} else {
							echo "SQL error, report to admin";
						}
				   } else {
					   echo 'U bent niet ingelogd';
				   }

				?>
			</li>

			<li>
				<div class="leerlingSelector">Leerlingen:
					<div class="leerling">
						<label class="container">Naam
							<input type="checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</li>
			<li>
				Nieuwe klas:</br>
				<input type="text" />
			</li>
			<li>
				<input type="submit" value="update">
			</li>
		</ul>
	</form>

	</div>



	<?php
	include('../components/footerGeneral.php');
	?>

</body>
