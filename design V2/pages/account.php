<?php
	include('../components/headerGeneral.php');
?>

<link rel="stylesheet" href="../css/account.min.css">

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
			echo '
			<link rel="stylesheet" href="../css/accountSettings.min.css">
			<div class="login">
				<form class="accountSettingsForm" method="post" action="../scripts/updateAccount.php" accept-charset="UTF-8">
					<ul>
						<li>
							<label>Naam</label>
							<input type="text" placeholder="Huidge Naam" name="Nnaam" maxlength="50">
						</li>
						<li>
							<label>Gebruikersnaam</label>
							<input type="text" placeholder="username" name="Nusername" maxlength="50">
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
							<label>Groep</label>
							<select class="defaultSelect" name="Ngroep">
								<option value="" >Current</option>

								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</li>
						<li>
							<label>Email</label>
							<input type="email" placeholder="Current mail" name="Nemail" maxlength="50">
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
		} else {
			//if the user is not loged in, display login form
			echo '
			<link rel="stylesheet" href="../css/accountLogin.min.css">
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
							<input type="submit" value="login">
						</li>
					</ul>
				</form>
			</div>';
		}

	?>



	</div>

	<?php
	include('../components/footer.php');
	?>

</body>
