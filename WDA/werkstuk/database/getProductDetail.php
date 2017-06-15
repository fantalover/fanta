<?php
include 'database/connection.php';

$id = $_GET['id'];

$sql ="select pr.*, img.*, cat.*
FROM 
	producten pr
INNER JOIN
	Images img on pr.Image = img.ID
LEFT JOIN 
	Category cat on pr.Category = cat.ID
WHERE 
	pr.ID = '$id'

	";

	$result = $conn->query($sql);  

?>