<?php 
	
	$conn = new mysqli($serverurl, $username, $password, $dbname);
	$conn = new mysqli('fanta','lovers' , 'database','yooo' );
	if ($conn->connect_error) {
		die("connection failed: " . $conn->connect_error);
	}


 ?>


 