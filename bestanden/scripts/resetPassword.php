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

	$msg = "";
	$error = 0;

	//get given data
	if(isset($_POST)){
		$email = mysqli_real_escape_string($conn, check_input($_POST['email']));

		//get user with this email
		$sql = "SELECT username FROM users WHERE email='$email'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result)==1) {

				$result = mysqli_fetch_assoc($result);
				$username = $result['username'];

				//create password
				$letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
				$numbers = array("1","2","3","4","5","6","7","8","9","0");
				$specials = array("!","@","#","$","%","?");

				$password = "";

				for ($i=0; $i<20; $i++){
					$ran1 = rand(0, 2);

					if ($ran1 == 0){
						$ran2 = rand(0,25);
						$char = $letters[$ran2];
						$password.=$char;

					} elseif ($ran1 == 1) {
						$ran2 = rand(0,9);
						$number = $numbers[$ran2];
						$password.=$number;

					} elseif ($ran1 == 2) {
						$ran2 = rand(0,5);
						$special = $specials[$ran2];
						$password.=$special;
					}
				}

				//hash password
				$HashedPassword = password_hash($password, PASSWORD_DEFAULT);

				//stel nieuw wachtwoord in
				$sql = "UPDATE users SET password='$HashedPassword' WHERE email='$email'";
				if (mysqli_query($conn, $sql)) {
					//send mail
					$emailContent = "Hallo, uw nieuwe wachtwoord voor uw account is: ".$password." en uw gebruikernaam is: ".$username;

					$subject = "Nieuw wachtwoord";

					$header = "From: noreply@inforca.nl";

					if (mail($email, $subject, $emailContent, $header)) {
						$msg .= "\nEen email met de nieuwe gegevens is verzonden.";
					} else {
						$msg .= "\nEmail kon niet verzonden worden.";
						$error = 1;
					}

				} else {
					$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
					$error = 1;
				}

			 } else {
			 	$msg .= "\nGeen account gevonden";
				$error = 1;
			 }

		} else {
			$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			$error = 1;
		}
	} else {
		$msg .= "\nVul alstublieft uw gegevens in.";
	}

	$toReturn = array('msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;

	$conn->close();
?>
