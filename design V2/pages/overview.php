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

	<div class="overzicht">
		<!-- the table as a whole -->
		<div class="table">


			<div class="headerRow klassen">
				<!-- table header for this class-->
				<div class="headerRowContent">
					<span class="klas">klas</span>
					<span class="Nleerlingen">aantal leerlingen</span>
					<span class="icons">
						<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
					</span>
				</div>

				<!-- table content for this class-->
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



			<?php
				//if logged in show class
				//TODO check if person is teacher
				if (isset($_SESSION["username"])){

					$user = $_SESSION["username"];

					$klassen = [];
					$klassen['klas'] = [];

					$sql = "SELECT school FROM users WHERE username='$user'";

					if (mysqli_query($conn, $sql)) {
						//find school of teacher
						$result = mysqli_query($conn, $sql);
						$result = mysqli_fetch_assoc($result);
						$school = $result['school'];

						$sql = "SELECT id, naam, klas, group_role, group_name FROM `users` WHERE school='$school' AND functie='leerling'";

						if (mysqli_query($conn, $sql)) {

							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {
							    // output data of each row of names with class

							    while($row = mysqli_fetch_assoc($result)) {
									$klas = $row["klas"];

									$id = $row["id"];
									$naam = $row["naam"];
									$klas = $row["klas"];
									$group_role = $row["group_role"];
									$group_name = $row["group_name"];
									$gemiddeldePunt = 0;
									$hoofdstukkenAf = [];
									$onSchedule = 1;

									//save info from user
									$userinfo = ['naam'=>$naam, 'klas'=>$klas, 'group_role'=>$group_role, 'group_name'=>$group_name];

									//get more info cijfer
									$sql2 = "SELECT cijfer FROM `quiz` WHERE userid='$id'";

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
										echo "SQL error, alert admin";
									}

									//get more info progression
									$sql3 = "SELECT H1, H2, H3, H4, H5, H6, H7 FROM `progressie` WHERE userid='$id'";

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

											for($i=1; $i<count($hoofdstukken); $i++){
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
										echo "SQL error, alert admin";
									}

									//get more info chapters that should have been completed
									$sql4 = "SELECT progressie FROM `planner` WHERE school='$school' AND klas='$klas'";

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

										for($i=0; $i<count($chapterToBeMade)-1;$i++){
											$shouldBeComplete = $chapterToBeMade[$i];
											$shouldBeComplete = substr($shouldBeComplete, 1);

											if(!array_key_exists("H".$shouldBeComplete, $hoofdstukkenAf)){
												$onSchedule = 0;
											}
										}

									} else {
										echo "SQL error, alert admin";
									}

									//save the info
									$userinfo['onSchedule'] = $onSchedule;
									$userinfo['gemiddeldePunt'] = $gemiddeldePunt;

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
										}

										echo '</div>';

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

	<div class="overzicht">
		<!-- the table as a whole -->
		<div class="table">

			<?php

				//if logged in show class
				//TODO check if person is teacher
				if (isset($_SESSION["username"])){

					$user = $_SESSION["username"];

					$userSchool = "";

					//get school from teacher
					$sql = "SELECT school FROM users WHERE username='$user'";

					if (mysqli_query($conn, $sql)) {

						$result = mysqli_query($conn, $sql);
						$result = mysqli_fetch_assoc($result);
						$userSchool = $result['school'];

					} else {
						echo "Error with sql execution, please report to admin </br>";
					}

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

										$CstudentInfoForGroup = ['naam'=>$Cname, 'klas'=>$Cklas, 'functie'=>$Cfunction];

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
											<span class="Arrow image"><img src="../icons/arrow.svg" class="arrow"/></span>
											<span class="editGroup image"><img src="../icons/edit.svg" class="arrow"/></span>
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
										$CstudentRole = $studentInfoForGroup[$j]['functie'];

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
							echo "Geen groepen gevonden </br>";
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

				//if logged in show groups
				//TODO check if person is teacher
				if (isset($_SESSION["username"])){
					echo '
					<form class="addGroupButton" method="post" action="../scripts/createGroupFront.php">
						<input type="submit" value="Nieuwe groep">
					</form>
					';
				}

			?>

	</div>

	<?php
		include('../components/footerGeneral.php');
	?>

</body>
