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
		<form>
			<div class="form-group">
				<label for="">Username: </label>
				<input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Username">
			</div>
			<div class="form-group">
				<label for="">Email address</label>
				<input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="">New password: </label>
				<input type="password" class="form-control" id="" placeholder="New password">
			</div>
			<div class="form-group">
				<label for="">Comfirm new password: </label>
				<input type="password" class="form-control" id="" placeholder="New password">
			</div>

			<div class="form-group">
				<label for="">Password</label>
				<input type="password" class="form-control" id="" placeholder="Password">
			</div>
				<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>


<?php
include('../php/footer.php');
?>
