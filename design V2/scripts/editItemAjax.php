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
	$NInaam = mysqli_real_escape_string($conn, check_input($_POST['NInaam']));
	$NIomschrijving = mysqli_real_escape_string($conn, check_input($_POST['NIomschrijving']));
	$NIklas = mysqli_real_escape_string($conn, check_input($_POST['NIklas']));
	$NIdatum = mysqli_real_escape_string($conn, check_input($_POST['NIdatum']));

	$CInaam = $_SESSION["itemname"];
	$CIklas = $_SESSION["itemklas"];
	$CIdatum = $_SESSION["itemdatum"];

	$NIprogressie = [];

	if(isset($_POST['NIprogressie'])){
		$NIprogressieUnchecked = $_POST['NIprogressie'];

		//check array and stored filtered array
		for($i=0;$i<count($NIprogressieUnchecked);$i++){
			$progressieChecked = mysqli_real_escape_string($conn, check_input($NIprogressieUnchecked[$i]));
			$NIprogressie[] = $progressieChecked;
		}
	} else {
		$NIprogressie = [];
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

			if($NInaam!=""){
				$sql = "UPDATE planner SET titel='$NInaam' WHERE titel='$CInaam' AND school='$school' AND klas='$CIklas' AND datum='$CIdatum'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe naam voor opdracht is succesvol ingesteld";
					$_SESSION["itemnaam"] = $NInaam;
					$CInaam = $_SESSION["itemnaam"];

				} else {
					echo "Error with sql execution, please report to admin";
					$error = 1;
				}
			}

			if($NIomschrijving!=""){
				$sql = "UPDATE planner SET beschrijving='$NIomschrijving' WHERE titel='$CInaam' AND school='$school' AND klas='$CIklas' AND datum='$CIdatum'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe beschrijving voor opdracht is succesvol ingesteld";
				} else {
					echo "Error with sql execution, please report to admin";
					$error = 1;
				}
			}

			if($NIklas!=""){
				$sql = "UPDATE planner SET klas='$NIklas' WHERE titel='$CInaam' AND school='$school' AND klas='$CIklas' AND datum='$CIdatum'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe klas voor opdracht is succesvol ingesteld";
					$_SESSION["itemklas"] = $NIklas;
					$CIklas = $_SESSION["itemklas"];
				} else {
					echo "Error with sql execution, please report to admin";
					$error = 1;
				}
			}

			if($NIdatum!=""){
				$NIdatum = date("Y-m-d", strtotime($NIdatum));

				echo "\n".$NIdatum."\n";
				echo "\n".$CInaam."\n"."\n".$school."\n"."\n".$CIklas."\n"."\n".$CIdatum."\n";

				$sql = "UPDATE planner SET datum='$NIdatum' WHERE titel='$CInaam' AND school='$school' AND klas='$CIklas' AND datum='$CIdatum'";

				if (mysqli_query($conn, $sql)) {
					echo "\nNieuwe datum voor opdracht is succesvol ingesteld";
					$_SESSION["itemdatum"] = $NIdatum;
					$CIdatum = $_SESSION["itemdatum"];
				} else {
					echo "Error with sql execution, please report to admin";
					$error = 1;
				}
			}/*

			if($NGledenchecked!=""){

				//delete group_name of current members
				$sql = "UPDATE users SET group_name='' WHERE group_name='$CGnaam' AND school='$school'";

				if (mysqli_query($conn, $sql)) {
					echo "\nOude leden succesvol verwijderd";
				} else {
					echo "Error with sql execution, please report to admin (Remove old members)";
					$error = 1;
				}

				//set group_name for new members
				for($i=0; $i<count($NGledenchecked); $i++){
					$lid = $NGledenchecked[$i];

					$sql = "UPDATE users SET group_name='$CGnaam' WHERE naam='$lid' AND school='$school'";

					if (mysqli_query($conn, $sql)) {
						echo "\n".$lid." is nu lid van de groep";
					} else {
						echo "Error with sql execution, please report to admin (Gleden)";
						$error = 1;
					}
				}
			}*/
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
