<?php
include('../php/DB_connect.php');
include('../php/header.php');
?>

<link rel="stylesheet" href="../css/account.min.css">

<body>

	<div class="debug">
		<?php



		?>
	</div>

	<div class="main">
		<div class="title">
			Account
		</div>
		<form method="post" action="../php/updateAccount.php" accept-cahrset="UTF-8" id="updateAccount">
			<div class="form-group">
				<label for="">New username: </label>
				<input type="text" class="form-control" placeholder="New username" name="new_username" maxlength="255">
			</div>
			<div class="form-group">
				<label for="">New email address: </label>
				<input type="email" class="form-control" placeholder="New email" name="email" maxlength="255">
			</div>
			<div class="form-group">
				<label for="">New password: </label>
				<input type="password" class="form-control" placeholder="New password" name="new_psw" maxlength="255">
			</div>
			<div class="form-group">
				<label for="">Comfirm new password: </label>
				<input type="password" class="form-control" placeholder="New password" name="new_psw_confirm" maxlength="255">
			</div>

			<div class="form-group">
				<label for="">Current password</label>
				<input type="password" class="form-control" placeholder="Password" name="psw" maxlength="255" required>
			</div>
				<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>


<?php
include('../php/footer.php');
?>
