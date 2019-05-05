<?php
	include('../components/headerGeneral.php');

	if($_SESSION['functie'] != 'docent'){
		header('Location: ../index.php');
	}

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
		<input type="text" class="searchInput" placeholder="Zoek op naam" list="searchStudentDatalist">
		<datalist id='searchStudentDatalist'>
			<!-- filled by php -->
		</datalist>

		<div class="searchResult">

			<div class="searchResultNaam">
				Naam
			</div>

			<div class="searchResultKlas">
				Klas
			</div>

			<div class="searchResultMail">
				E-mail
			</div>

			<div class="searchResultActiviteit">
				Laatst actief
			</div>

			<div class="searchResultGroepsrol">
				Groepsrol
			</div>

			<div class="searchResultGroep">
				<div class="searchResultHeader">
					<span class="barItem searchResultGroupName">Groepnaam</span>
					<span class="icons hide">
						<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
					</span>
				</div>

				<div class="searchResultInhoud searchResultGroepInhoud">

				</div>
			</div>

			<div class="searchResultQuiz">

				<div class="searchResultHeader">
					<span class="barItem searchResultQuizHeader">Quiz resultaten</span>
					<span class="icons hide">
						<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
					</span>
				</div>

				<div class="searchResultInhoud searchResultQuizInhoud">

				</div>
			</div>

			<div class="searchResultProgressie">

				<div class="searchResultHeader">
					<span class="barItem searchResultProgression">Theorie progressie</span>
					<span class="icons hide">
						<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
					</span>
				</div>

				<div class="searchResultProgressionInhoud">

				</div>
			</div>
		</div>
	</div>

	<?php
	echo "
	<div class='bar'>
		<h3>
			Klassen
		</h3>
	</div>

	<div class='overzicht'>
		<div class='table'>";
		//if logged in show class
		if (isset($_SESSION["id"])){
			$id = check_input($_SESSION["id"]);
			$klassen = [];
			$teMakenKlassen = [];
			$groepen = [];

			$sql = "SELECT school, functie FROM users WHERE id='$id'";

			if (mysqli_query($conn, $sql)) {
				//find school of teacher
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$school = $result['school'];
				$functie = $result['functie'];

				if($functie=='docent'){
					//haal het huiswerk per klas op
					$now = date("Y-m-d");
					//get more info about chapters that should have been completed
					$sql = "SELECT progressie, klas FROM `planner` WHERE school='$school' AND datum<'$now'";

					//get chapters that should be done
					if (mysqli_query($conn, $sql)) {
						$result = mysqli_query($conn, $sql);

						if(mysqli_num_rows($result)>0){
							while($row = mysqli_fetch_assoc($result)) {
								$Cprogressie = $row['progressie'];
								$Cklas = $row['klas'];

								$teMakenKlassen[$Cklas] = $Cprogressie;
							}
						}
					} else {
						echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					}

					//haal per leerling de data op
					$sql = "SELECT id, naam, klas, group_role, group_id FROM `users` WHERE school='$school' AND functie='leerling'";

					if (mysqli_query($conn, $sql)) {
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
					    // output data of each row of names with class
					    while($row = mysqli_fetch_assoc($result)) {
								$Cid = $row["id"];
								$Cnaam = $row["naam"];
								$Cklas = $row["klas"];
								$group_role = $row["group_role"];
								$group_id = $row["group_id"];
								$gemiddeldePunt = 0;
								$hoofdstukkenAf = [];
								$onSchedule = 1;

								//get cijfers
								$sql2 = "SELECT cijfer FROM quiz_results WHERE userid='$Cid'";

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

										for($i=0; $i<count($punten); $i++){
											$totaalCijfers += $punten[$i];
										}

										$gemiddeldePunt = $totaalCijfers/count($punten);
									}

								} else {
									echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
								}

								//get more info progression
								$sql3 = "SELECT chapter_id, progress FROM `progressie` WHERE userid='$Cid'";

								//get completed chapters
								if (mysqli_query($conn, $sql3)) {
									$result3 = mysqli_query($conn, $sql3);

									if(mysqli_num_rows($result3)>0){
										while($hoofdstuk = mysqli_fetch_assoc($result3)) {
											$hoofstukkenKeys = array_keys($hoofdstuk);

											//get chapter_id
											$Cchapter_id = $hoofdstuk[$hoofstukkenKeys[0]];

											//get progress
											$Cchapter_progress = $hoofdstuk[$hoofstukkenKeys[1]];

											$hoofdstukLength = strlen($Cchapter_progress);

											$paragrafenAf = 0;
											for($j=0; $j<$hoofdstukLength; $j++){
												if($Cchapter_progress[$j] == '1'){
													$paragrafenAf++;
												}
											}

											if($paragrafenAf == $hoofdstukLength && $hoofdstukLength != 0){
												//als het hoofdstuk af is, voeg het dan toe aan afgemaakte hoofdstukken
												$sql4 = "SELECT hoofdstuk FROM theorie_hoofdstukken WHERE hoofdstuk_id='$Cchapter_id'";

												//get/calculate completed chapters
												if (mysqli_query($conn, $sql4)) {
													$result4 = mysqli_query($conn, $sql4);
													$result4 = mysqli_fetch_assoc($result4);
													$CchapterName = $result4['hoofdstuk'];

													$hoofdstukkenAf[] = $CchapterName;
												} else {
													echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
												}
											}
										}
									}

								} else {
									echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
								}

								//check if the THEORIEwork is done
								$CTHEORIEwork = [];

								//check what should have been done
								$teMakenKlassenKeys = array_keys($teMakenKlassen);
								if(in_array($Cklas, $teMakenKlassenKeys)){
									//get text
									$CTHEORIEwork = $teMakenKlassen[$Cklas];

									//clean text up
									$CTHEORIEwork = trim($CTHEORIEwork);
									$CTHEORIEwork = rtrim($CTHEORIEwork, ",");

									//transform text into an array
									$CTHEORIEwork = explode(",", $CTHEORIEwork);
								}

								for($i=0; $i<count($CTHEORIEwork);$i++){
									$shouldBeComplete = $CTHEORIEwork[$i];
									$shouldBeComplete = trim($shouldBeComplete);

									if(!in_array($shouldBeComplete, $hoofdstukkenAf)){
										$onSchedule = 0;
									}
								}

								//save the info
								$userinfo = ['naam'=>$Cnaam, 'klas'=>$Cklas, 'group_role'=>$group_role, 'group_id'=>$group_id, 'onSchedule'=>$onSchedule, 'gemiddeldePunt'=>$gemiddeldePunt];

								$klassen[$Cklas][] = $userinfo;
					    }

							//get groups at once, instead of per student
							$klassenKeys = array_keys($klassen);




							$sql5 = "SELECT id, naam, beschrijving, link FROM groepen WHERE school='$school'";
							if (mysqli_query($conn, $sql5)) {
								$result5 = mysqli_query($conn, $sql5);
								while ($row = mysqli_fetch_assoc($result5)) {
									$Cgroup_id = $row['id'];
									$CgroupNaam = $row['naam'];
									$CgroupBeschrijving = $row['beschrijving'];
									$CgroupLink = $row['link'];

									$groepen[$Cgroup_id] = [$CgroupNaam, $CgroupBeschrijving, $CgroupLink, $Cgroup_id];
								}
							} else {
								echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							}

							//per class
							for($j=0; $j<count($klassen); $j++){
								//per student
							  for($k=0; $k<count($klassen[$klassenKeys[$j]]); $k++){
							    $Cstudent = $klassen[$klassenKeys[$j]][$k];
									$Cgroup_id = $Cstudent['group_id'];
									$groepenKeys = array_keys($groepen);

									if(!array_search($Cgroup_id, $groepenKeys) === False AND !is_null($Cgroup_id)){
										//if the group is known, use that info
										$index = array_search($Cgroup_id, $groepenKeys);
										$klassen[$klassenKeys[$j]][$k]['group_name'] = $groepen[$index][0];
									} else {
										$klassen[$klassenKeys[$j]][$k]['group_name'] = "";
									}

							  }
							}

						} else {
					    echo "0 results";
						}

						//How many classes are there?
						$Nclasses = count($klassen);

						//put the classes in the right order
						ksort($klassen);

						//Show me these (the nice way)
						$AllClasses = array_keys($klassen);

						for($i=0; $i < $Nclasses; $i++){
							$CurrentClass = $AllClasses[$i];

							$StudentsCurrentClass[] = $klassen[$CurrentClass];

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
							<span class="notOnSchedule"></span>
						</span>
						';
									}

					echo '</div>';

								}
				echo '</div>';
			echo '</div>';
						}

					} else {
						echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					}

		echo '</div>';

					//show add group button
		echo '
		<form class="changeClassButton" method="post" action="../scripts/changeClassFront.php">
			<button type="submit">Leerling(en) van klas veranderen</button>
		</form>
		<form class="deleteStudentsButton" method="post" action="../scripts/deleteStudentsFront.php">
			<button type="submit" class="redButton">Account(s) van leerling(en) verwijderen</button>
		</form>
		';

					//show groups
		echo "
		</div>

		<div class='bar'>
			<h3>
				Groepen
			</h3>
		</div>

		<div class='overzicht'>
			<!-- the table as a whole -->
			<div class='table'>";

					//number of groups
					$Ngroepen = count($groepen);

					//sort groups
					ksort($groepenKeys);

					//show these groups
					if(count($groepen) > 0){
						$groepenKeys = array_keys($groepen);
						for($i=0; $i<count($groepenKeys); $i++) {
							$Gid = $groepenKeys[$i];
							$groep = $groepen[$Gid];
				      $Gnaam = $groep[0];
				      $Gbeschrijving = $groep[1];
				      $Glink = $groep[2];
							$Gid = $groep[3];

				      $sql = "SELECT naam, klas, group_role FROM users WHERE group_id='$Gid'";

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

								echo'
						    <div class="headerRow groepen" id='.$Gid.'>
						      <!-- table header for this class-->
						      <div class="headerRowContent">
						        <span class="groep">'.$Gnaam.'</span>
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

							      	echo '
							        <!-- table content for this class-->
							        <div class="rowContent">

							          <div class="groepInhoud">
							            <span class="groepsBeschrijving">
							              '.$Gbeschrijving.'
							            </span>
							            <span class="groepsLink">
							              <a href="'.$Glink.'">
							                '.$Glink.'
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
						      		echo '</div>';
										echo '</div>';
					    } else {
								echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							}
				    }
					} else {
				    echo '
				    <div class="headerRow groepen">
				      <div class="headerRowContent">
				        <span>Geen groepen gevonden</span>
				      </div>
				    </div>';
				  }

					echo "</div>";

					echo '
					<form class="addGroupButton" method="post" action="../scripts/createGroupFront.php">
						<button type="submit">Nieuwe groep</button>
					</form>
					';

				} else {
					echo "U bent geen docent";
				}
			} else {
				echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}
		} else {
			echo 'U bent niet ingelogd';
		}

		include('../components/footerGeneral.php');
	?>

	<script src="../scripts/searchStudent.js" defer></script>
	<script src="../scripts/searchStudentInfo.js" defer></script>

</body>
