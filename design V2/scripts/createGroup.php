<?php
	include('DB_connect.php');

	//set school
	$school = "BC";

	//set klas
	$klas = "A52";

	$sql = "SELECT klas FROM `groups` WHERE school='$school' ";
	$result = mysqli_query($conn, $sql);

	$resultArray = array();

	while($row = mysqli_fetch_assoc($result)) {
		array_push($resultArray, $row['klas']);
	}

	if (!in_array($klas, $resultArray)){
		//insert group into DB
		$sql = "INSERT INTO `groups` (`id`, `school`, `klas`) VALUES (NULL, '$school', '$klas');";

		if ($conn->query($sql) === TRUE) {
			echo "Group created for ".$school." ".$klas;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error."</br>";
		}

	} else {
		echo "Klas bestaat al voor deze school </br>";
	}



	$conn->close();

?>
