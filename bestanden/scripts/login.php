<?php
	session_start();
	include('DB_connect.php');

	$now = date('Y-m-d H:i:s');

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

		if ($NFailedLogins < 10) {

			//check if a captcha had to be filled in and if it's correct

			if($NFailedLogins >= 3 && $NFailedLogins < 6){
				if(strtotime($LFailedLogin) > (strtotime($now)) - strtotime("+1 day")){
					echo "\n Aangezien u 3(+) keer uw gegevens verkeerd heeft ingevuld moet u nu een captcha invullen, u heeft in totaal 10 pogingen om in te loggen.\n";
				}
			}

			//continue login attempt

			//check psw
			if(password_verify($password, $rightpsw)){
				//if it's right than login

				//start session with username
				$_SESSION["username"] = $username;
				$_SESSION["name"] = $naam;
				$_SESSION["functie"] = $functie;

				$sql = "UPDATE users SET NFailedLogins='0' WHERE username='$username'";
				if(mysqli_query($conn, $sql)) {
					echo "updated attempt";
				} else {
					echo "SQL error, please report to admin";
				}

				mysqli_close($conn);
			} else {
				//if the password is wrong
				echo "\nIncorrecte login gegevens";

				$NNFailedLogins = $NFailedLogins + 1;

				//save failed logins
				$sql = "UPDATE users SET NFailedLogins='$NNFailedLogins', LFailedLogin='$now' WHERE username='$username'";

				if(mysqli_query($conn, $sql)) {
				} else {
					echo "SQL error, please report to admin";
				}

			}

		} else {
			echo "Uw account is geblokkeerd, probeer het over 24 uur opnieuw. Om het wachtwoord te resetten kunt u gebruik maken van de 'wachtwoord vergeten' knop, dit kan alleen als u een e-mail adres heeft ingevuld.";
		}

	} else {
		echo "Error with sql execution, please report to admin";
	}


?>
