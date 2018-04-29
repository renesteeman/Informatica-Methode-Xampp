<?php
	include('DB_connect.php');
	session_start();

	$user = $_SESSION["username"];
	$school = '';
	$functie = '';
	$klas = '';

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$klas = mysqli_real_escape_string($conn, check_input($_POST['klas']));

	$sql = "SELECT school, functie FROM users WHERE username='$user'";

	if (mysqli_query($conn, $sql)) {
		//find school of teacher
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$school = $result['school'];
		$functie = $result['functie'];

		if($functie == 'docent'){
			$sql = "SELECT naam FROM `users` WHERE school='$school' AND functie='leerling' AND klas='$klas'";

			$result = mysqli_query($conn, $sql);

			//display students
			echo "leerlingen: ";
			if (mysqli_num_rows($result) > 0) {

				// output data of each row of names with class
				while($row = mysqli_fetch_assoc($result)) {
					$naam = $row["naam"];
					echo '
						<div class="leerling">
							<label class="container">'.$naam.'
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
						</div>
					';

				}
			}
		} else {
			echo "U bent geen docent";
		}

	} else {
		echo "SQL error, report to admin";
	}

?>
