<?php
include('../php/DB_connect.php');

//kies het aantal te crearen accounts
$accountsToCreate = 5;

//set school
$school = "Bernardinus";

//create password
$letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$numbers = array("1","2","3","4","5","6","7","8","9","0");
$specials = array("!","@","#","$","%","&","?");

$accountsCreated = 0;

$usr_names = array();
$passwords = array();

for ($j = 0; $j<$accountsToCreate; $j++){
	$psw = "";

	for ($i=0; $i<20; $i++){
		$ran1 = rand(0, 2);

		if ($ran1 == 0){
			$ran2 = rand(0,25);
			$char = $letters[$ran2];
			$psw.=$char;

		} elseif ($ran1 == 1) {
			$ran2 = rand(0,9);
			$number = $numbers[$ran2];
			$psw.=$number;

		} else {
			$ran2 = rand(0,6);
			$special = $specials[$ran2];
			$psw.=$special;
		}
	}

	//create username
	//TODO check if usr_name exists
	$usr_name = rand(0,20).rand(0,20).rand(0,20).rand(0,20).rand(0,20);

	//add the username and password (unhashed) into an array to display when the accounts are added
	array_push($usr_names, $usr_name);
	array_push($passwords, $psw);

	//hash password
	$psw = password_hash($psw, PASSWORD_DEFAULT);

	//insert account into DB
	$sql = "INSERT INTO account (usr_name, psw, school) VALUES ('$usr_name', '$psw' , '$school')";

	if ($conn->query($sql) === TRUE) {
	    $accountsCreated++;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error."</br>";
	}


}

echo $accountsCreated." accounts created </br>";

for ($k=0; $k<count($usr_names);$k++){
	echo "Username = ".$usr_names[$k]." Password = ".$passwords[$k]."</br>";
}

$conn->close();
?>
