<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];
	$Gnaam = "";
	$Gomschrijving = "";
	$Glink = "";
	$Gschool = "";

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
			$Gschool = $result['school'];

		} else {
			echo "Error with sql execution, please report to admin </br>";
		}

		//get info
		if(isset($_POST['Gnaam'])){
			if($_POST['Gnaam'] != ""){
				$Gnaam = mysqli_real_escape_string($conn, check_input($_POST['Gnaam']));

				//check if Gnaam is already in use
				$sql = mysqli_query($conn, "SELECT naam FROM groepen WHERE naam='$Gnaam' and school='$Gschool'");

				if (mysqli_num_rows($sql) != 0) {
					echo "\n Groepnaam is al in gebruik.";
	 			   $Gnaam = "";
				};
			}
		};

		if(isset($_POST['Gomschrijving'])){
			if($_POST['Gomschrijving'] != ""){
				$Gomschrijving = mysqli_real_escape_string($conn, check_input($_POST['Gomschrijving']));
			}
		};

		if(isset($_POST['Glink'])){
			if($_POST['Glink'] != ""){
				$Glink = mysqli_real_escape_string($conn, check_input($_POST['Glink']));
			}
		};

		if(isset($_POST['Gleden'])){
			if($_POST['Gleden'] != ""){
				$Gleden = [];

				for($i=0; $i<count($_POST['Gleden']); $i++){
					$lid = mysqli_real_escape_string($conn, check_input($_POST['Gleden'][$i]));
					array_push($Gleden, $lid);
				};
			}
		} else {
			$Gleden = [];
		}

		if(isset($_POST['password'])){
			if($_POST['password'] != ""){
				$password = mysqli_real_escape_string($conn, check_input($_POST['password']));
			}
		};

		//get password for $username
		$sql = "SELECT password FROM users WHERE username='$user'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$rightpsw = $result['password'];

		} else {
			echo "Error with sql execution, please report to admin </br>";
		}

		//check psw
		if(password_verify($password, $rightpsw)){

			if($Gnaam != "" & $Gomschrijving != "" & $Gschool != "" & $Gleden !=""){
				//create group
				$sql = "INSERT INTO groepen (naam, beschrijving, link, school) VALUES ('$Gnaam', '$Gomschrijving', '$Glink', '$Gschool')";

				if (mysqli_query($conn, $sql)) {
					echo "Groep succesvol toegevoegd";
				} else {
					echo "Error with sql execution, please report to admin </br>";
				}

				//link students to group
				for($i=0; $i < count($Gleden); $i++){
					//select student
					$studentName = $Gleden[$i];

					$sql = mysqli_query($conn, "SELECT naam FROM users WHERE naam='$studentName' AND school='$Gschool'");

					if (mysqli_num_rows($sql) != 0){
						$sql = "UPDATE users SET group_name='$Gnaam' WHERE naam='$studentName' and school='$Gschool'";

						if (mysqli_query($conn, $sql)) {
							echo "\n".$studentName." succesvol toegevoegd aan groep";
						} else {
							echo "\n".$studentName." bestaat niet";
						}
					} else {
						echo "\n".$studentName." bestaat niet";
					}
				}

			} else {
				echo "\n Niet alle informatie is ontvangen of de informatie is niet correct";
			}

		} else {
			echo "\nWrong password";
		}

	}

	$conn->close();

?>
