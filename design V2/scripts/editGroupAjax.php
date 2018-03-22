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

	$error = 0;
	//get and filter data
	$user = $_SESSION["username"];
	$password = mysqli_real_escape_string($conn, check_input($_POST['password']));
	$CGnaam = $_SESSION["groupname"];
	$NGnaam = mysqli_real_escape_string($conn, check_input($_POST['NGname']));
	$NGbeschrijving = mysqli_real_escape_string($conn, check_input($_POST['NGbeschrijving']));
	$NGlink = mysqli_real_escape_string($conn, check_input($_POST['NGlink']));
	$NGledenchecked = [];

	if(isset($_POST['NGleden'])){
		$NGledenUnChecked = $_POST['NGleden'];

		//check array and stored filtered array
		for($i=0;$i<count($NGledenUnChecked);$i++){
			$lidChecked = mysqli_real_escape_string($conn, check_input($NGledenUnChecked[$i]));
			$NGledenchecked[] = $lidChecked;
		}
	} else {
		$NGledenchecked = [];
	}


	//get password for $user
	$sql = "SELECT password FROM users WHERE username='$user'";
	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$rightpsw = $result['password'];

		//check psw
		if(password_verify($password, $rightpsw)){
			$sql = "SELECT school FROM users WHERE username='$user'";

			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				$school = $result['school'];

			} else {
				echo "Error with sql execution, please report to admin";
			}

			if($NGnaam!=""){
				$sql = "UPDATE groepen SET naam='$NGnaam' WHERE naam='$CGnaam' AND school='$school'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe groepnaam is succesvol ingesteld";
					$_SESSION["groupname"] = $NGnaam;
					$CGnaam = $_SESSION["groupname"];

				} else {
					echo "Error with sql execution, please report to admin (Gnaam)";
					$error = 1;
				}
			}

			if($NGbeschrijving!=""){
				$sql = "UPDATE groepen SET beschrijving='$NGbeschrijving' WHERE naam='$CGnaam' AND school='$school'";
				echo $school;

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe groepsbeschrijving is succesvol ingesteld";

				} else {
					echo "Error with sql execution, please report to admin (Gbeschrijving)";
					$error = 1;
				}
			}

			if($NGlink!=""){
				$sql = "UPDATE groepen SET link='$NGlink' WHERE naam='$CGnaam' AND school='$school'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe groepslink is succesvol ingesteld";

				} else {
					echo "Error with sql execution, please report to admin (Glink)";
					$error = 1;
				}
			}

			if($NGledenchecked!=""){
				print_r($NGledenchecked[0]);

				for($i=0; $i<count($NGledenchecked); $i++){
					$lid = $NGledenchecked[$i];

					$sql = "UPDATE users SET group_name='$CGnaam' WHERE naam='$lid' AND school='$school'";

					if (mysqli_query($conn, $sql)) {
						echo "\n".$lid." is nu lid van de groep";

					} else {
						echo "Error with sql execution, please report to admin (Gleden)";
						$error = 1;
					}

					//TODO remove group members that aren't on the list anymore (old groupmembers-new = to delete)

				}

			}

		} else {
			echo "Verkeerd wachtwoord";
			$error = 1;
		}

	} else {
		echo "Error with sql execution, please report to admin";
	}

	if($error==1){
		die(header("HTTP/1.0 404 Not Found"));
	}














	$conn->close();

?>
