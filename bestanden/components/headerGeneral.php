<?php
session_save_path('../tmp');
session_start();

include('../scripts/DB_connect.php');

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

//check if account is still valid
function AccountValid(){

	//needed to connect inside a function
	global $conn;

	if(isset($_SESSION["id"])){
		$id = check_input($_SESSION["id"]);
		$sql = "SELECT expire_date FROM users WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
			//find teacher info
			$result = mysqli_query($conn, $sql);
			$result = mysqli_fetch_assoc($result);
			$expire_date = $result['expire_date'];
		} else {
			echo "</br>Er is een fout opgetreden met SQL, neem alstublieft contact op met info@inforca.nl en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
		}

		if($expire_date>date("Y-m-d")){
			$valid = 1;
		} else {
			$valid = 0;
		}
	}

	return $valid;
}

//if the account is expired, than redirect to index (if the person isn't on the index page yet) (only check if the person is loged in)
if(basename($_SERVER['PHP_SELF']) != 'index.php' AND basename($_SERVER['PHP_SELF']) != 'account.php' AND basename($_SERVER['PHP_SELF']) != 'resetPswFront.php' AND basename($_SERVER['PHP_SELF']) != 'requestAccountsFront.php'){
	if (!isset($_SESSION["id"])){
		$_SESSION['ErrorNotLogedIn'] = 1;
		header('Location: ../index.php');
	} else {
		//check if the account hasn't expired and if it has, than redirect
		if(AccountValid()){
			$_SESSION['ErrorInvalidAccount'] = 0;
		} else {
			$_SESSION['ErrorInvalidAccount'] = 1;
			header('Location: ../index.php');
		}
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
	<link rel="stylesheet" href="../css/main.min.css">

	<!-- external includes -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title>Inforca</title>

	<!-- icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../icons2/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../icons2/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../icons2/favicon-16x16.png">
	<link rel="manifest" href="../icons2/site.webmanifest">
	<link rel="mask-icon" href="../icons2/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="../icons2/favicon.ico">
	<meta name="apple-mobile-web-app-title" content="Inforca">
	<meta name="application-name" content="Inforca">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-config" content="../icons2/browserconfig.xml">
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
								<a href="../index.php">THEORIE</a>
								<a href="../pages/overview.php">OVERZICHT</a>
								<a href="../pages/planner.php">PLANNER</a>
								<a href="../pages/editer.php">AANPASSEN</a>
							</div>
							';
						} else {
							//if a student is logged in
							echo '
							<div class="nav-bar">
								<a href="../index.php">THEORIE</a>
								<a href="../pages/planner.php">PLANNER</a>
							</div>
							';
						}
					} else {
						//if user isn't logged in
						echo '
						<div class="nav-bar">
							<a href="../index.php"></a>
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
									Welkom <a href="../pages/account.php">'.check_input($_SESSION["name"]).'</a>
								</div>
								<div>
									<a href="../scripts/logout.php">Log uit</a>
								</div>';

						} else {
							echo ' <div><a href="../pages/account.php"> login</a></div> ';
						}
					?>
				</div>
			</div>
		</div>

		<h1 class="INFORCA">
			<a href="../index.php">INFORCA</a>
		</h1>

		<div class="nav-wide">

			<?php
				//if logged in say hello, else give the option to login
				if (isset($_SESSION["functie"])){
					if (check_input($_SESSION["functie"]) == 'docent'){
						//if a teacher is logged in
						echo '
						<div class="nav-bar">
							<a href="../index.php">THEORIE</a>
							<a href="../pages/overview.php">OVERZICHT</a>
							<a href="../pages/planner.php">PLANNER</a>
							<a href="../pages/editer.php">AANPASSEN</a>
						</div>
						';
					} else {
						//if a student is logged in
						echo '
						<div class="nav-bar student">
							<a href="../index.php">THEORIE</a>
							<a href="../pages/planner.php">PLANNER</a>
						</div>
						';
					}
				} else {
					//if user isn't logged in
					echo '
					<div class="nav-bar">
						<a href="../index.php"></a>
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
									Welkom <a href="../pages/account.php">'.check_input($_SESSION["name"]).'</a>
								</div>
								<div>
									<a href="../scripts/logout.php">Log uit</a>
								</div>';

						} else {
							echo ' <div><a href="../pages/account.php"> login</a></div> ';
						}
					?>

				</div>
			</div>
		</div>
	</div>

</header>
