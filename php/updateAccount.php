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

//get given data
$usr_name = mysqli_real_escape_string($conn, check_input($_SESSION['usr_name']));
$new_usr_name = mysqli_real_escape_string($conn, check_input($_POST['new_username']));
$email = mysqli_real_escape_string($conn, check_input($_POST['email']));
$new_psw = mysqli_real_escape_string($conn, check_input($_POST['new_psw']));
$new_psw_confirm = mysqli_real_escape_string($conn, check_input($_POST['new_psw_confirm']));
$psw = mysqli_real_escape_string($conn, check_input($_POST['psw']));

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


   exit;

} else {
	echo "Wrong password <br />";
}

?>
