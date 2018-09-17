<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/edit.min.css">
<script src="updateClass.js"></script>

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
		<form class="changeClass" method="post" accept-charset="UTF-8">

			<ul>

			<li>
				<?php
					//show classes
					//if logged in show class
					if (isset($_SESSION["id"])){

						$id = $_SESSION["id"];

						$klassen = [];
						$klassen['klas'] = [];

						$sql = "SELECT school, functie FROM users WHERE id='$id'";

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
										if(!in_array($klas, $klassen) && $klas!=""){
											$klassen[] = $klas;
										}
									}
								}

								$Nclasses = count($klassen);

								//put the classes in the right order
								ksort($klassen);

								//output classes as option
								echo 'Klas: <div class="klasSelector"><select>';
								echo '<option value=""></option>';
								for($i=0; $i<$Nclasses; $i++){
									$CurrentClass = $klassen[$i];

									echo'
									<option value="'.$CurrentClass.'">'.$CurrentClass.'</option>
									';

								}
								echo '</select></div>';
							} else {
								echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							}
						} else {
							echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
						}
				   } else {
					   echo 'U bent niet ingelogd';
				   }

				?>
			</li>

			<li>
				<div class="leerlingSelector">Leerlingen:
					<!-- to be filled in by php with ajax -->
				</div>
			</li>
			<li>
				Nieuwe klas:</br>
				<input type="text" class="Nclass" name="Nclass"/>
			</li>
			<li>
				<button type="submit">Update</button>
			</li>
		</ul>
	</form>

	</div>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>
