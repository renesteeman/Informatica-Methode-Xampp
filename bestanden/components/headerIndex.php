<?php
session_save_path('tmp');
session_start();

include('scripts/DB_connect.php');

//function to check and clean input
function check_input($data) {
	$data = trim($data, " ");
	$data = stripslashes($data);
	$data = htmlentities($data, ENT_QUOTES);
	return $data;
}

//check for known problems
if(isset($_SESSION['ErrorNotLogedIn'])){
	if(check_input($_SESSION['ErrorNotLogedIn'])){
		echo ("
			<script>
				alert('U bent niet ingelogd');
			</script>
		");
		$_SESSION['ErrorNotLogedIn'] = 0;
	}
}

if(isset($_SESSION['ErrorInvalidAccount'])){
	if(check_input($_SESSION['ErrorInvalidAccount'])){
		echo ("
			<script>
				alert('Uw account is verlopen');
			</script>
		");
	}
}

?>

<!DOCTYPE HTML>
<html>

<div class="pageContent">
<head>
	<!-- meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- internal includes -->
	<link rel="stylesheet" href="css/main.min.css">
	<link rel="stylesheet" href="css/sales.min.css">

	<!-- external includes -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title>Inforca</title>

	<!-- icon -->
	<!-- icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="icons2/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icons2/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icons2/favicon-16x16.png">
	<link rel="manifest" href="icons2/site.webmanifest">
	<link rel="mask-icon" href="icons2/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="icons2/favicon.ico">
	<meta name="apple-mobile-web-app-title" content="Inforca">
	<meta name="application-name" content="Inforca">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="icons2/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">

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
					if (isset($_SESSION["functie"])){
						if (check_input($_SESSION["functie"]) == 'docent'){
							//if a teacher is logged in
							echo '
							<div class="nav-bar">
								<a href="index.php">THEORIE</a>
								<a href="pages/overview.php">OVERZICHT</a>
								<a href="pages/planner.php">PLANNER</a>
								<a href="pages/editer.php">AANPASSEN</a>
							</div>
							';
						} else {
							//if a student is logged in
							echo '
							<div class="nav-bar">
								<a href="index.php">THEORIE</a>
								<a href="pages/planner.php">PLANNER</a>
							</div>
							';
						}
					} else {
						//if user isn't logged in
						echo '
						<div class="nav-bar">
							<a href="index.php"></a>
						</div>
						';
					}
				?>

				<div class="welcome">
					<?php
						//if logged in say hello, else give the option to login
						if (isset($_SESSION["name"])){
							echo
								'<div>
									Welkom <a href="pages/account.php">'.check_input($_SESSION["name"]).'</a>
								</div>
								<div>
									<a href="scripts/logout.php">Log uit</a>
								</div>';
						} else {
							echo '<div><a href="pages/account.php">login</a></div>';
						}
					?>
				</div>
			</div>
		</div>

		<h1 class="INFORCA">
			<a href="index.php">INFORCA</a>
		</h1>

		<div class="nav-wide">

			<?php
				//if logged in say hello, else give the option to login
				if (isset($_SESSION["functie"])){
					if (check_input($_SESSION["functie"]) == 'docent'){
						//if a teacher is logged in
						echo '
						<div class="nav-bar">
							<a href="index.php">THEORIE</a>
							<a href="pages/overview.php">OVERZICHT</a>
							<a href="pages/planner.php">PLANNER</a>
							<a href="pages/editer.php">AANPASSEN</a>
						</div>
						';
					} else {
						//if a student is logged in
						echo '
						<div class="nav-bar student">
							<a href="index.php">THEORIE</a>
							<a href="pages/planner.php">PLANNER</a>
						</div>
						';
					}
				} else {
					//if user isn't logged in
					echo '
					<div class="nav-bar">
						<a href="index.php"></a>
					</div>
					';
				}
			?>

			<div class="empty">
				<div class="welcome">

					<?php
						//if logged in say hello, else give the option to login
						if (isset($_SESSION["name"])){
							echo
								'<div>
									Welkom <a href="pages/account.php">'.check_input($_SESSION["name"]).'</a>
								</div>
								<div>
									<a href="scripts/logout.php">Log uit</a>
								</div>';

						} else {
							echo ' <div><a href="pages/account.php"> login</a></div> ';
						}
					?>

				</div>
			</div>
		</div>
	</div>

</header>
