<?php
	include('../components/headerGeneral.php');
	include('../scripts/DB_connect.php');
?>

<link rel="stylesheet" href="../css/account.min.css">

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
				if (isset($_SESSION["username"])){
					echo 'Account gegevens';
				} else {
					echo 'Login';
				}
			?>
		</h3>
	</div>

	<?php

		//if logged in say hello, else give the option to login
		if (isset($_SESSION["username"])){
			//if the user is loged in, display account settings

			$user = $_SESSION["username"];

			$sql = "SELECT * FROM users WHERE username='$user'";

			//get current info in order to show a 'preview'
			if (mysqli_query($conn, $sql)) {
				$result = mysqli_query($conn, $sql);
				$result = mysqli_fetch_assoc($result);
				//C stands for Current and N stands for New
				$Cnaam = $result['naam'];
				$Cusername = $result['username'];
				$Cgroep = $result['group_name'];
				$Cemail = $result['email'];
				$Groupsrol = $result['group_role'];
			}

			echo '
			<link rel="stylesheet" href="../css/accountSettings.min.css">
			<div class="login">
				<form class="accountSettingsForm" method="post" action="../scripts/updateAccount.php" accept-charset="UTF-8">
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
						</li>
						<li>
							<label>Groupsrol</label>
							<input type="text" placeholder="'.$Groupsrol.'"name="Ngroup_role" maxlength="50">
						</li>
						<li>
							<label>Huidig wachtwoord</label>
							<input type="password" placeholder="Huidig wachtwoord" name="password" maxlength="50" required>
						</li>
						<li>
							<input type="submit" value="update">
						</li>
					</ul>
				</form>
			</div>';
			mysqli_close($conn);
		} else {
			//if the user is not loged in, display login form
			echo '
			<div class="login">
				<form class="loginForm" method="post" action="../scripts/login.php" accept-charset="UTF-8">
					<ul>
						<li>
							<img class="person" src="../icons/person.svg">
							<input type="text" placeholder="Name" name="username" maxlength="50" required>
						</li>
						<li>
							<img class="lock" src="../icons/lock.svg">
							<input type="password" placeholder="Password" name="password" maxlength="50" required>
						</li>
						<li>
							<input type="submit" value="login" id="LoginButton">
						</li>
						<li>
							<div class="resetPasswordButton">
								<a href="../scripts/resetPswFront.php">
									wachtwoord vergeten
								</a>
							</div>
						</li>
					</ul>
				</form>
			</div>';
		}

	?>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>
