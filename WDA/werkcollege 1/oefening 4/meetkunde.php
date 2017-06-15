<?php
define("PI", 3.14159);
$functionsExecutedCounter = 0;

function berekenOppervlakteCirkel($straal){
    $result = PI * ($straal * $straal);
    global $functionsExecutedCounter;
	$functionsExecutedCounter+=1;
    return $result;
}

function berekenOppervlakteDriehoek($basis, $hoogte){
	$result = ($basis * $hoogte) / 2;
	global $functionsExecutedCounter;
	$functionsExecutedCounter+=1;
	return $result;
}

function berekenOppervlakteVierkant($zijde){
	$result = berekenOppervlakteRechthoek($zijde, $zijde);
	return $result;
}

function berekenOppervlakteRechthoek($zijde1, $zijde2){
	$result = $zijde2 * $zijde1;
	global $functionsExecutedCounter;
	$functionsExecutedCounter+=1;
	return $result;
}

?>