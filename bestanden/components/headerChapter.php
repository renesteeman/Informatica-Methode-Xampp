<?php
session_save_path('../../../tmp');
session_start();
?>

<!DOCTYPE HTML>
<html>

<div class="pageContent">
<head>
	<!-- meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Moderne informatica theorie inclusief opdrachten, antwoorden en oefentoetsen." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk" />
	<meta name="author" content="René Steeman" />

	<!-- external includes -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- internal includes -->
	<link rel="stylesheet" href="../../../css/main.min.css">
	<link rel="stylesheet" href="../../../css/paragraph.min.css">

    <title>Inforca</title>
	<link rel="icon" type="image/png" href="../../../icons/icon64.png"/>

<head>

	<header>
		<div class="navigation">

			<div class="nav-burger">
				<div class="burger-icon">

					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>

				</div>

				<div class="burger-content">
					<?php
						//if logged in say hello, else give the option to login
						if (isset($_SESSION["username"])){
							if ($_SESSION["functie"] == 'docent'){
								//if a teacher is logged in
								echo '
								<div class="nav-bar">
									<a href="../../../pages/index.php">HOME</a>
									<a href="../../../pages/overview.php">OVERZICHT</a>
									<a href="../../../pages/planner.php">PLANNER</a>
								</div>
								';
							} else {
								//if a student is logged in
								echo '
								<div class="nav-bar">
									<a href="../../../pages/index.php">HOME</a>
									<a href="../../../pages/planner.php">PLANNER</a>
								</div>
								';
							}
						} else {
							//if user isn't logged in
							echo '
							<div class="nav-bar">
								<a href="../../../pages/index.php"></a>
							</div>
							';

						}
					?>

					<div class="welcome">
						<?php
						//if logged in say hello, else give the option to login
						if (isset($_SESSION["username"])){
							echo
								'<div>
									Welkom <a href="../../account.php">'.$_SESSION["username"].'</a>
								</div>
								<div>
									<a href="../../../scripts/logoutGeneral.php">Log uit</a>
								</div>';

						} else {
							echo ' <div><a href="../../account.php"> login</a></div> ';
						}
						?>
					</div>
				</div>
			</div>

			<h1 class="INFORCA">
				<a href="../../index.php">INFORCA</a>
			</h1>

			<div class="nav-wide">

				<?php
				//if logged in say hello, else give the option to login
				if (isset($_SESSION["username"])){
					if ($_SESSION["functie"] == 'docent'){
						//if a teacher is logged in
						echo '
						<div class="nav-bar">
							<a href="../../../pages/index.php">HOME</a>
							<a href="../../../pages/overview.php">OVERZICHT</a>
							<a href="../../../pages/planner.php">PLANNER</a>
						</div>
						';
					} else {
						//if a student is logged in
						echo '
						<div class="nav-bar student">
							<a href="../../../pages/index.php">HOME</a>
							<a href="../../../pages/planner.php">PLANNER</a>
						</div>
						';
					}
				} else {
					//if user isn't logged in
					echo '
					<div class="nav-bar">
						<a href="../../../pages/index.php"></a>
					</div>
					';
				}
			?>

				<div class="empty">
					<div class="welcome">

						<?php
							//if logged in say hello, else give the option to login
							if (isset($_SESSION["username"])){
								echo
									'<div>
										Welkom <a href="../../account.php">'.$_SESSION["username"].'</a>
									</div>
									<div>
										<a href="../../../scripts/logoutGeneral.php">Log uit</a>
									</div>';

							} else {
								echo ' <div><a href="../../account.php"> login</a></div> ';
							}
						?>

					</div>
				</div>
			</div>
		</div>

	</header>
