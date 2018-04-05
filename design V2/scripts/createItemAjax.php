<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];
	$Inaam = "";
	$Iomschrijving = "";
	$Ischool = "";
	$Iklas = "";
	$Idatum = "";
	$Iprogressie = "";

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//get given login data if set
	if(isset($_POST)){
		//get school from teacher
		$sql = "SELECT school FROM users WHERE username='$user'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$Ischool = $result['school'];

		} else {
			echo "Error with sql execution, please report to admin </br>";
		}

		//get info
		if(isset($_POST['Inaam']) & $_POST['Inaam'] != ""){
			$Inaam = mysqli_real_escape_string($conn, check_input($_POST['Inaam']));
		};

		if(isset($_POST['Iomschrijving']) & $_POST['Iomschrijving'] != ""){
			$Iomschrijving = mysqli_real_escape_string($conn, check_input($_POST['Iomschrijving']));
		};

		if(isset($_POST['Iklas']) & $_POST['Iklas'] != ""){
			$Iklas = mysqli_real_escape_string($conn, check_input($_POST['Iklas']));
		};

		if(isset($_POST['Idatum']) & $_POST['Idatum'] != ""){
			$Idatum = mysqli_real_escape_string($conn, check_input($_POST['Idatum']));
			$Idatum = date("Y-m-d", strtotime($Idatum));
		};

		if(isset($_POST['Iprogressie']) & $_POST['Iprogressie'] != ""){
			for($i=0; $i<count($_POST['Iprogressie']); $i++){
				$chapter = mysqli_real_escape_string($conn, check_input($_POST['Iprogressie'][$i]));
				$Iprogressie .= $chapter.', ';
			};
		};

		if(isset($_POST['password']) & $_POST['password'] != ""){
			$password = mysqli_real_escape_string($conn, check_input($_POST['password']));
		};

		//get password for $username
		$sql = "SELECT password FROM users WHERE username='$user'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$rightpsw = $result['password'];

			//check psw
			if(password_verify($password, $rightpsw)){
				if($Inaam != "" & $Iomschrijving != "" & $Iklas != "" & $Iprogressie != "" & $Idatum != ""){
					//create group
					$sql = "INSERT INTO planner (titel, beschrijving, progressie, school, klas, datum) VALUES ('$Inaam', '$Iomschrijving', '$Iprogressie', '$Ischool', '$Iklas', '$Idatum')";

					if (mysqli_query($conn, $sql)) {
						echo "Item succesvol toegevoegd";
					} else {
						echo "\n Error with sql execution, please report to admin";
					}

				} else {
					echo "\n Niet alle informatie is ontvangen of de informatie is niet correct";
				}

			} else {
				echo "\nWrong password";
			}

		} else {
			echo "\nError with sql execution, please report to admin";
		}

	}

	$conn->close();

?>
