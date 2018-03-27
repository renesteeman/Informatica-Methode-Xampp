<?php

session_start();

$_SESSION['test'] = 'test';
print_r($_SESSION);

?>
