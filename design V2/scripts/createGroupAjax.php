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
		if(isset($_POST['Gnaam']) & $_POST['Gnaam'] != ""){
			$Gnaam = mysqli_real_escape_string($conn, check_input($_POST['Gnaam']));
		};

		if(isset($_POST['Gomschrijving']) & $_POST['Gomschrijving'] != ""){
			$Gomschrijving = mysqli_real_escape_string($conn, check_input($_POST['Gomschrijving']));
		};

		if(isset($_POST['Glink']) & $_POST['Glink'] != ""){
			$Glink = mysqli_real_escape_string($conn, check_input($_POST['Glink']));
		};

		if(isset($_POST['Gleden']) & $_POST['Gleden'] != ""){
			$Gnaam = mysqli_real_escape_string($conn, check_input($_POST['Gleden']));
		};

		if(isset($_POST['Gleden']) & $_POST['Gleden'] != ""){
			$Gleden = [];

			for($i=0; $i<$_POST['Gleden'].count(); $i++){
				$lid = mysqli_real_escape_string($conn, check_input($_POST['Gleden'][$i]));
				echo $lid;
				array_push($Gleden, $lid);
			}

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

		} else {
			echo "Error with sql execution, please report to admin </br>";
		}

		//check psw
		if(password_verify($password, $rightpsw)){
			echo "Right password <br />";

			if($Gnaam != "" & $Gomschrijving != "" & $Glink != "" & $Gschool != ""){
				$sql = "INSERT INTO groepen (naam, beschrijving, link, school) VALUES ('$Gnaam', '$Gomschrijving', '$Glink', '$Gschool')";

				if (mysqli_query($conn, $sql)) {
					echo "Groep toegevoegd";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error."</br>";
				}

				//link student to group
			}

		   exit;

		} else {
			echo "Wrong password <br />";
		}

	}

	$conn->close();

?>
