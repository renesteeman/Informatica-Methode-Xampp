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
		<form class="loginForm">
			<ul>
				<li>
					<img class="person" src="../icons/person.svg">
					<input type="text" placeholder="Name">
				</li>
				<li>
					<img class="lock" src="../icons/lock.svg">
					<input type="password" placeholder="Password">
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
