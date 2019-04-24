<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/account.min.css">
<script src="../scripts/login.js"></script>

<head>
	<meta name="description" content="Uw account bijwerken en instellingen controleren." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk, account" />
	<meta name="author" content="René Steeman" />
</head>

<body>

	<div class="title">
		<h2>
			Account
		</h2>
	</div>

	<div class="bar">
		<h3>
			<?php
				if (isset($_SESSION["id"])){
					echo 'Accountgegevens';
				} else {
					echo 'Login';
				}
			?>
		</h3>
	</div>

	<?php

		//if logged in say hello, else give the option to login
		if (isset($_SESSION["id"])){
			//if the user is loged in, display account settings

			$id = check_input($_SESSION["id"]);
			$functie = check_input($_SESSION["functie"]);

			$sql = "SELECT * FROM users WHERE id='$id'";

			//get current info in order to show a 'preview'
			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				//C stands for Current and N stands for New
				$Cnaam = $result['naam'];
				$Cusername = $result['username'];
				$Cgroep = $result['group_name'];
				$Cemail = $result['email'];
				$Groepsrol = $result['group_role'];
			}

			echo '
			<link rel="stylesheet" href="../css/accountSettings.min.css">
			<div class="main">
				<form class="accountSettingsForm" method="post" action="../scripts/editAccount.php" accept-charset="UTF-8">
					<ul>
						<li>
							<label>Naam</label>
							<input type="text" placeholder="'.$Cnaam.'"name="Nnaam" maxlength="50">
						</li>
						<li>
							<label>Gebruikersnaam</label>
							<input type="text" placeholder="'.$Cusername.'" name="Nusername" maxlength="50">
						</li>
						<li>
							<label>Nieuw wachtwoord</label>
							<input type="password" placeholder="Nieuw wachtwoord" name="Npassword" maxlength="50">
						</li>
						<li>
							<label>Bevestig nieuw wachtwoord</label>
							<input type="password" placeholder="Bevestig wachtwoord" name="NpasswordConfirm" maxlength="50">
						</li>
						<li>
							<label>Email</label>
							<input type="email" placeholder="'.$Cemail.'" name="Nemail" maxlength="50">
						</li>';
						if($functie == 'leerling'){
						echo '
						<li>
							<label>Groepsrol</label>
							<input type="text" placeholder="'.$Groepsrol.'"name="Ngroup_role" maxlength="50">
						</li>';
						}

						echo
						'<li>
							<label>Huidig wachtwoord</label>
							<input type="password" placeholder="Huidig wachtwoord" name="password" maxlength="50" required>
						</li>
						<li>
							<button type="submit">bijwerken</button>
						</li>
					</ul>
				</form>
			</div>';
			mysqli_close($conn);
		} else {
			//if the user is not loged in, display login form
			echo '
			<div class="main">
				<form class="loginForm" method="post" action="../scripts/login.php" accept-charset="UTF-8">
					<ul>
						<li>
							<img class="person" src="../icons/person.svg">
							<input type="text" placeholder="gebruikersnaam" name="username" maxlength="50" required>
						</li>
						<li>
							<img class="lock" src="../icons/lock.svg">
							<input type="password" placeholder="wachtwoord" name="password" maxlength="50" required>
						</li>
						<li>
							<div id="captcha" class="hide"></div>
						</li>
						<li class="cookie indent">
							Als u inlogd gaat u akkoord met het gebruik van cookies die bijhouden als wie u bent ingelogd. U kunt hier meer informatie over vinden onderaan de pagina.
						</li>
						<li class="indent">
							<button type="submit" id="LoginButton">Login</button>
						</li>

						<li id="resetPswLi" class="indent">
							<a href="../scripts/resetPswFront.php">
								<button class="resetPswButton redButton" type="button">Wachtwoord vergeten</button>
							</a>
						</li>

					</ul>
				</form>
			</div>';
		}

	?>

	<?php
	include('../components/footerGeneral.php');
	?>

	<script src="../scripts/editAccount.js"></script>

	<script>
	var onloadCallback = function() {
		grecaptcha.render('captcha', {
			'sitekey' : '6Lc_J1MUAAAAAJlHeuG3e9tg0zTGAvA7bC2dgSzq'
		});
	};
	</script>

	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

</body>
