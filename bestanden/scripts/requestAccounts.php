<?php
	include('DB_connect.php');

	#allow to script to continue for a maximum of 5m
	ini_set('max_execution_time', '300');

	$msg = "";

	//function to check and clean input
	function check_input($data) {
		$data = trim($data, " ");
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//password checks out
	//get given data
	if(isset ($_POST['schoolnaam']) & $_POST['schoolnaam']!=""){
		$schoolnaam = mysqli_real_escape_string($conn, check_input($_POST['schoolnaam']));
	} else {
		$msg .= "\nU heeft geen geldige schoolnaam ingevuld";
	}

	if(isset ($_POST['Ndocenten']) & $_POST['Ndocenten']!=""){
		$Ndocenten = mysqli_real_escape_string($conn, check_input($_POST['Ndocenten']));
		if($Ndocenten < 0){
			$Ndocenten = 0;
			$msg .= "\nU heeft geen geldig aantal docenten ingevuld";
		}
	} else {
		$msg .= "\nU heeft geen geldig aantal docenten ingevuld";
	}

	if(isset ($_POST['klassen'])){
		$KlassenUnChecked = $_POST['klassen'];

		$count = count($KlassenUnChecked);
		//check array and stored filtered array
		for($i=0;$i<$count;$i++){
			$klas = $KlassenUnChecked[$i];
			$count2 = count($klas);
			for($j=0;$j<$count2;$j++){
				$klasinfo1 = mysqli_real_escape_string($conn, check_input($klas[0]));
				$klasinfo2 = mysqli_real_escape_string($conn, check_input($klas[1]));
				$klasinfo[0] = $klasinfo1;
				$klasinfo[1] = $klasinfo2;
			}
			$klassen[] = $klasinfo;
		}

	}

	$creation_date = date("Y-m-d");
	$expire_date = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " +1 year"));

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

	//create account data
	for($i=0;$i<$Ndocenten;$i++){
		$accountDetails = createAccountDetails();
		$accounts['docenten'][] = $accountDetails;
	}

	$count = count($klassen);
	for($i=0;$i<$count;$i++){
		//next class
		for($j=0;$j<$klassen[$i][1];$j++){
			//next person
			$Cklas = $klassen[$i][0];
			$accountDetails = createAccountDetails();
			$accounts['leerlingen'][$Cklas][] = $accountDetails;
		}
	}

	$count = count($accounts['docenten']);
	//update DB voor docenten
	for($i=0; $i<$count; $i++){
		$Caccount = $accounts['docenten'][$i];
		$Cusername = $Caccount[0];
		$CHpassword = $Caccount[2];

		$sql = "INSERT INTO users (username, password, school, functie, creation_date, expire_date, naam) VALUES ('$Cusername', '$CHpassword' , '$schoolnaam', 'docent', '$creation_date', '$expire_date', '$Cusername')";

		if (mysqli_query($conn, $sql)) {
			$accountsCreated++;
		} else {
			$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}
	}

	//update DB voor leerlingen
	$klasnamen = array_keys($accounts['leerlingen']);
	$count = count($accounts['leerlingen']);
	for($i=0; $i<$count; $i++){
		$Cklas = $klasnamen[$i];

		$count2 = count($accounts['leerlingen'][$Cklas]);
		for($j=0; $j<$count2; $j++){
			$Caccount = $accounts['leerlingen'][$Cklas][$j];
			$Cusername = $Caccount[0];
			$CHpassword = $Caccount[2];

			$sql = "INSERT INTO users (username, password, school, functie, creation_date, expire_date, klas, naam) VALUES ('$Cusername', '$CHpassword' , '$schoolnaam', 'leerling', '$creation_date', '$expire_date', '$Cklas', '$Cusername')";

			if (mysqli_query($conn, $sql)) {
				$accountsCreated++;
			} else {
				$msg .= "\nEr is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
			}
		}
	}

	//send mail to school
	$emailContent1 = "
	<!DOCTYPE html>
	<html>
	<body style='margin: 0;'>
		<div class='email-background' style='background-color: #eee;font-family: roboto, sans-serif;height: 100%;width: 100%;padding: 2em;'>

			<div class='pre-header'>
				<h1 style='margin-top: 0;'>Bedankt voor het aanvragen van uw accounts voor Inforca!</h1>
			</div>

			<div class='email-container'>
				<h2>Dit zijn de inloggegevens voor uw account(s). Het factuur zult u spoedig ontvangen.</h2>

				<div class='docenten'>
					<h3>
						Docenten:
					</h3>
					<ul style='list-style: none;'>";

					$count = count($accounts['docenten']);
					for($i=0; $i<$count; $i++){
						$Caccount = $accounts['docenten'][$i];
						$Cusername = $Caccount[0];
						$Cpassword = $Caccount[1];

						if($i%2 == 0){
							$emailContent1 .=
							"<li>
								<span class='username' style='display: inline-block;width: 20em;overflow-x: auto; background-color: #ccc;'>".$Cusername."</span>
								<span class='password' style='display: inline-block;width: 20em;overflow-x: auto; background-color: #ccc;'>".$Cpassword."</span>
							</li>
							";
						} else {
							$emailContent1 .=
							"<li>
								<span class='username' style='display: inline-block;width: 20em;overflow-x: auto;'>".$Cusername."</span>
								<span class='password' style='display: inline-block;width: 20em;overflow-x: auto;'>".$Cpassword."</span>
							</li>
							";
						}
					}

					$emailContent1 .= "
					</ul>

				</div>

				<div class='leerlingen'>
					<h3>Leerlingen:</h3>
					<div class='klassen'>
						<ul style='list-style: none;'>";

						$klasnamen = array_keys($accounts['leerlingen']);
						$count = count($accounts['leerlingen']);
						for($i=0; $i<$count; $i++){
							$Cklas = $klasnamen[$i];
							$emailContent1 .= "
							<li>
								<h4>".$Cklas."</h4>
								<ul style='list-style: none;'>
							";

							$count2 = count($accounts['leerlingen'][$Cklas]);
							for($j=0; $j<$count2; $j++){
								$Caccount = $accounts['leerlingen'][$Cklas][$j];
								$Cusername = $Caccount[0];
								$Cpassword = $Caccount[1];

								if($j%2 == 0){
									$emailContent1 .=
									"<li>
										<span class='username' style='display: inline-block;width: 20em;overflow-x: auto; background-color: #ccc;'>".$Cusername."</span>
										<span class='password' style='display: inline-block;width: 20em;overflow-x: auto; background-color: #ccc;'>".$Cpassword."</span>
									</li>
									";
								} else {
									$emailContent1 .=
									"<li>
										<span class='username' style='display: inline-block;width: 20em;overflow-x: auto;'>".$Cusername."</span>
										<span class='password' style='display: inline-block;width: 20em;overflow-x: auto;'>".$Cpassword."</span>
									</li>
									";
								}
							}

							$emailContent1 .= "
								</ul>
							</li>
							";

						}

						$emailContent1 .="
						</ul>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	";

	echo $emailContent1;

	$conn->close();
?>
