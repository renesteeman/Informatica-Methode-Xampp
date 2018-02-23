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
			<div class="login">
				<form class="loginForm" method="post" action="../scripts/login.php" accept-charset="UTF-8">
					<ul>
						<li>
							<label>Naam</label>
							<input type="text" placeholder="Huidge Naam" name="username" maxlength="50" required>
						</li>
						<li>
							<label>Gebruikersnaam</label>
							<input type="text" placeholder="Huidge username" name="username" maxlength="50" required>
						</li>
						<li>
							<label>Nieuw wachtwoord</label>
							<input type="password" placeholder="Nieuw wachtwoord" name="password" maxlength="50" required>
						</li>
						<li>
							<label>Bevestig nieuw wachtwoord</label>
							<input type="password" placeholder="Bevestig wachtwoord" name="password" maxlength="50" required>
						</li>
						<li>
							<label>Groep</label>
							<select class="defaultSelect" name="newGroup">
								<option value="" >Current</option>

								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
								<option value="4">Option 4</option>
								<option value="5">Option 5</option>
							</select>
						</li>
						<li>
							<label>Email</label>
							<input type="email" placeholder="Current mail" name="newEmail" maxlength="50" required>
						</li>
						<li>
							<input type="submit" value="update">
						</li>
					</ul>
				</form>
			</div>';
		} else {
			//if the user is not loged in, display login form
			echo '<div class="login">
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
