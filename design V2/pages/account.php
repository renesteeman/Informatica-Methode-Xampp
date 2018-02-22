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
			Login
		</h3>
	</div>

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
	</div>

	</div>

	<?php
	include('../components/footer.php');
	?>

</body>
