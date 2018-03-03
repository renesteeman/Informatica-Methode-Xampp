<?php

	$klassen = [];
	$klassen['klas'] = [];
	$klassen['klas']['H51'] = ['name'=>'NameH51', 'username'=>'UsernameH51', 'status'=>'StatusH51'];
	$klassen['klas']['H52'] = ['name'=>'NameH52', 'username'=>'UsernameH52', 'status'=>'StatusH52'];

	/*$myAssocArray = array("year" => 2012,
	"color" => 'blue',
	"free-days" => 5);
	$allKeys = array_keys($myAssocArray);
	echo $allKeys[0];
	//console output would be: year 2012
	*/

	$allKeys = array_keys($klassen['klas']);
	echo $allKeys[0];


	echo "</br></br>";
	print_r($klassen['klas']['H51']);
	echo "</br>";
	print_r($klassen['klas']['H52']);

?>
