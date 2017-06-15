
<!DOCTYPE html>
<html>
<head>
	<title>string</title>
</head>
<body>
<?php
	
	function splitsNaam($naam){
		if(!(preg_match('/\s/',$naam)) ){
			die("contains no whitespace");
		}else{
		$names = explode(" ", $naam);
		return $names;
	}
	}

	function voegNamenSamen($voornaam, $achternaam){
		$fullname = $voornaam . " " . $achternaam;

		return $fullname;
	}

	$result = splitsNaam("phil pilgrim");
	$result2 = voegNamenSamen("donald", "trump");

?>
<h1>naam splitsen:</h1>
<ul>
	
	<li>voornaam: <?php echo $result[0]; ?></li>
	<li>achternaam: <?php echo $result[1]; ?></li>
</ul>


<h1> fullname: </h1>
<ul><li><?php echo $result2 ?> </li></ul> 
</body>
</html>

