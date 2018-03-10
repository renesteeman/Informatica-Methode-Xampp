<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];

	//set info for group
	$GroepNaam = "Test";
	$GroepBeschrijving = "Test groep";
	$GroepLink = "https://github.com/renesteeman/Informatica-Methode-Xampp";

	//Set to school teacher later in the script
	$GroepSchool = "";


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
			$GroepSchool = $result['school'];

		} else {
			echo "Error with sql execution, please report to admin </br>";
		}

		$sql = "INSERT INTO groepen (naam, beschrijving, link, school) VALUES ('$GroepNaam', '$GroepBeschrijving', '$GroepLink', '$GroepSchool')";

		if (mysqli_query($conn, $sql)) {
			echo "Groep toegevoegd";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error."</br>";
		}



		/*TODO Get data
		if(isset($_POST['Nnaam'])){
			$Nnaam = mysqli_real_escape_string($conn, check_input($_POST['Nnaam']));
		}
		*/

	}

	echo $GroepSchool;

	$conn->close();

?>
