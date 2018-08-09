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

	$id = $_SESSION["id"];
	$Gnaam = $_SESSION["groupname"];
	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));

	//get password for user
	$sql = "SELECT password FROM users WHERE id='$id'";
	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];

		//check psw
		if(password_verify($password, $rightpsw)){
			$sql = "SELECT school FROM users WHERE id='$id'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$school = $result['school'];

				$sql = "DELETE FROM groepen WHERE naam='$Gnaam' AND school='$school'";

				if (mysqli_query($conn, $sql)) {
					echo $Gnaam." deleted";
				} else {
					echo "\nError with sql execution, please report to admin (Delete group)";
				}

				//delete group_name of current members
				$sql = "UPDATE users SET group_name='' WHERE group_name='$Gnaam' AND school='$school'";

				if (mysqli_query($conn, $sql)) {
					echo "\nLeden succesvol verwijderd";
				} else {
					echo "\nError with sql execution, please report to admin (Remove members)";
				}

			} else {
				echo "\nError with sql execution, please report to admin";
			}
		} else {
			echo "\nWrong password";
		}
	} else {
		echo "\nError with sql execution, please report to admin";
	}

?>
