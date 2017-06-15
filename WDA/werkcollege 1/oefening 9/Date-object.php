<?php

	date_default_timezone_set('Europe/Brussels');
	$date = date('l d/m/Y h:i:s ', time());
	echo $date;

	$huidigSeizoen = date(m);
	switch ($huidigSeizoen) {
		case '1':
			echo "het is winter";
			echo " sneeuw";
			break;
		case '2':
			echo "het is winter";
			echo " sneeuw";
			break;
		case '3':
			echo "het is lente";
			break;
		case '4':
			echo "het is lente";
			break;
		case '5':
			echo "het is lente";
			break;
		case '6':
			echo "het is zomer";
			break;
		case '7':
			echo "het is zomer";
			break;
		case '8':
			echo "het is zomer";
			break;
		case '9':
			echo "het is herfst";
			break;
		case '10':
			echo "het is herfst";
			break;
		case '11':
			echo "het is herfst";
			break;
		case '12':
			echo "het is winter";
			echo " sneeuw";
			break;
			
												
		default:
			echo "geen maand gegeven";
			break;
	}


?>