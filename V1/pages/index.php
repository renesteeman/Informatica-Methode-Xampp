<?php
include('../php/DB_connect.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="../css/main.min.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>Informatica</title>
  </head>
  <header>
	  <!-- navbar -->
	  <nav class="top-navbar">
			<div class="top-nav">Informatica</div>
	  </nav>

	  <nav class="navbar navbar-expand-md">
		  <div class="navbar-nav">
			  <a href="index.php">startpagina</a>
		  </div>

		  <div class="ml-auto login_form">
			<?php

				session_start();

				//if logged in say hello, else give the option to login
				if (isset($_SESSION["usr_name"])){
					echo '<form action="../pages/general/account_settings.php"><button type="submit" class="logout">Hello '.$_SESSION["usr_name"].'</button></form>';
					echo '<form action="../php/logout.php"><button type="submit" class="logout">(logout)</button></form>';

				} else {
					echo ' <div class="nav-item a login" data-toggle="modal" data-target="#LoginModal">login</div> ';
				}

			?>

		 </div>

		 <!-- Login modal -->
		<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
			    	<div class="modal-header">
			    		<h5 class="modal-title" id="exampleModalLabel">Login</h5>
			    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        		<span aria-hidden="true">&times;</span>
			    		</button>
			    	</div>
					<div class="modal-body">
						<form method="post" action="../php/login.php" accept-cahrset="UTF-8" id="login">
							<div class="form-group row">
								<label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
								<div class="col-sm-10">
						    		<input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" maxlength="255" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
						    		<input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" maxlength="50" required>
								</div>
							</div>
						</form>
			  		</div>
		    		<div class="modal-footer">
						<button type="button" class="btn btn-secondary">Forgot password</button>
		    			<button type="submit" class="btn btn-primary" form="login" value="Submit">Login</button>
		    		</div>
				</div>
			</div>
		</div>

	  </nav>
  </header>


<body>

	<div class="debug">
		<?php



		?>
	</div>

	<div class="main">
		<div class="title">
			Hoofdstukken
		</div>
		<ul>
			<li>
				<a href="H1/H1.php">H1 Werking computer</a>
			</li>
			<li>
				<a href="H2/H2.php">H2 Logica</a>
			</li>
			<li>
				<a href="H3.php">H3 Programmeren</a>
			</li>
			<li>
				<a href="H4.php">H4 Arduino (keuze)</a>
			</li>
			<li>
				<a href="H5.php">H5 Web development (keuze)</a>
			</li>
			<li>
				<a href="H6.php">H6 Project management</a>
			</li>
			<li>
				<a href="H7.php">H7 Project uitvoeren</a>
			</li>

		</ul>
	</div>

</body>


<?php
include('../php/footer.php');
?>
