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


			<?php
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
						$functie = $result['functie'];

						if($functie != 'docent'){
							echo "U bent geen docent";
						} else {
							$sql = "SELECT naam, klas FROM `users` WHERE school='$school' AND functie='leerling'";

							if (mysqli_query($conn, $sql)) {

								$result = mysqli_query($conn, $sql);

								if (mysqli_num_rows($result) > 0) {
									// output data of each row of names with class

									while($row = mysqli_fetch_assoc($result)) {
										$klas = $row["klas"];
										$naam = $row["naam"];

										//save info from user
										$userinfo = ['naam'=>$naam, 'klas'=>$klas];

										//save info
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

								echo 'Klas: <div class="klasSelector"><select>';


								for($i=0; $i < $Nclasses; $i++){
									$CurrentClass = $AllClasses[$i];

									echo'
									<option value="'.$CurrentClass.'">'.$CurrentClass.'</option>
									';

								}

								echo '</select></div>';

							} else {
								echo "SQL error, report to admin";
							}
						}
					} else {
						echo "SQL error, report to admin";
					}
			   } else {
				   echo 'U bent niet ingelogd';
			   }

			   /*
				  for($j=0; $j<$NStudentsCurrentClass; $j++){
					  $Cstudent = $StudentsCurrentClass[$i][$j];
					  $CstudentName = $Cstudent['naam'];
					  $CstudentGroupName = $Cstudent['group_name'];
					  $CstudentGroupRole= $Cstudent['group_role'];
					  $ConSchedule = $Cstudent['onSchedule'];
					  $Caverage = $Cstudent['gemiddeldePunt'];

					  if($CstudentGroupName==""){
						  $CstudentGroupName = "zit niet in een groep";
						  $CstudentGroupRole = "";
					  }

					  echo '

					  <div class="row">
						  <span class="name">'.$CstudentName.'</span>
						  <span class="groepnaam">'.$CstudentGroupName.'</span>
						  <span class="groepsrol">'.$CstudentGroupRole.'</span>
						  <span class="gemiddelde">'.$Caverage.'</span>';

					  if($ConSchedule){
						  echo '
						  <span class="progressie">
							  <span class="onSchedule"></span>
						  </span>
						  ';
					  } else {
						  echo '
						  <span class="progressie">
							  <span class="notSchedule"></span>
						  </span>
						  ';
					  } */

			?>



				<div class="leerlingSelector">
					Leerlingen:
					<div class="leerling">
						<label class="container">L1
							<input type="checkbox" class="single-select-checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="leerling">
						<label class="container">L1
							<input type="checkbox" class="single-select-checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>

				Nieuwe klas:</br>
				<input type="text" />

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
