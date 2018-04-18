<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];

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
			echo "\nError with sql execution, please report to admin";
		}

		//check password
		if(password_verify($password, $rightpsw)){
			$sql = "SELECT * FROM users WHERE username='$user'";

			//get current info in order to compare
			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				//C stands for Current and N stands for New
				$Cnaam = $result['naam'];
				$Cusername = $result['username'];
				$Cemail = $result['email'];
				$Cgroup_role = $result['group_role'];
			}

			//update naam
			if(isset($_POST['Nnaam'])){
				$Nnaam = mysqli_real_escape_string($conn, check_input($_POST['Nnaam']));

				$sql = "SELECT naam FROM users WHERE naam='$Nnaam'";
				if (mysqli_query($conn, $sql)) {

					$result = mysqli_query($conn, $sql);

					//geen account met nieuwe naam gevonden
					if(mysqli_num_rows($result)==0){
						if($Nnaam != $Cnaam && $Nnaam != ''){
							$sql = "UPDATE users SET naam='$Nnaam' WHERE username='$user'";
							if (mysqli_query($conn, $sql)) {
							    echo "\nNaam succesvol bijgewerkt";
							} else {
							    echo "SQL error report to admin";
							}
						}
					} else {
						echo "\nNaam al in gebruik";
					}
				} else {
					echo "SQL error report to admin";
				}
			}

			//update gebruikersnaam
			if(isset($_POST['Nusername'])){
				$Nusername = mysqli_real_escape_string($conn, check_input($_POST['Nusername']));

				$sql = "SELECT naam FROM users WHERE username='$Nusername'";
				if (mysqli_query($conn, $sql)) {

					$result = mysqli_query($conn, $sql);

					//geen account met nieuwe naam gevonden
					if(mysqli_num_rows($result)==0){
						if($Nusername != $Cusername && $Nusername != ''){
							$sql = "UPDATE users SET username='$Nusername' WHERE username='$user'";

							if (mysqli_query($conn, $sql)) {
							    echo "\nGebruikersnaam succesvol bijgewerkt";
								$_SESSION["username"] = $Nusername;
								$user = $Nusername;

							} else {
							    echo "SQL error report to admin";
							}
						}
					} else {
						echo "\nGebruikersnaam al in gebruik";
					}
				} else {
					echo "SQL error report to admin";
				}
			}

			//update password
			if(isset($_POST['Npassword']) & isset($_POST['NpasswordConfirm'])){
				$Npassword = mysqli_real_escape_string($conn, check_input($_POST['Npassword']));
				$NpasswordConfirm = mysqli_real_escape_string($conn, check_input($_POST['NpasswordConfirm']));

				if($Npassword == $NpasswordConfirm && $Npassword != ''){
					//hash password
					$Npassword = password_hash($Npassword, PASSWORD_DEFAULT);

					//update password
					$sql = "UPDATE users SET password='$Npassword' WHERE username='$user'";
					if (mysqli_query($conn, $sql)) {
					    echo "\nWachtwoord succesvol bijgewerkt";
					} else {
					    echo "SQL error, report admin";
					}
				}
			}

			//update email
			if(isset($_POST['Nemail'])){
				$Nemail = mysqli_real_escape_string($conn, check_input($_POST['Nemail']));

				if($Nemail != $Cemail && $Nemail != ''){
					$sql = "SELECT naam FROM users WHERE email='$Nemail'";
					if (mysqli_query($conn, $sql)) {

						$result = mysqli_query($conn, $sql);

						//geen account met nieuw emailadres gevonden
						if(mysqli_num_rows($result)==0){
							$sql = "UPDATE users SET email='$Nemail' WHERE username='$user'";
							if (mysqli_query($conn, $sql)) {
							    echo "\nEmail succesvol bijgewerkt";
							} else {
							    echo "SQL error, report to admin";
							}
						} else {
							echo "\nEmailadres al in gebruik \n";
						}
					}
				}
			}

			//update email
			if(isset($_POST['Ngroup_role'])){
				$Ngroup_role = mysqli_real_escape_string($conn, check_input($_POST['Ngroup_role']));

				if($Ngroup_role != $Cgroup_role && $Ngroup_role != ''){

					$sql = "UPDATE users SET group_role='$Ngroup_role' WHERE username='$user'";
					if (mysqli_query($conn, $sql)) {
					    echo "\nGroup succesvol bijgewerkt";
					} else {
					    echo "SQL error, report admin";
					}
				}
			}

		} else {
			echo "\nVerkeerd wachtwoord";
		}
	}

	mysqli_close($conn);

?>
