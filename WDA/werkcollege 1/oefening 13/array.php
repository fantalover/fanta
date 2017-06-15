<!DOCTYPE html>
<html>
<head>
	<title>array</title>
</head>
<body>

<?php 
	$array = array("belgië","nederland","duitsland","portugal","polen", "oostenrijk");
	sort($array);

?>

<h3>De europese Unie:</h3>
<p>De europes unie telt sinds 2007 in totaal <?php echo count($array); ?>  lidstaten.</p>
<h4>De volledige lijst van lidstaten, alfabetishc gerangschikt</h4>
<ol>
	<?php foreach ($array as $country) {
    ?>
    <li>
    <?php
    	echo $country;
    }

?>
</li>
</ol>






</body>
</html>