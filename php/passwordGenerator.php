<?php
$letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$numbers = array("1","2","3","4","5","6","7","8","9","0");
$specials = array("!","@","#","$","%","&","?");

$psw = "";

for ($i=0; $i<20; $i++){
	$ran1 = rand(0, 2);

	if ($ran1 == 0){
		$ran2 = rand(0,25);
		$char = $letters[$ran2];
		$psw.=$char;

	} elseif ($ran1 == 1) {
		$ran2 = rand(0,9);
		$number = $numbers[$ran2];
		$psw.=$number;

	} else {
		$ran2 = rand(0,6);
		$special = $specials[$ran2];
		$psw.=$special;
	}
}

?>
