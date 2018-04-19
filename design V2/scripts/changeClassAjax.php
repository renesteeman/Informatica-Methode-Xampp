<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];
	$school = '';
	$functie = '';

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$Nklas = mysqli_real_escape_string($conn, check_input($_POST['Nklas']));
	$namen = [];

	for($i=0; $i<count($_POST['namen']); $i++){
		$naam = mysqli_real_escape_string($conn, check_input($_POST['namen'][$i]));
		array_push($namen, $naam);
	};

	$sql = "SELECT school, functie FROM users WHERE username='$user'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];
	}

	if($functie == 'docent'){
		for($i=0; $i<count($namen); $i++){
			$naam = $namen[$i];
			$sql = "UPDATE users SET klas='$Nklas' WHERE naam='$naam' AND school='$school'";

			if (mysqli_query($conn, $sql)) {
				echo "\nDe klas is voor ."$naam". succesvol aangepast";

			} else {
				echo "SQL error, report to admin";
			}
		}
	}

?>
