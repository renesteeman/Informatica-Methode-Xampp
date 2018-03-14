<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];
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

		//get info
		if(isset($_POST['Gnaam']) & $_POST['Gnaam'] != ""){
			$GroepNaam = mysqli_real_escape_string($conn, check_input($_POST['Gnaam']));

		};

		if(isset($_POST['Gomschrijving']) & $_POST['Gomschrijving'] != ""){
			$GroepNaam = mysqli_real_escape_string($conn, check_input($_POST['Gomschrijving']));
		};

		if(isset($_POST['Glink']) & $_POST['Glink'] != ""){
			$GroepNaam = mysqli_real_escape_string($conn, check_input($_POST['Glink']));
		};

		if(isset($_POST['Gleden']) & $_POST['Gleden'] != ""){
			$GroepNaam = mysqli_real_escape_string($conn, check_input($_POST['Gleden']));
		};

		if(isset($_POST['password']) & $_POST['password'] != ""){
			$GroepNaam = mysqli_real_escape_string($conn, check_input($_POST['password']));
		};

		//set info for group
		$GroepBeschrijving = "Test groep";
		$GroepLink = "https://github.com/renesteeman/Informatica-Methode-Xampp";





		//TODO only execute if the password is right

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
