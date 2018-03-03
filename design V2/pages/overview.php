<?php
	include('../components/headerGeneral.php');
	include('../scripts/DB_connect.php');
?>

<link rel="stylesheet" href="../css/overview.min.css">

<body>

	<div class="title">
		<h2>
			Overzicht
		</h2>
	</div>

	<div class="bar">
		<h3>
			Klassen
		</h3>
	</div>

	<div class="classOverview">
		<!-- the table as a whole -->
		<div class="table">

			<?php

				//if logged in show class
				//TODO check if person is teacher
				if (isset($_SESSION["username"])){

					$user = $_SESSION["username"];

					$klassen = [];
					$klassen['klas'] = [];

					$sql = "SELECT school, klas FROM users WHERE username='$user'";

					if (mysqli_query($conn, $sql)) {
						//find school of teacher
						$result = mysqli_query($conn, $sql);
						$result = mysqli_fetch_assoc($result);
						$school = $result['school'];

						$sql = "SELECT naam, username, klas FROM `users` WHERE school='$school' AND functie='leerling'";

						if (mysqli_query($conn, $sql)) {

							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {
							    // output data of each row of names with class

							    while($row = mysqli_fetch_assoc($result)) {
									$klas = $row["klas"];

									$naam = $row["naam"];
									$username = $row["username"];

									//add userinfo to right class
									$userinfo = ['naam'=>$naam, 'username'=>$username];

									$klassen['klas'][$klas][] = $userinfo;

							    }

							} else {
							    echo "0 results";
							}

							//How many classes are there?
							$Nclasses = count($klassen['klas']);

							//put the classes in the right order
							ksort($klassen['klas']);

							//Show me these (the nice way)
							$AllClasses = array_keys($klassen['klas']);

							for($i=0; $i < $Nclasses; $i++){
								$CurrentClass = $AllClasses[$i];

								$StudentsCurrentClass[] = $klassen['klas'][$CurrentClass];

								$NStudents = array_map("count", $StudentsCurrentClass);
								$NStudentsCurrentClass = ($NStudents[$i]);

								echo'
								<div class="class">
									<!-- table header for this class-->
									<div class="classHeader">
										<span class="klas">'.$CurrentClass.'</span>
										<span class="Nleerlingen">'.$NStudentsCurrentClass.' leerlingen </span>
										<span class="icons">
											<span class="Mail image"><img src="../icons/mail.svg"/></span>
											<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
										</span>
									</div>

									<!-- table content for this class-->
									<div class="classContent">';


									for($j=0; $j<$NStudentsCurrentClass; $j++){
										echo '

												<div class="row">
													<span class="name">'.$j.'</span>
													<span class="progress">icon</span>
												</div>

										';

									}

							echo '</div></div>';

							}

						} else {
							echo "Error with sql execution, please report to admin </br>";
						}

					} else {
						echo "Error with sql execution, please report to admin </br>";
					}

				} else {
					echo 'You are not a teacher or have no students';
				}

			?>

		</div>
	</div>

	<div class="bar">
		<h3>
			Groepen
		</h3>
	</div>

	<?php
	include('../components/footer.php');
	?>

</body>
