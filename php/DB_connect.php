<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'informaticamethode');

    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	mysqli_set_charset($conn, 'utf8mb4');

    // Check connection
    if($conn === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

?>
