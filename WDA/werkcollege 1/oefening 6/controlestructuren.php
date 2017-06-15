<?php
	function controle($number){
		switch ($number) {
			case 10:
				echo "het getal is 10";
				break;
			case 20: 
				echo "het getal is 20";
				break;
			case 30:
				echo "het getal is 30";
				break;
			default:
				echo "het getal is niet gelijk";
				break;
		}
	}

controle(10);
?>