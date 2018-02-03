<?php
include('../php/DB_connect.php');

//function to check and clean input
function check_input($data) {
	$data = trim($data, " ");
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}




//get given login data
$usr_name = mysqli_real_escape_string($conn, check_input($_POST['username']));
$psw = mysqli_real_escape_string($conn, check_input($_POST['password']));

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
	echo "Logged in <br />";

	//start session with username
	session_start();
	$_SESSION["usr_name"] = $usr_name;

	header("Location: ../pages/index.php");

	echo "Error redirecting";
   exit;

} else {
	echo "False login <br />";
}

?>
