<?php
	include('DB_connect.php');

	//set school
	$school = "BC";

	//set klas
	$klas = "A52";

	$sql = "SELECT klas FROM groepen WHERE school='$school' ";
	$result = mysqli_query($conn, $sql);

	$resultArray = array();

	while($row = mysqli_fetch_assoc($result)) {
		array_push($resultArray, $row['klas']);
	}

	if (!in_array($klas, $resultArray)){
		//insert group into DB
		$sql = "INSERT INTO groepen (school`, `klas`) VALUES ('$school', '$klas');";

		if (mysqli_query($conn, $sql)) {
			echo "Er is een groep aangemaakt voor: ".$school." ".$klas;
		} else {
			echo "SQL error, contact admin";
		}

	} else {
		echo "Klas bestaat al voor deze school </br>";
	}

	$conn->close();

?>
