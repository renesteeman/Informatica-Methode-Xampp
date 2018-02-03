<?php
include('../php/DB_connect.php');

session_start();

//function to check and clean input
function check_input($data) {
	$data = trim($data, " ");
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function check_input_heavy($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//get given data
$usr_name = mysqli_real_escape_string($conn, check_input($_SESSION['usr_name']));
$psw = mysqli_real_escape_string($conn, check_input($_POST['psw']));

$new_usr_name = mysqli_real_escape_string($conn, check_input($_POST['new_username']));
$new_email = mysqli_real_escape_string($conn, check_input($_POST['new_email']));
$new_psw = mysqli_real_escape_string($conn, check_input_heavy($_POST['new_psw']));
$new_psw_confirm = mysqli_real_escape_string($conn, check_input_heavy($_POST['new_psw_confirm']));

//get psw for $usr_name
$sql = "SELECT psw FROM account WHERE usr_name='$usr_name'";

if (mysqli_query($conn, $sql)) {

	$result = mysqli_query($conn, $sql);
	$result = mysqli_fetch_assoc($result);
	$rightpsw = $result['psw'];

} else {
	echo "Error with sql execution, please report to admin </br>";
}

//check psw
if(password_verify($psw, $rightpsw)){
	echo "Right psw <br />";

	if($new_usr_name){

		$sql = "SELECT usr_name FROM account where usr_name = '$usr_name' ";
		$result = mysqli_query($conn, $sql);
		$answer = mysqli_fetch_row($result);

		if (mysqli_num_rows($result) != 0){

			$sql = "UPDATE account SET usr_name = '$new_usr_name' WHERE usr_name = '$usr_name' ";

			if (mysqli_query($conn, $sql)) {

				$_SESSION["usr_name"] = $new_usr_name;
				echo "New username has been set </br>";

			} else {
				echo "Error with sql execution, please report to admin </br>";
			}

		} else {
			echo "Username already taken </br>";
		}

	}

	if($new_email){
		$sql = "UPDATE account SET email = '$new_email' WHERE usr_name = '$usr_name' ";

		if (mysqli_query($conn, $sql)) {

			echo "New email has been set </br>";

		} else {
			echo "Error with sql execution, please report to admin </br>";
		}
	}

	if($new_psw && $new_psw_confirm){
		if($new_psw == $new_psw_confirm){

			//hash password
			$new_psw = password_hash($new_psw, PASSWORD_DEFAULT);

			$sql = "UPDATE account SET psw = '$new_psw' WHERE usr_name = '$usr_name' ";

			if (mysqli_query($conn, $sql)) {

				echo "New psw has been set </br>";

			} else {
				echo "Error with sql execution, please report to admin </br>";
			}

		} else {
			echo "The new passwords don't match";
		}
	}

   exit;

} else {
	echo "Wrong password <br />";
}

?>
