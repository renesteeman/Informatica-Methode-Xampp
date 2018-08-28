<?php
	include('DB_connect.php');
	session_start();

	$id = $_SESSION["id"];

	$minPasswordLength = 5;
	$error = false;
	$msg = "";

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

		//get password for user
		$sql = "SELECT password FROM users WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {

			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$rightpsw = $result['password'];

		} else {
			$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}

		//check password
		if(password_verify($password, $rightpsw)){
			$sql = "SELECT * FROM users WHERE id='$id'";

			//get current info in order to compare
			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				//C stands for Current and N stands for New
				$Cnaam = $result['naam'];
				$Cusername = $result['username'];
				$Cemail = $result['email'];
				$Cgroup_role = $result['group_role'];
				$School = $result['school'];
			}

			//update naam
			if(isset($_POST['Nnaam'])){

				$Nnaam = mysqli_real_escape_string($conn, check_input($_POST['Nnaam']));

				if(strlen($Nnaam) > 0){
					if($Nnaam != $Cnaam){

						$sql = "SELECT id FROM users WHERE naam='$Nnaam' AND school='$School'";

						if (mysqli_query($conn, $sql)) {

							$result = mysqli_query($conn, $sql);

							//geen account met nieuwe naam gevonden vcoor deze school
							if(mysqli_num_rows($result)==0){

								$sql = "UPDATE users SET naam='$Nnaam' WHERE id='$id'";

								if (mysqli_query($conn, $sql)) {
							    $msg .= "\nNaam succesvol bijgewerkt";
									$_SESSION["name"] = $Nnaam;
								} else {
							    $msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
									$error = 1;
								}

							} else {
								$msg .= "\nDeze naam is in gebruik op deze school.";
								$error = 1;
							}
						} else {
							$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							$error = 1;
						}
					}
				}
			}

			//update gebruikersnaam
			if(isset($_POST['Nusername'])){

				$Nusername = mysqli_real_escape_string($conn, check_input($_POST['Nusername']));

				if(strlen($Nusername) > 0){

					if($Cusername != $Nusername){
						$sql = "SELECT id FROM users WHERE username='$Nusername'";
						if (mysqli_query($conn, $sql)) {

							$result = mysqli_query($conn, $sql);

							//geen account met nieuwe gebruikersnaam gevonden
							if(mysqli_num_rows($result)==0){
								if($Nusername != $Cusername && $Nusername != ''){
									$sql = "UPDATE users SET username='$Nusername' WHERE id='$id'";

									if (mysqli_query($conn, $sql)) {
								    $msg .= "\nGebruikersnaam succesvol bijgewerkt";
										$_SESSION["username"] = $Nusername;

									} else {
								    $msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
										$error = 1;
									}
								}
							} else {
								$msg .= "\nGebruikersnaam al in gebruik";
								$error = 1;
							}
						} else {
							$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							$error = 1;
						}
					}	else {
						$msg .= "\nDe nieuwe gebruiksnaam is gelijk aan de oude.";
					}
				}
			}

			//update password
			if(isset($_POST['Npassword']) & isset($_POST['NpasswordConfirm'])){
				$Npassword = mysqli_real_escape_string($conn, check_input($_POST['Npassword']));
				$NpasswordConfirm = mysqli_real_escape_string($conn, check_input($_POST['NpasswordConfirm']));

				if(strlen($Npassword) > 0){
					if($Npassword == $NpasswordConfirm){
						if(strlen($Npassword) >= $minPasswordLength){
							//hash password
							$Npassword = password_hash($Npassword, PASSWORD_DEFAULT);

							//update password
							$sql = "UPDATE users SET password='$Npassword' WHERE id='$id'";
							if (mysqli_query($conn, $sql)) {
						    $msg .= "\nWachtwoord succesvol bijgewerkt";
							} else {
						    $msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
								$error = 1;
							}
						} else {
							$msg .= "\nHet nieuwe wachtwoord is niet lang genoeg, het moet minimaal "."$minPasswordLength"." karakters lang zijn.";
							$error = 1;
						}

					} else {
						$msg .= "\nHet nieuwe wachtwoord komt niet overeen met de bevestiging.";
						$error = 1;
					}
				}
			}

			//update email
			if(isset($_POST['Nemail'])){
				$Nemail = mysqli_real_escape_string($conn, check_input($_POST['Nemail']));

				if($Nemail != $Cemail && $Nemail != ''){
					$sql = "SELECT id FROM users WHERE email='$Nemail'";
					if (mysqli_query($conn, $sql)) {

						$result = mysqli_query($conn, $sql);

						//geen account met nieuw emailadres gevonden
						if(mysqli_num_rows($result)==0){
							$sql = "UPDATE users SET email='$Nemail' WHERE id='$id'";
							if (mysqli_query($conn, $sql)) {
							    $msg .= "\nEmail succesvol bijgewerkt";
							} else {
							    $msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
									$error = 1;
							}
						} else {
							$msg .= "\nEmailadres al in gebruik";
							$error = 1;
						}
					}
				}
			}

			//update group_role
			if(isset($_POST['Ngroup_role'])){
				$Ngroup_role = mysqli_real_escape_string($conn, check_input($_POST['Ngroup_role']));

				if($Ngroup_role != $Cgroup_role && $Ngroup_role != ''){

					$sql = "UPDATE users SET group_role='$Ngroup_role' WHERE id='$id'";
					if (mysqli_query($conn, $sql)) {
					    $msg .= "\nGroupsrol succesvol bijgewerkt";
					} else {
					    $msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
							$error = 1;
					}
				}
			}

		} else {
			$msg .= "\nVerkeerd wachtwoord";
			$error = 1;
		}
	}

	$toReturn = array('msg' => $msg, 'error' => $error);
	$toReturn = json_encode($toReturn);

	echo $toReturn;

	mysqli_close($conn);

?>
