<?php
	//prepare for DB connection
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'inforca');

	//connect to DB
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	//use utf8
	mysqli_set_charset($conn, 'utf8mb4');

    // Check connection
    if($conn === false){

        die("Kon geen verbinding maken met database");

    }

?>
