<?php
	session_save_path('../tmp');
	session_start();
	include('DB_connect.php');

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//add failed login
	function addFailedLogin($NFailedLogins, $now, $username){
		global $conn;

		$NNFailedLogins = $NFailedLogins + 1;

		//save failed logins
		$sql = "UPDATE users SET NFailedLogins='$NNFailedLogins', LFailedLogin='$now' WHERE username='$username'";

		if(mysqli_query($conn, $sql)) {
		} else {
			echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}
	}

	//login function
	function login($id, $username, $password, $rightpsw, $functie, $naam, $NFailedLogins, $LFailedLogin, $now){
		global $conn;

		//check psw
		if(password_verify($password, $rightpsw)){
			//if it's right than login

			//start session with username
			$_SESSION["id"] = $id;
			$_SESSION["username"] = $username;
			$_SESSION["name"] = $naam;
			$_SESSION["functie"] = $functie;
			$_SESSION['ErrorNotLogedIn'] = 0;
			$_SESSION['ErrorInvalidAccount'] = 0;

			$sql = "UPDATE users SET NFailedLogins='0' WHERE username='$username'";
			if(mysqli_query($conn, $sql)) {
				echo "updated attempts";
			} else {
				echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}

			mysqli_close($conn);
		} else {
			//if the password is wrong
			echo "\nIncorrecte login gegevens";

			addFailedLogin($NFailedLogins, $now, $username);

		}
	};

	//get given login data
	$username = mysqli_real_escape_string($conn, check_input($_POST['username']));
	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));
	$captchaShown = mysqli_real_escape_string($conn, check_input($_POST['captchaShown']));

	//get password for user
	$sql = "SELECT id, password, functie, naam, NFailedLogins, LFailedLogin FROM users WHERE username='$username'";

	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$id = $result['id'];
		$rightpsw = $result['password'];
		$functie = $result['functie'];
		$naam = $result['naam'];

		//check if this account isn't blocked for security reasons
		$NFailedLogins = $result['NFailedLogins'];
		$LFailedLogin = $result['LFailedLogin'];

		$now = date('Y-m-d H:i:s');

		if ($NFailedLogins < 10) {

			//check if a captcha had to be filled in and if it's correct
			//do this when there
			if($NFailedLogins >= 3){
				if(strtotime($LFailedLogin) > (strtotime($now)) - strtotime("+1 day")){

					//if the captcha was shown
					if($captchaShown){
						//if the recaptcha was used
						if(isset($_POST["g-recaptcha-response"])){
							$url = 'https://www.google.com/recaptcha/api/siteverify';
							$data = array(
								'secret' => 'NOPE',
								'response' => $_POST["g-recaptcha-response"]
							);
							$options = array(
								'http' => array (
									'method' => 'POST',
									'content' => http_build_query($data)
								)
							);
							$context  = stream_context_create($options);
							$verify = file_get_contents($url, false, $context);
							$captcha_success = json_decode($verify);

							if ($captcha_success->success==false) {
								echo "\nU moet de captcha invullen om verder te komen, aangezien u meerdere malen verkeerde gegevens heeft gegeven. U heeft maximaal 10 pogingen. \n";

								addFailedLogin($NFailedLogins, $now, $username);

							} else if ($captcha_success->success==true) {
								//try to log in
								login($id, $username, $password, $rightpsw, $functie, $naam, $NFailedLogins, $LFailedLogin, $now);
							}
						}
					} else {
						//show captcha (done by JS when this echo is returned)
						echo "\nAangezien u 3(+) keer uw gegevens verkeerd heeft ingevuld moet u nu een captcha invullen, u heeft in totaal 10 pogingen om in te loggen. \n";

					}

				} else {
					//try to log in
					login($id, $username, $password, $rightpsw, $functie, $naam, $NFailedLogins, $LFailedLogin, $now);
				}
			}

			//try to log in
			login($id, $username, $password, $rightpsw, $functie, $naam, $NFailedLogins, $LFailedLogin, $now);

		} else {
			echo "Uw account is geblokkeerd, probeer het over 24 uur opnieuw. Om het wachtwoord te resetten kunt u gebruik maken van de 'wachtwoord vergeten' knop, dit kan alleen als u een e-mail adres heeft ingevuld.";
		}

	} else {
		echo "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
	}


?>
