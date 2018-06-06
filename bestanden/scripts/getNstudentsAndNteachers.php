<?php
	include('DB_connect.php');

	$sql = "SELECT school, functie, expire_date FROM users";

	$scholen = [];

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)) {

		$school = $row['school'];
		$functie = $row['functie'];
		$expire_date = $row['expire_date'];

		//if the account hasn't expired
		if($expire_date>date("Y-m-d")){
			if(array_key_exists($school, $scholen)){
				if(array_key_exists($functie, $scholen[$school])){
					if($functie == 'docent'){
						$scholen[$school]['docent']++;
					} elseif ($functie == 'leerling') {
						$scholen[$school]['leerling']++;
					}
				} else {
					if($functie == 'docent'){
						$scholen[$school]['docent'] = 1;
					} elseif ($functie == 'leerling') {
						$scholen[$school]['leerling'] = 1;
					}
				}

			} else {
				if($functie == 'docent'){
					$scholen[$school]['docent'] = 1;
				} elseif ($functie == 'leerling') {
					$scholen[$school]['leerling'] = 1;
				}
			}
		}
	}

	$schoolnamen = array_keys($scholen);

	echo "<h1>Alle geldige accounts per school</h1>";

	for($i=0; $i<count($schoolnamen); $i++){
		$Cschoolnaam = $schoolnamen[$i];
		echo "</br>Schoolnaam: ".$Cschoolnaam;

		$Cschool = $scholen[$Cschoolnaam];

		if(array_key_exists('leerling', $Cschool)){
			$CNleerlingen = $Cschool['leerling'];
		} else {
			$CNleerlingen = 0;
		}
		echo "</br>Aantal leerlingen: ".$CNleerlingen;

		if(array_key_exists('docent', $Cschool)){
			$CNdocenten = $Cschool['docent'];
		} else {
			$CNdocenten = 0;
		}
		echo "</br>Aantal docenten: ".$CNdocenten;

		$Cprijs = $CNleerlingen * 15 + $CNdocenten * 30;

		echo "</br>Prijs: €".$Cprijs."</br>";

	}

?>
