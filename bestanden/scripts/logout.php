<?php
	//start session to be able to 'clear' session
	session_start();

	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy();

	//redirect to main page
	header("Location: ../index.php");

	echo "\nEr is een fout opgetreden met omleiden, neem alstublieft contact op met koffieandcode@gmail.com en noem zowel de pagina als de inhoud van dit bericht. Alvast erg bedankt!";
?>
