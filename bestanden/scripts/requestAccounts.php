<?php
	include('DB_connect.php');

	$allSet = 1;

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//info to set

	//get given data
	if(isset ($_POST['schoolnaam']) & $_POST['schoolnaam']!=""){
		$schoolnaam = mysqli_real_escape_string($conn, check_input($_POST['schoolnaam']));
	} else {
		echo "\nU heeft geen geldige schoolnaam ingevuld";
		$allSet = 0;
	}

	if(isset ($_POST['telefoonnummer']) & $_POST['telefoonnummer']!=""){
		$telefoonnummer = mysqli_real_escape_string($conn, check_input($_POST['telefoonnummer']));
	} else {
		echo "\nU heeft geen geldige telefoonnummer ingevuld";
		$allSet = 0;
	}

	if(isset ($_POST['email']) & $_POST['email']!=""){
		$email = mysqli_real_escape_string($conn, check_input($_POST['email']));
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email = "";
			echo "\nU heeft geen geldige email ingevuld";
			$allSet = 0;
		}
	} else {
		echo "\nU heeft geen geldige email ingevuld";
		$allSet = 0;
	}

	if(isset ($_POST['Ndocenten']) & $_POST['Ndocenten']!=""){
		$Ndocenten = mysqli_real_escape_string($conn, check_input($_POST['Ndocenten']));
		if($Ndocenten < 0){
			$Ndocenten = 0;
			echo "\nU heeft geen geldig aantal docenten ingevuld";
			$allSet = 0;
		}
	} else {
		echo "\nU heeft geen geldig aantal docenten ingevuld";
		$allSet = 0;
	}

	if(isset ($_POST['extraInfo']) & $_POST['extraInfo']!=""){
		$extraInfo = mysqli_real_escape_string($conn, check_input($_POST['extraInfo']));
	} else {
		$extraInfo = "";
	}

	if(isset ($_POST['klassen'])){
		$KlassenUnChecked = $_POST['klassen'];

		//check array and stored filtered array
		for($i=0;$i<count($KlassenUnChecked);$i++){
			$klas = $KlassenUnChecked[$i];
			for($j=0;$j<count($klas);$j++){
				$klasinfo1 = mysqli_real_escape_string($conn, check_input($klas[0]));
				$klasinfo2 = mysqli_real_escape_string($conn, check_input($klas[1]));
				$klasinfo[0] = $klasinfo1;
				$klasinfo[1] = $klasinfo2;
			}
			$klassen[] = $klasinfo;
		}

	} else {
		echo "\nU heeft geen (of niet) geldige klassen ingevuld";
		$allSet = 0;
	}

	if(isset ($_POST['akkoord']) & $_POST['akkoord']!=""){
		$akkoord = mysqli_real_escape_string($conn, check_input($_POST['akkoord']));
		if(!$akkoord){
			echo "U moet akkoord gaan om accounts aan te kunnen vragen";
			$allSet = 0;
		}
	} else {
		echo "\nEr is een fout opgetreden omtrend het akkoord gaan met de voorwaarden";
		$allSet = 0;
	}

	//echo $schoolnaam." ".$telefoonnummer." ".$email." ".$Ndocenten." ".$extraInfo." ".$akkoord." ";
	//print_r($klassen);

	$creation_date = date("Y-m-d");
	$expire_date = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));

	//needed to create a password
	$letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	$numbers = array("1","2","3","4","5","6","7","8","9","0");
	$specials = array("!","@","#","$","%","?");

	function createAccountDetails(){
		global $letters, $numbers, $specials, $schoolnaam, $conn;

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

		//hash password
		$Hpassword = password_hash($password, PASSWORD_DEFAULT);

		//create username
		$username = $schoolnaam.rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

		//check if username is already in use
		$sql = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");

		while(mysqli_num_rows($sql) != 0){
			$username = $schoolnaam.rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		}

		$accountDetails = [$username, $password, $Hpassword];

		return $accountDetails;
	}

	$accountsCreated = 0;
	$accounts = [];

	if($allSet == 1){
		for($i=0;$i<count($klassen);$i++){
			//next class
			for($j=0;$j<$klassen[$i][1];$j++){
				//next person
				$Cklas = $klassen[$i][0];
				$accountDetails = createAccountDetails();
				$accounts[$Cklas][] = $accountDetails;
				$accountsCreated++;
			}
		}
	}

	echo $accountsCreated." account(s) aangemaakt voor ".$schoolnaam;

	//print_r($accounts);

	//send mail
	$msg = "Hallo, uw de gegevens voor uw accounts zijn: ";

	$klasnamen = array_keys($accounts);
	print_r($accounts);
	for($i=0; $i<count($accounts); $i++){
		$Cklas = $klasnamen[$i];
		for($j=0; $j<count($accounts[$Cklas]); $j++){
			$Caccount = $accounts[$Cklas][$j];
			$Cusername = $Caccount[0];
			$Cpassword = $Caccount[1];
		}

	}

	$subject = "Nieuw wachtwoord";

	$header = "From: noreply@inforca.nl";

	/*if (mail($email, $subject, $msg, $header)) {
		echo("<p>Email verzonden</p>");
	} else {
		echo("<p>Email delivery failed…</p>");
	}*/


	//check if all info was set
	/*
			//insert account into DB
			//$sql = "INSERT INTO users (username, password, school, functie, creation_date, expire_date, klas, naam) VALUES ('$username', '$password' , '$school', '$functie', '$creation_date', '$expire_date', '$klas', '$naam')";

			if (mysqli_query($conn, $sql)) {
			    $accountsCreated++;
			} else {
			   	echo "SQL error, contact admin";
			}

		}

	}*/

	$conn->close();
?>
