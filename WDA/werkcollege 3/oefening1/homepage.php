<?php 
	include "switch.php";
	include "taal.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>homepage</title>
</head>
<body>
<h1><?php
if( isset( $_COOKIE["language"] ) )
	 echo $text[$lang][hello];
	 echo $bezoeker;
  ?></h1>
<p><?php echo $text[$lang][stext];?></p>
<a href="instelling.php"><?php echo $text[$lang][setting] ; ?></a>
</body>
</html>


