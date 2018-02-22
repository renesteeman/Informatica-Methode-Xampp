<?php
	//start session to be able to 'clear' session
	session_start();

	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy();

	//redirect to main page
	header("Location: index.php");

	echo "Error redirecting";
?>
