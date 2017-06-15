<?php
define("PI", 3.14159);


function berekenOppervlakteCirkel($straal){
    $result = PI * ($straal * $straal);
    return $result;
}

function berekenOppervlakteDriehoek($basis, $hoogte){
	$result = ($basis * $hoogte) / 2;
	return $result;
}

function berekenOppervlakteVierkant($zijde){
	$result = berekenOppervlakteRechthoek($zijde, $zijde);
	return $result;
}

function berekenOppervlakteRechthoek($zijde1, $zijde2){
	$result = $zijde2 * $zijde1;
	return $result;
}

?>