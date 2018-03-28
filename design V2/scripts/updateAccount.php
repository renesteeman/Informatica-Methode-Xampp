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
			echo "Error with sql execution, please report to admin </br>";
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
				$Cgroep = $result['group_name'];
				$Cemail = $result['email'];
			}

			//update naam
			if(isset($_POST['Nnaam'])){
				$Nnaam = mysqli_real_escape_string($conn, check_input($_POST['Nnaam']));

				$sql = "SELECT naam FROM users WHERE naam='$Nnaam'";
				if (mysqli_query($conn, $sql)) {

					$result = mysqli_query($conn, $sql);

					//geen account met nieuwe naam gevonden
					if(mysqli_num_rows($result)==0){
						if($Nnaam != $Cnaam & $Nnaam != ''){
							$sql = "UPDATE users SET naam='$Nnaam' WHERE username='$user'";
							if (mysqli_query($conn, $sql)) {
							    echo "Naam succesvol bijgewerkt </br>";
							} else {
							    echo "SQL error report to admin";
							}
						}
					} else {
						echo "Naam al in gebruik";
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
						if($Nusername != $Cusername & $Nusername != ''){
							$sql = "UPDATE users SET username='$Nusername' WHERE username='$user'";

							if (mysqli_query($conn, $sql)) {
							    echo "Gebruikersnaam succesvol bijgewerkt </br>";
								$_SESSION["username"] = $Nusername;
								$user = $Nusername;

							} else {
							    echo "SQL error report to admin";
							}
						}
					} else {
						echo "Gebruikersnaam al in gebruik";
					}
				} else {
					echo "SQL error report to admin";
				}
			}

			//update password
			if(isset($_POST['Npassword']) & isset($_POST['NpasswordConfirm'])){
				$Npassword = mysqli_real_escape_string($conn, check_input($_POST['Npassword']));
				$NpasswordConfirm = mysqli_real_escape_string($conn, check_input($_POST['NpasswordConfirm']));

				if($Npassword == $NpasswordConfirm  & $Npassword != ''){
					//hash password
					$Npassword = password_hash($Npassword, PASSWORD_DEFAULT);

					//update password
					$sql = "UPDATE users SET password='$Npassword' WHERE username='$user'";
					if (mysqli_query($conn, $sql)) {
					    echo "Wachtwoord succesvol bijgewerkt </br>";
					} else {
					    echo "Error updating record: " . mysqli_error($conn);
					}
				}
			}

			//update group
			if(isset($_POST['Ngroep'])){
				$Ngroep = mysqli_real_escape_string($conn, check_input($_POST['Ngroep']));
				if($Ngroep != $Cgroep & $Ngroep != ''){
					$sql = "UPDATE users SET group_name='$Ngroep' WHERE username='$user'";
					if (mysqli_query($conn, $sql)) {
					    echo "Groep succesvol bijgewerkt </br>";
					} else {
					    echo "Error updating record: " . mysqli_error($conn);
					}
				}
			}

			//update email
			if(isset($_POST['Nemail'])){
				$Nemail = mysqli_real_escape_string($conn, check_input($_POST['Nemail']));
				if($Nemail != $Cemail & $Nemail != ''){
					$sql = "UPDATE users SET email='$Nemail' WHERE username='$user'";
					if (mysqli_query($conn, $sql)) {
					    echo "Email succesvol bijgewerkt </br>";
					} else {
					    echo "Error updating record: " . mysqli_error($conn);
					}
				}
			}
		} else {
			echo "Wrong password";
		}
	}

	mysqli_close($conn);

?>
