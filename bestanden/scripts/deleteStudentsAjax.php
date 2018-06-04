<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];
	$school = '';
	$functie = '';

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$sql = "SELECT password, school, functie FROM users WHERE username='$user'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];
		$school = $result['school'];
		$functie = $result['functie'];
	}


	if($functie == 'docent'){
		$password = mysqli_real_escape_string($conn, check_input($_POST['password']));

		for($i=0; $i<count($_POST['namen']); $i++){
			$naam = mysqli_real_escape_string($conn, check_input($_POST['namen'][$i]));

			if(password_verify($password, $rightpsw)){
				$sql = "DELETE FROM users WHERE username='$naam' AND school='$school'";

				if (mysqli_query($conn, $sql)) {
					echo "Account van ".$naam." is verwijderd.";
				} else {
					echo "SQL error, report to admin";
				}
			} else {
				echo "Uw wachtwoord is incorrect.";
			}
		}
	}

?>
