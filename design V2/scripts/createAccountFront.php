<?php
	include('../scripts/DB_connect.php');
?>

<html>

<body>

<!-- TODO check if admin is loged in -->

	<form action="./createAccount.php" method="post" accept-charset="UTF-8">
		Account aantal: <input type="text" name="aantal"><br>
		School: <input type="text" name="school"><br>
		Functie: <input type="text" name="functie"><br>
		Klas: <input type="text" name="klas"><br>
		Naam: <input type="text" name="naam"><br>
		<input type="submit" value="Submit">
	</form>

</body>

</html>
