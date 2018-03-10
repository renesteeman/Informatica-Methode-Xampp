<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];

	//set info for group
	$GroepNaam = "Test";
	$GroepBeschrijving = "Test groep";
	$GroepLink = "https://github.com/renesteeman/Informatica-Methode-Xampp";

	//TODO School van docent
	$GroepSchool = "Bernardinus";


	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//get given login data if set
	if(isset($_POST)){
		//get given psw
		$password = mysqli_real_escape_string($conn, check_input($_POST['password']));

		//get password for $username
		$sql = "SELECT password FROM users WHERE username='$user'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$rightpsw = $result['password'];

		} else {
			echo "Error with sql execution, please report to admin </br>";
		}

		//check password
		if(password_verify($password, $rightpsw)){




			/*update naam
			if(isset($_POST['Nnaam'])){
				$Nnaam = mysqli_real_escape_string($conn, check_input($_POST['Nnaam']));
			}
			*/
	}

















	$conn->close();

?>
