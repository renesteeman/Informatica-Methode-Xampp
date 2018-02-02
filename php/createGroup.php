<?php
include('../php/DB_connect.php');

//set school
$school = "Bernardinus";

//set klas
$klas = "H52";

//insert group into DB

$sql = "INSERT INTO `group` (`id`, `school`, `klas`) VALUES (NULL, '$school', '$klas');";

if ($conn->query($sql) === TRUE) {
	echo "Group created for ".$school." ".$klas;
} else {
	echo "Error: " . $sql . "<br>" . $conn->error."</br>";
}

$conn->close();

?>
