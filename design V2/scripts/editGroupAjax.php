<?php
	include('DB_connect.php');
	session_start();

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//get and filter data
	$user = $_SESSION["username"];
	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));
	$Gnaam = $_SESSION["groupname"];
	$NGnaam = mysqli_real_escape_string($conn, check_input($_POST['NGname']));
	$NGbeschrijving = mysqli_real_escape_string($conn, check_input($_POST['NGbeschrijving']));
	$NGlink = mysqli_real_escape_string($conn, check_input($_POST['NGlink']));
	$NGleden = [];

	$NGledenUnChecked[] = $_POST['NGleden'];
	foreach($NGledenUnChecked as $lidUnCheked){
		$lidChecked = mysqli_real_escape_string($conn, check_input($lidUnCheked));
		$NGleden[] = $lidChecked;
	}

	//get password for $user
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
		$sql = "SELECT school FROM users WHERE naam='$user'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$school = $result['school'];

		} else {
			echo "Error with sql execution, please report to admin </br>";
		}

		if($Gnaam!=""){
			$sql = "UPDATE groepen SET naam='$Gnaam' WHERE naam='$Gnaam' AND school='$school'";

			if (mysqli_query($conn, $sql)) {

				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$Gschool = $result['school'];
				$_SESSION["groupname"] = $Gnaam;

			} else {
				echo "Error with sql execution, please report to admin </br>";
			}
		}

	}












	$conn->close();

?>
