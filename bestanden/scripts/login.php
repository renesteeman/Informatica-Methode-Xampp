<?php
	session_start();
	include('DB_connect.php');

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//get given login data
	$username = mysqli_real_escape_string($conn, check_input($_POST['username']));
	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));

	//get password for $username
	$sql = "SELECT password, functie, naam FROM users WHERE username='$username'";

	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];
		$functie = $result['functie'];
		$naam = $result['naam'];

	} else {
		echo "Error with sql execution, please report to admin </br>";
	}

	//check psw
	if(password_verify($password, $rightpsw)){
		//start session with username
		$_SESSION["username"] = $username;
		$_SESSION["name"] = $naam;
		$_SESSION["functie"] = $functie;

		mysqli_close($conn);
	} else {
		echo "\nIncorrecte login gegevens";

		//save failed logins
		$sql = "SELECT NFailedLogins, LFailedLogin FROM users WHERE username='$username'";

		//get current info in order to show a 'preview'
		if(mysqli_query($conn, $sql)) {
			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);

			$NFailedLogins = $result['NFailedLogins'];
			$LFailedLogin = $result['LFailedLogin'];

			echo $NFailedLogins." ".$LFailedLogin." ";

			$NNFailedLogins = $NFailedLogins + 1;
			$NLFailedLogin = date('Y-m-d H:i:s');

			/*
			$sql = "UPDATE users SET NFailedLogins="$NNFailedLogins", LFailedLogin="$NLFailedLogin" WHERE username='$username'";

			//get current info in order to show a 'preview'
			if(mysqli_query($conn, $sql)) {
				echo 'saved failed login';
			}
			*/
		}

	}

?>
