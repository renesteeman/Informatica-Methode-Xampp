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

	//get and filter data
	$username = $_SESSION["username"];
	$chapter = mysqli_real_escape_string($conn, check_input($_POST['chapter']));
	$paragraph = mysqli_real_escape_string($conn, check_input($_POST['paragraph']));
	$Nparagraphs = mysqli_real_escape_string($conn, check_input($_POST['Nparagraphs']));

	//get id from user
	$sql = "SELECT id FROM users WHERE username='$username'";

	if (mysqli_query($conn, $sql)) {

		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$id = $result['id'];

		//look for current values
		$sql = "SELECT H$chapter FROM progressie WHERE userid='$id'";
		if (mysqli_query($conn, $sql)) {
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) == 0){
				//if no progress is found
				//insert progress
				$progressionContent = str_repeat("0", $paragraph-1).'1';
				$progressionPrefix = $Nparagraphs;

				$progression = $progressionPrefix.$progressionContent;

				echo $progression;

				/*
				$sql = "INSERT INTO `progressie` (`userid`, `H$chapter`) VALUES ('$id', '$progression');";

				if (mysqli_query($conn, $sql)) {
					echo "Progression updated";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error."</br>";
				}*/
			} else {

			}
		} else {
			echo "\nError with sql execution, please report to admin";
		}
	} else {
		echo "\nError with sql execution, please report to admin";
	}

?>
