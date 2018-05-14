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
	$sql = "SELECT password, functie, naam, NFailedLogins, LFailedLogin FROM users WHERE username='$username'";

	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];
		$functie = $result['functie'];
		$naam = $result['naam'];

		//check if this account isn't blocked for security reasons
		$NFailedLogins = $result['NFailedLogins'];
		$LFailedLogin = $result['LFailedLogin'];

		if($NFailedLogins > 3){
			if(strtotime($LFailedLogin) > (strtotime($NLFailedLogin)) - strtotime("+1 day")){
				echo "\n It's time for a captcha since you had the wrong login 3(+) times in a row within the last 24h\n";
			}
		} else {
			//continue login attempt
			echo 'continue login attempt';

			//check psw
			if(password_verify($password, $rightpsw)){
				//if it's right than login
				echo 'password is correct';

				//start session with username
				$_SESSION["username"] = $username;
				$_SESSION["name"] = $naam;
				$_SESSION["functie"] = $functie;

				$sql = "UPDATE users SET NFailedLogins='0' WHERE username='$username'";
				if(mysqli_query($conn, $sql)) {
					echo "updated attempts";
				} else {
					echo "SQL error, please report to admin";
				}

				mysqli_close($conn);
			} else {
				//if the password is wrong
				echo "\nIncorrecte login gegevens";

				$NNFailedLogins = $NFailedLogins + 1;
				$NLFailedLogin = date('Y-m-d H:i:s');

				//save failed logins
				$sql = "UPDATE users SET NFailedLogins='$NNFailedLogins', LFailedLogin='$NLFailedLogin' WHERE username='$username'";

				//get current info in order to show a 'preview'
				if(mysqli_query($conn, $sql)) {
					echo 'Saved failed login';
				}

			}

		}

	} else {
		echo "Error with sql execution, please report to admin";
	}


?>
