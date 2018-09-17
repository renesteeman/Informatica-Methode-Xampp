<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/overview.min.css">

<head>
	<meta name="description" content="Een overzicht voor docenten waar alle klassen en groepen duidelijk zijn weergegeven en de progressie van leerlingen kan worden bijgehouden." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk, overzicht" />
	<meta name="author" content="René Steeman" />
</head>

<body>

	<div class="title">
		<h2>
			Overzicht
		</h2>
	</div>

	<div class="bar">
		<h3>
			Individuele leerling
		</h3>
	</div>

	<div class="searchWrap">
		<input type="text" class="searchInput" placeholder="Zoek op naam">

		<div class="searchResult">
			<div class="searchResultNaam">
				Naam
			</div>
			<div class="searchResultKlas">
				Klas
			</div>
			<div class="searchResultActiviteit">
				Actief? Nee? -> Laatst online op X om Y
			</div>
			<div class="searchResultGroep">
				Groepnaam
				<div class="searchResultGroepInhoud">
					<div class="searchResultGroepInhoudItem">
						<span class="searchResultGroepInhoudLeden">lid1</span>
						<span class="searchResultGroepInhoudRollen">rol1</span>
					</div>
					<div class="searchResultGroepInhoudItem">
						<span class="searchResultGroepInhoudLeden">lid2</span>
						<span class="searchResultGroepInhoudRollen">rol2</span>
					</div>
				</div>
			</div>
			<div class="searchResultQuiz">
				Quiz resultaten
				<div class="searchResultQuizInhoud">
					<div class="searchResultQuizInhoudItem">
						<span class="searchResultQuizInhoudHoofdstuk">H1</span>
						<span class="searchResultQuizInhoudCijfer">cijfer1</span>
					</div>
					<div class="searchResultQuizInhoudItem">
						<span class="searchResultQuizInhoudHoofdstuk">H2</span>
						<span class="searchResultQuizInhoudCijfer">cijfer2</span>
					</div>
				</div>
			</div>
			<div class="searchResultProgressie">
				Theorie progressie
				<div class="searchResultProgressieInhoud">
					<div class="searchResultProgressieInhoudItem">
						<span class="searchResultProgressieInhoudHoofdstuk">H1</span>
						<span class="searchResultProgressieInhoudPercentage">%</span>
						<div class="searchResultProgressieInhoudHoofstukItem">
							<span class="searchResultProgressieInhoudHoofstukParagraaf">§1</span>
							<span class="searchResultProgressieInhoudHoofstukAf">af?</span>
						</div>
					</div>
				</div>
			</div>



		</div>
	</div>

	<div class="bar">
		<h3>
			Klassen
		</h3>
	</div>

	<div class="overzicht">
		<!-- the table as a whole -->
		<div class="table">
			<!--
			<div class="headerRow klassen">
				<!- table header for this class->
				<div class="headerRowContent">
					<span class="klas">klas</span>
					<span class="Nleerlingen">aantal leerlingen</span>
					<span class="icons">
						<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
					</span>
				</div>

				<!- table content for this class->
				<div class="rowContent">

					<div class="row">
						<span class="name">René Steeman</span>
						<span class="groepnaam">Inforca</span>
						<span class="groepnaam">Leider</span>
						<span class="gemiddelde">10,0</span>
						<span class="progressie"><span class="onSchedule"></span></span>
					</div>

				</div>
			</div>
		-->

			<?php
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
						$functie = $result['functie'];

						if($functie != 'docent'){
							echo "U bent geen docent";
						} else {
							$sql = "SELECT id, naam, klas, group_role, group_name FROM `users` WHERE school='$school' AND functie='leerling'";

							if (mysqli_query($conn, $sql)) {

								$result = mysqli_query($conn, $sql);

								if (mysqli_num_rows($result) > 0) {
								    // output data of each row of names with class

								    while($row = mysqli_fetch_assoc($result)) {
										$Cid = $row["id"];
										$Cnaam = $row["naam"];
										$Cklas = $row["klas"];
										$group_role = $row["group_role"];
										$group_name = $row["group_name"];
										$gemiddeldePunt = 0;
										$hoofdstukkenAf = [];
										$onSchedule = 1;

										//save info from user
										$userinfo = ['naam'=>$Cnaam, 'klas'=>$Cklas, 'group_role'=>$group_role, 'group_name'=>$group_name];

										//get more info cijfer
										$sql2 = "SELECT cijfer FROM `quiz` WHERE userid='$Cid'";

										//get info from other tables
										if (mysqli_query($conn, $sql2)) {
											$result2 = mysqli_query($conn, $sql2);

											if(mysqli_num_rows($result2)>0){
												$punten = [];
												$totaalCijfers = 0;

												while($row2 = mysqli_fetch_assoc($result2)) {
													$punt = $row2["cijfer"];
													$punten[] = $punt;
												}

												$count = count($punten);
												for($i=0; $i<$count; $i++){
													$totaalCijfers += $punten[$i];
												}

												$gemiddeldePunt = $totaalCijfers/count($punten);
											}

										} else {
											echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
										}

										//get more info progression
										$sql3 = "SELECT H1, H2, H3, H4, H5, H6, H7 FROM `progressie` WHERE userid='$Cid'";

										//get/calculate completed chapters
										if (mysqli_query($conn, $sql3)) {
											$result3 = mysqli_query($conn, $sql3);

											if(mysqli_num_rows($result3)>0){
												$hoofdstukken = [];

												while($row3 = mysqli_fetch_assoc($result3)) {
													$hoofdstukken['H1'] = $row3["H1"];
													$hoofdstukken['H2'] = $row3["H2"];
													$hoofdstukken['H3'] = $row3["H3"];
													$hoofdstukken['H4'] = $row3["H4"];
													$hoofdstukken['H5'] = $row3["H5"];
													$hoofdstukken['H6'] = $row3["H6"];
													$hoofdstukken['H7'] = $row3["H7"];
												}

												$count2 = count($hoofdstukken);
												for($i=1; $i<$count2; $i++){
													if($hoofdstukken['H'.$i]){
														$hoofdstuk = $hoofdstukken['H'.$i];
														$hoofdstukLength = $hoofdstuk[0];
														$hoofdstuk = substr($hoofdstuk, 1);
														$hoofdstukAfTotaal = 0;
														for($j=0; $j<$hoofdstukLength; $j++){
															if($hoofdstuk[$j] == '1'){
																$hoofdstukAfTotaal++;
															}
														}
														if($hoofdstukAfTotaal == $hoofdstukLength){
															$hoofdstukkenAf['H'.$i] = 1;
														}
													}
												}
											}

										} else {
											echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
										}

										//get more info about chapters that should have been completed
										$sql4 = "SELECT progressie FROM `planner` WHERE school='$school' AND klas='$Cklas'";

										//get chapters that should be done
										if (mysqli_query($conn, $sql4)) {
											$result4 = mysqli_query($conn, $sql4);
											$chapterToBeMade = [];

											if(mysqli_num_rows($result4)>0){
												while($row4 = mysqli_fetch_assoc($result4)) {
													$progressie = $row4['progressie'];
													$chapterToBeMade = explode(", ", $progressie );
												}
											}

											$count3 = count($chapterToBeMade);
											for($i=0; $i<$count3-1;$i++){
												$shouldBeComplete = $chapterToBeMade[$i];
												$shouldBeComplete = substr($shouldBeComplete, 1);

												if(!array_key_exists("H".$shouldBeComplete, $hoofdstukkenAf)){
													$onSchedule = 0;
												}
											}

										} else {
											echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
										}

										//save the info
										$userinfo['onSchedule'] = $onSchedule;
										$userinfo['gemiddeldePunt'] = $gemiddeldePunt;

										$klassen['klas'][$Cklas][] = $userinfo;

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
									<div class="headerRow klassen">
										<!-- table header for this class-->
										<div class="headerRowContent">
											<span class="klas">'.$CurrentClass.'</span>
											<span class="Nleerlingen">'.$NStudentsCurrentClass.' leerlingen </span>
											<span class="icons">
												<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
											</span>
										</div>

										<!-- table content for this class-->
										<div class="rowContent">';


										for($j=0; $j<$NStudentsCurrentClass; $j++){
											$Cstudent = $StudentsCurrentClass[$i][$j];
											$CstudentName = $Cstudent['naam'];
											$CstudentGroupName = $Cstudent['group_name'];
											$CstudentGroupRole= $Cstudent['group_role'];
											$ConSchedule = $Cstudent['onSchedule'];
											$Caverage = $Cstudent['gemiddeldePunt'];

											if($CstudentGroupName==""){
												$CstudentGroupName = "zit niet in een groep";
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
											}

											echo '</div>';

										}
								echo '</div></div>';
								}

							} else {
								echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							}
						}

					} else {
						echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					}

				} else {
					echo 'U bent niet ingelogd';
				}

			?>

		</div>

		<?php

			//if logged in show add group button
			if (isset($_SESSION["functie"])){
				if($functie != 'docent'){
					echo "U bent geen docent";
				} else {
					echo '
					<form class="changeClassButton" method="post" action="../scripts/changeClassFront.php">
						<button type="submit">Leerling(en) van klas veranderen</button>
					</form>
					<form class="deleteStudentsButton" method="post" action="../scripts/deleteStudentsFront.php">
						<button type="submit">Account(s) van leerling(en) verwijderen</button>
					</form>
					';
				}
			}

		?>


	</div>

	<div class="bar">
		<h3>
			Groepen
		</h3>
	</div>

	<div class="overzicht">
		<!-- the table as a whole -->
		<div class="table">

			<?php

				//if logged in show class
				if (isset($_SESSION["id"])){

					$id = $_SESSION["id"];

					$userSchool = "";

					//get school from teacher
					$sql = "SELECT school, functie FROM users WHERE id='$id'";

					if (mysqli_query($conn, $sql)) {

						$result = mysqli_query($conn, $sql);
						$result = mysqli_fetch_assoc($result);
						$userSchool = $result['school'];
						$userFunctie = $result['functie'];

						if($userFunctie != 'docent'){
							echo "U bent geen docent";
						} else {
							$groepen = [];

							$sql = "SELECT naam, beschrijving, link FROM groepen WHERE school='$userSchool'";

							if (mysqli_query($conn, $sql)) {
								//load groups
								$result = mysqli_query($conn, $sql);

								if(mysqli_num_rows($result) > 0){

									while($row = mysqli_fetch_assoc($result)) {
										$Gnaam = $row["naam"];
										$Gbeschrijving = $row["beschrijving"];
										$Glink = $row["link"];

										//add group to array
										$groupInfo = ['beschrijving'=>$Gbeschrijving, 'link'=>$Glink];

										$groepen['groep'][$Gnaam][] = $groupInfo;
									}

									//number of groups
									$Ngroepen = count($groepen['groep']);

									//sort groups
									ksort($groepen['groep']);

									//get group names
									$AllGroups = array_keys($groepen['groep']);

									//show these groups
									for($i=0; $i<$Ngroepen; $i++){
										$CurrentGroupName = $AllGroups[$i];

										$sql = "SELECT naam, klas, group_role FROM users WHERE group_name='$CurrentGroupName'";

										if (mysqli_query($conn, $sql)) {
											$result = mysqli_query($conn, $sql);

											$NMembersCurrentGroup = mysqli_num_rows($result);
											$classesInGroup = [];

											$studentInfoForGroup = [];

											while ($row = mysqli_fetch_assoc($result)) {
												$Cklas = $row['klas'];
												$Cname = $row['naam'];
												$Cfunction = $row['group_role'];

												$CstudentInfoForGroup = ['naam'=>$Cname, 'klas'=>$Cklas, 'group_role'=>$Cfunction, 'functie'=>$Cfunction];

												array_push($studentInfoForGroup, $CstudentInfoForGroup);

												if(!in_array($Cklas, $classesInGroup)){
													array_push($classesInGroup, $Cklas);
												}

											}

										} else {
											$NMembersCurrentGroup = 0;
											echo "Geen groepsleden gevonden";
										}

										echo'

										<div class="headerRow groepen">
											<!-- table header for this class-->
											<div class="headerRowContent">
												<span class="groep">'.$CurrentGroupName.'</span>
												<span class="Nleden">'.$NMembersCurrentGroup.' groepsleden </span>
												<span class="klassen">';

												foreach ($classesInGroup as $class) {
												    echo $class." ";
												};

										echo'
											</span>
												<span class="icons">
													<span class="Arrow image"><img src="../icons/arrow.svg"></span>
													<span class="editGroup image"><img src="../icons/edit.svg"></span>
												</span>
											</div>';

										$CGroupDescription = $groepen['groep'][$CurrentGroupName][0]['beschrijving'];
										$CGroupLink = $groepen['groep'][$CurrentGroupName][0]['link'];

										echo '
											<!-- table content for this class-->
											<div class="rowContent">

												<div class="groepInhoud">
													<span class="groepsBeschrijving">
														'.$CGroupDescription.'
													</span>
													<span class="groepsLink">
														<a href="'.$CGroupLink.'">
															'.$CGroupLink.'
														</a>
													</span>
												</div>';

											for($j=0; $j<$NMembersCurrentGroup; $j++){

												$CmemberName = $studentInfoForGroup[$j]['naam'];
												$CstudentClass = $studentInfoForGroup[$j]['klas'];
												$CstudentRole = $studentInfoForGroup[$j]['group_role'];

												echo '

													<div class="row">
														<span class="name">'.$CmemberName.'</span>
														<span class="class">'.$CstudentClass.'</span>
														<span class="role">'.$CstudentRole.'</span>
													</div>

												';

											}

										echo '</div></div>';

									}

								} else {
									echo '
									<div class="headerRow groepen">
										<div class="headerRowContent">
											<span>Geen groepen gevonden</span>
										</div>
									</div>';

								}

							} else {
								echo "Error with sql execution, please report to admin </br>";
							}
						}

					} else {
						echo "Error with sql execution, please report to admin </br>";
					}

				} else {
					echo 'U bent niet ingelogd';
				}

			?>

		</div>

			<?php

				//if logged in show add group button
				if (isset($_SESSION["functie"])){
					if($functie != 'docent'){
						echo "U bent geen docent";
					} else {
						echo '
						<form class="addGroupButton" method="post" action="../scripts/createGroupFront.php">
							<button type="submit">Nieuwe groep</button>
						</form>
						';
					}
				}

			?>

	</div>

	<?php
		include('../components/footerGeneral.php');
	?>

	<script src="../scripts/searchStudent.js" defer></script>

</body>
