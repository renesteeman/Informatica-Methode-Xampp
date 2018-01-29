<?php

//get given login data
$usr_name = mysqli_real_escape_string($conn, check_input($_POST['usr_name']));
$psw = mysqli_real_escape_string($conn, check_input($_POST['psw']));

//hash
$psw = password_hash($psw, PASSWORD_DEFAULT);

//get psw for $usr_name
$sql = "SELECT psw FROM account WHERE name='$usr_name'";

if (mysqli_query($conn, $sql)) {

	$result = mysqli_query($conn, $sql);
	$result = mysqli_fetch_assoc($result);
	$rightpsw = $result['password'];

}

//check psw
if(password_verify($psw, $righpsw)){
	echo "Loged in <br />";
} else {
	echo "False login <br />";
}

?>
