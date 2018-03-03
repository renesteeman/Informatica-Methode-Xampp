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

				$klassen = array();

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
								$naam = $row["naam"];
								$klas = $row["klas"];
								$username = $row["username"];

								//for each different class add a class dimension to the array
								if(!array_key_exists($klas, $klassen)){
									$klassen[$klas] = [];
								}

								//add userinfo to right class
								$userinfo = array($naam, $klas, $username);

								$klassen[$klas][] = $userinfo;
						    }

						} else {
						    echo "0 results";
						}

						//How many classes are there?
						$Nclasses = count($klassen);

						print_r ($klassen['H51']);

						//Show me these (the nice way)
						for($i=0; $i < $Nclasses; $i++){
							//$className = $klassen[$i];
							//echo $className;

							echo'
							<div class="class">
								<!-- table header for this class-->
								<div class="classHeader">
									<span class="klas">Klas</span>
									<span class="Nleerlingen">X leerlingen </span>
									<span class="icons">
										<span class="Mail image"><img src="../icons/mail.svg"/></span>
										<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
									</span>
								</div>

								<!-- table content for this class-->
								<div class="classContent">
									<div class="row">
										<span class="name">Student</span>
										<span class="progress">icon</span>
									</div>
								</div>
							</div>

							';
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


			<!-- one class-->
			<div class="class">
				<!-- table header for this class-->
				<div class="classHeader">
					<span class="klas">Klas</span>
					<span class="Nleerlingen">X leerlingen </span>
					<span class="icons">
						<span class="Mail image"><img src="../icons/mail.svg"/></span>
						<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
					</span>
				</div>

				<!-- table content for this class-->
				<div class="classContent">
					<div class="row">
						<span class="name">Student</span>
						<span class="progress">icon</span>
					</div>
					<div class="row">
						<span class="name">Student</span>
						<span class="progress">icon</span>
					</div>
					<div class="row">
						<span class="name">Student</span>
						<span class="progress">icon</span>
					</div>
					<div class="row">
						<span class="name">Student</span>
						<span class="progress">icon</span>
					</div>
				</div>
			</div>
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
