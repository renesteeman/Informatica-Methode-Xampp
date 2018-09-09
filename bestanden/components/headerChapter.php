<?php
session_save_path('../../../tmp');
session_start();

include('../../../scripts/DB_connect.php');

//check if account is still valid
function AccountValid(){

	//needed to connect inside a function
	global $conn;

	if(isset($_SESSION["username"])){
		$id = $_SESSION["username"];
		$sql = "SELECT expire_date FROM users WHERE username='$id'";

		if (mysqli_query($conn, $sql)) {
			//find teacher info
			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$expire_date = $result['expire_date'];
		} else {
			echo "SQL error, report to admin";
		}

		if($expire_date>date("Y-m-d")){
			$valid = 1;
		} else {
			$valid = 0;
		}
	}

	return $valid;
}

//check if person is loged in
if (!isset($_SESSION["id"])){
	$_SESSION['ErrorNotLogedIn'] = 1;
	header('Location: ../../../index.php');
} else {
	//check if the account hasn't expired and if it has, than redirect
	if(AccountValid()){
		$_SESSION['ErrorInvalidAccount'] = 0;
	} else {
		$_SESSION['ErrorInvalidAccount'] = 1;
		header('Location: ../../../index.php');
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
	<meta name="description" content="Moderne informatica theorie inclusief opdrachten, antwoorden en oefentoetsen." />
	<meta name="keywords" content="Informatica, lesmethode, betaalbaar, duidelijk" />
	<meta name="author" content="René Steeman" />

	<!-- internal includes -->
	<link rel="stylesheet" href="../../../css/main.min.css">
	<link rel="stylesheet" href="../../../css/paragraph.min.css">

	<!-- external includes -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>Inforca</title>

	<!-- icon -->
	<link rel="apple-touch-icon" sizes="57x57" href="../../../icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="../../../icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../../../icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="../../../icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../../../icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="../../../icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="../../../icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="../../../icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../../../icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="../../../icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../../../icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../../../icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../../../icons/favicon-16x16.png">
	<link rel="manifest" href="../../../icons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../../../icons/ms-icon-144x144.png">
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
						if ($_SESSION["functie"] == 'docent'){
							//if a teacher is logged in
							echo '
							<div class="nav-bar">
								<a href="../../../index.php">HOME</a>
								<a href="../../../pages/overview.php">OVERZICHT</a>
								<a href="../../../pages/planner.php">PLANNER</a>
							</div>
							';
						} else {
							//if a student is logged in
							echo '
							<div class="nav-bar">
								<a href="../../../index.php">HOME</a>
								<a href="../../../pages/planner.php">PLANNER</a>
							</div>
							';
						}
					} else {
						//if user isn't logged in
						echo '
						<div class="nav-bar">
							<a href="../../../index.php"></a>
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
								Welkom <a href="../../account.php">'.$_SESSION["name"].'</a>
							</div>
							<div>
								<a href="../../../scripts/logout.php">Log uit</a>
							</div>';

					} else {
						echo ' <div><a href="../../account.php"> login</a></div> ';
					}
					?>
				</div>
			</div>
		</div>

		<h1 class="INFORCA">
			<a href="../../../index.php">INFORCA</a>
		</h1>

		<div class="nav-wide">

			<?php
			//if logged in say hello, else give the option to login
			if (isset($_SESSION["functie"])){
				if ($_SESSION["functie"] == 'docent'){
					//if a teacher is logged in
					echo '
					<div class="nav-bar">
						<a href="../../../index.php">HOME</a>
						<a href="../../../pages/overview.php">OVERZICHT</a>
						<a href="../../../pages/planner.php">PLANNER</a>
					</div>
					';
				} else {
					//if a student is logged in
					echo '
					<div class="nav-bar student">
						<a href="../../../index.php">HOME</a>
						<a href="../../../pages/planner.php">PLANNER</a>
					</div>
					';
				}
			} else {
				//if user isn't logged in
				echo '
				<div class="nav-bar">
					<a href="../../../index.php"></a>
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
									Welkom <a href="../../account.php">'.$_SESSION["name"].'</a>
								</div>
								<div>
									<a href="../../../scripts/logout.php">Log uit</a>
								</div>';

						} else {
							echo '<div><a href="../../account.php">login</a></div>';
						}
					?>

				</div>
			</div>
		</div>
	</div>

</header>
