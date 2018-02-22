<?php
	include('DB_connect.php');

	//kies het aantal te crearen accounts
	$accountsToCreate = 5;

	//info to set
	//username and password are set below
	$school = "Testers college";
	$functie = "leerling";
	$creation_date = date("Y-m-d");
	$expire_date = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));
	$klas = "";

	//create password
	$letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	$numbers = array("1","2","3","4","5","6","7","8","9","0");
	$specials = array("!","@","#","$","%","?");

	$accountsCreated = 0;

	$usernames = array();
	$passwords = array();

	for ($j = 0; $j<$accountsToCreate; $j++){
		$password = "";

		for ($i=0; $i<20; $i++){
			$ran1 = rand(0, 2);

			if ($ran1 == 0){
				$ran2 = rand(0,25);
				$char = $letters[$ran2];
				$password.=$char;

			} elseif ($ran1 == 1) {
				$ran2 = rand(0,9);
				$number = $numbers[$ran2];
				$password.=$number;

			} elseif ($ran1 == 2) {
				$ran2 = rand(0,5);
				$special = $specials[$ran2];
				$password.=$special;
			}
		}

		//create username
		$username = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

		//check if username is already in use
		$sql = mysqli_query($conn, "SELECT username FROM users WHERE username=$username");

		while (mysqli_num_rows($sql) != 0){
			$username = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		}

		//add the username and password (unhashed) into an array to display when the accounts are added
		array_push($usernames, $username);
		array_push($passwords, $password);

		//hash password
		$password = password_hash($password, PASSWORD_DEFAULT);

		//insert account into DB
		$sql = "INSERT INTO users (username, password, school, functie, creation_date, expire_date, klas) VALUES ('$username', '$password' , '$school', '$functie', '$creation_date', '$expire_date', '$klas')";

		if ($conn->query($sql) === TRUE) {
		    $accountsCreated++;
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error."</br>";
		}

	}

	echo $accountsCreated." account(s) created for ".$school." ".$klas."</br>";

	for ($k=0; $k<count($usernames);$k++){
		echo "Username = ".$usernames[$k]." Password = ".$passwords[$k]."</br>";
	}

	$conn->close();
?>
