<?php
	include('../components/headerGeneral.php');
	include('../scripts/DB_connect.php');
?>

<link rel="stylesheet" href="../css/resetPsw.min.css">

<body>

	<div class="title">
		<h2>
			Account
		</h2>
	</div>

	<div class="bar">
		<h3>
			Reset wachtwoord
		</h3>
	</div>

	<div class="main">
		<form class="accountSettingsForm" method="post" action="resetPassword.php" accept-charset="UTF-8">

			<label>Email</label>
			<input type="email" placeholder="email adres" name="email" maxlength="50" required>

			<input type="submit" value="reset wachtwoord"/>

		</form>
	</div>


	<?php
	include('../components/footerGeneral.php');
	?>

</body>