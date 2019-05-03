<head>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<?php
	include('../components/headerGeneral.php');
?>

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
		<form class="restPswForm" method="post" action="resetPassword.php" accept-charset="UTF-8">

			<label>Email</label>
			<input type="email" placeholder="email adres" name="email" maxlength="50" required>

			</br>
			<input type="submit" class="redButton" value="reset wachtwoord"/>

		</form>
	</div>

	<script src="resetPassword.js" defer></script>

	<?php
	include('../components/footerGeneral.php');
	?>

</body>
